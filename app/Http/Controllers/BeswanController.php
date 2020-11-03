<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beswan;
use App\Payment;

class BeswanController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == "") {
            $beswan = Beswan::orderBy('id', 'desc')->paginate(10);
        }
        else {
            $beswan = Beswan::where('name','like',"%".$request->search."%")
                    ->orWhere('school','like',"%".$request->search."%")
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        }

        return view('beswan', compact('beswan'))
                  ->with('i', (request()->input('page',1) -1)*10);
        //return response()->json($request);
    }

    public function create()
    {
        return view('addBeswan');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'school' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Nama Beswan Harus Diisi !',
            'school.required' => 'Sekolah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        if (Beswan::where('name', $request->beswan)->exists()) {
            return redirect()->back()->with('error', 'Nama Beswan sudah ada !');
        }

        $data = array(
            'name' => $request->name,
            'school' => $request->school,
        );
        Beswan::insert($data);
        //return response()->json($data);
        return redirect()->route('beswan.index')->with('success', 'Beswan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $choose = Beswan::find($id);
        return view('updateBeswan', compact('choose'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'school' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Nama Beswan Harus Diisi !',
            'school.required' => 'Sekolah Harus Diisi !'
        ];

        $this->validate($request, $rules, $customMessages);

        $beswan = Beswan::find($id);

        if (strtolower($request->name) == strtolower($beswan->name)) {
            if ($request->school != "") {
                $beswan->school = $request->get('school');
            }
            $beswan->name = $request->get('name');
            $beswan->save();
        }
        else if (Beswan::where('name', $request->name)->exists()) {
            return redirect()->back()->with('error', 'Nama Beswan sudah ada !')->withInput();
        }
        else {
            $beswan->name = $request->get('name');
            if ($request->school != "") {
                $beswan->school = $request->get('school');
            }
            $beswan->save();
        }

      return redirect()->route('beswan.index')
                      ->with('success', 'Beswan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $beswan = Beswan::find($id);
        $beswan->delete();
        return redirect()->route('beswan.index')
                        ->with('success', 'Beswan berhasil dihapus.');
    }

}
