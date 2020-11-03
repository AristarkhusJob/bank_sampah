<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beswan;
use App\Payment;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == "") {
            $payments = Payment::orderBy("id","desc")->paginate(10);
        }
        else {
            $payments = Payment::join('beswans','payments.beswan_id','=','beswans.id')
                    ->where('beswans.name','like',"%".$request->search."%")
                    ->orwhere('beswans.school','like',"%".$request->search."%")
                    ->orwhere('payments.month','like',"%".$request->search."%")
                    ->orWhere('payments.year','like',"%".$request->search."%")
                    ->orderBy('payments.id', 'desc')->paginate(10);
        }

        return view('payment', compact('payments'))
                  ->with('i', (request()->input('page',1) -1)*10);
    }

    public function create()
    {
        $beswan = Beswan::All();
        return view('addPayment', compact('beswan'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'month' => 'required',
            'year' => 'required',
            'price' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Nama Beswan Harus Diisi !',
            'month.required' => 'Bulan Harus Diisi !',
            'year.required' => 'Tahun Harus Diisi !',
            'price.required' => 'Nominal Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $data = array(
            'beswan_id' => $request->name,
            'month' => $request->month,
            'year' => $request->year,
            'price' => $request->price,
        );
        Payment::insert($data);
        //return response()->json($data);
        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $choose = Payment::find($id);
        return view('updatePayment', compact('choose'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'year' => 'required',
            'price' => 'required'
        ];

        $customMessages = [
            'year.required' => 'Tahun Harus Diisi !',
            'price.required' => 'Nominal Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $payment = Payment::find($id);

        if($request->get('month') == '') {
        }
        else {
            $payment->month = $request->get('month');
        }

        $payment->year = $request->get('year');
        $payment->price = $request->get('price');
        $payment->save();

      return redirect()->route('payment.index')
                      ->with('success', 'Pembayaran berhasil diupdate.');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payment.index')
                        ->with('success', 'Pembayaran berhasil dihapus.');
    }

}
