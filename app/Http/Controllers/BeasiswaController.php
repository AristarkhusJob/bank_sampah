<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beswan;
use App\Payment;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == "") {
            $beasiswa = Beswan::orderBy('id', 'desc')->paginate(10);
        }
        else {
            $beasiswa = Beswan::where('name','like',"%".$request->search."%")
                    ->orWhere('school','like',"%".$request->search."%")
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        }

        return view('beasiswa', compact('beasiswa'))
                  ->with('i', (request()->input('page',1) -1)*10);
        //return response()->json($request);
    }

    public function edit($id)
    {
        $choose = Beswan::find($id);
        $name = $choose->name;
        $i = 1;
        $payment = Payment::join('beswans','payments.beswan_id','=','beswans.id')
                            ->where('beswans.name', $name)->orderBy('payments.id', 'desc')->paginate(10);
        $total = Payment::join('beswans','payments.beswan_id','=','beswans.id')
                            ->where('beswans.name', $name)->sum('price');
        return view('viewBeasiswa', compact('payment', 'choose', 'total','i'));
        //return response()->json($total);
    }

}
