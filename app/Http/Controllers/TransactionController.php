<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Transaction;
use App\Trash;
use App\DetailTransaction;
use Excel;
use App\Exports\TransactionExport;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $rules = [
            'dateFrom' => 'required',
            'dateTo' => 'required',
        ];

        $customMessages = [
            'dateFrom.required' => 'Dari Tanggal Harus Diisi !',
            'dateTo.required' => 'Sampai Tanggal Harus Diisi !'
        ];

        if($request->search) {
            $detail = DetailTransaction::join('transactions','detail_transactions.transaction_id','=','transactions.id')
                                        ->join('trashes','detail_transactions.trash_id','=','trashes.id')
                                        ->join('categories','trashes.category_id','=','categories.id')
                                        ->where('trashes.trash_name','like',"%".$request->search."%")
                                        ->orWhere('categories.category_name','like',"%".$request->search."%")
                                        ->orWhere('donatur','like',"%".$request->search."%")
                                        ->orderBy('transactions.date', 'desc')
                                        ->paginate(10);

        }
        else if ($request->dateFrom != '' && $request->dateTo == ''){
            $this->validate($request, $rules, $customMessages);
        }
        else if ($request->dateFrom == '' && $request->dateTo != ''){
            $this->validate($request, $rules, $customMessages);
        }
        else if ($request->dateFrom && $request->dateTo){

            $detail = DetailTransaction::join('transactions','detail_transactions.transaction_id','=','transactions.id')
                                        ->whereBetween('transactions.date', [$request->dateFrom, $request->dateTo])
                                        ->orderBy('transactions.date', 'desc')->paginate(10);
        }
        else {
            $detail = DetailTransaction::orderBy('id', 'desc')->paginate(10);
        }

        return view('transaction', compact('detail'))->with('i', (request()->input('page',1) -1)*10);
    }

    public function create()
    {
        $trash = Trash::all();
        return view('create', compact('trash'));
    }

    public function store(Request $request)
    {

        $rules = [
            'trash_name' => 'required',
            'weight' => 'required|numeric|min:0.001',
            'price' => 'required|numeric|min:0.001',
            'date' => 'required',
        ];

        $customMessages = [
            'trash_name.required' => 'Nama Sampah Harus Diisi !',
            'weight.required' => 'Berat Sampah Harus Diisi !',
            'price.required' => 'Harga Sampah Harus Diisi !',
            'date.required' => 'Tanggal Harus Diisi !',
            'weight.min' => 'Berat Sampah tidak boleh 0 atau minus !',
            'price.min' => 'Harga Sampah tidak boleh 0 atau minus !',
            'weight.numeric' => 'Berat Sampah Harus Diisi Angka !',
            'price.numeric' => 'Harga Sampah Harus Diisi Angka !',
        ];

        $this->validate($request, $rules, $customMessages);

        if (Transaction::where('date', $request->date)->exists()) {

            Transaction::where('date', $request->date)->increment('weightTotal', $request->weight);
            Transaction::where('date', $request->date)->increment('priceTotal', $request->price);

            $transaction = Transaction::where('date', $request->date)->first();
            $transaction->user_id = Auth::user()->id;
            $transaction->save();

        }
        else {
            $dataTransaction = array(
                'user_id' => Auth::user()->id,
                'date' => $request->date,
                'weightTotal' => $request->weight,
                'priceTotal' => $request->price
            );
            Transaction::insert($dataTransaction);
        }

        $get_id = Transaction::where('date', $request->date)->value('id');

        $data = array(
            'trash_id' => $request->trash_name,
            'transaction_id' => $get_id,
            'weight' => $request->weight,
            'price' => $request->price,
            'donatur' => $request->donatur
        );
        DetailTransaction::insert($data);




        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $detail = DetailTransaction::find($id);
        $trash = Trash::all();
        return view('update', compact('detail','trash'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'weight' => 'required|numeric|min:0.001',
            'price' => 'required|numeric|min:0.001',
        ];

        $customMessages = [
            'weight.required' => 'Berat Sampah Harus Diisi !',
            'price.required' => 'Harga Sampah Harus Diisi !',
            'weight.min' => 'Berat Sampah tidak boleh 0 atau minus !',
            'price.min' => 'Harga Sampah tidak boleh 0 atau minus !',
            'weight.numeric' => 'Berat Sampah Harus Diisi Angka !',
            'price.numeric' => 'Harga Sampah Harus Diisi Angka !',
        ];

        $this->validate($request, $rules, $customMessages);

      $detail = DetailTransaction::find($id);

        if ($request->weight > $detail->weight) {
            $tamp = $request->weight - $detail->weight;
            Transaction::where('date', $detail->transaction->date)->increment('weightTotal', $tamp);
        }
        else if ($request->weight < $detail->weight) {
            $tamp = $detail->weight - $request->weight;
            Transaction::where('date', $detail->transaction->date)->decrement('weightTotal', $tamp);
        }

        if ($request->price > $detail->price) {
            $tamp = $request->price - $detail->price;
            Transaction::where('date', $detail->transaction->date)->increment('priceTotal', $tamp);
        }
        else if ($request->price < $detail->price) {
            $tamp = $detail->price - $request->price;
            Transaction::where('date', $detail->transaction->date)->decrement('priceTotal', $tamp);
        }

        $detail->weight = $request->get('weight');
        $detail->price = $request->get('price');
        $detail->donatur = $request->get('donatur');
        $detail->save();

        $transaction = Transaction::where('date', $detail->transaction->date)->first();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

      return redirect()->route('transaction.index')
                      ->with('success', 'Transaksi berhasil di update.');
    }

    public function destroy($id)
    {
        $detail = DetailTransaction::find($id);

        Transaction::where('date', $detail->transaction->date)->decrement('weightTotal', $detail->weight);
        Transaction::where('date', $detail->transaction->date)->decrement('priceTotal', $detail->price);

        $dateTamp = $detail->transaction->date;

        $detail->delete();

        if (Transaction::where('date', $dateTamp)->value("weightTotal") == 0 && Transaction::where('date', $dateTamp)->value("priceTotal") == 0) {
            Transaction::where('date', $dateTamp)->delete();
        }
        else {
            $transaction = Transaction::where('date', $dateTamp)->first();
            $transaction->user_id = Auth::user()->id;
            $transaction->save();
        }

        return redirect()->route('transaction.index')
                        ->with('success', 'Transaksi berhasil dihapus.');
    }
}
