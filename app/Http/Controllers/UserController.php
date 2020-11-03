<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == ""){
            $user = User::orderBy('id', 'desc')->paginate(5);
        }
        else {
            $user = User::where('username','like',"%".$request->search."%")
                    ->orWhere('name','like',"%".$request->search."%")
                    ->orWhere('type','like',"%".$request->search."%")
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        }

        return view('user', compact('user'))
                  ->with('i', (request()->input('page',1) -1)*5);
        //return response()->json($request);
    }

    public function create()
    {
        $user = User::all();
        return view('addUser', compact('user'));
    }

    public function store(Request $request)
    {

        $rules = [
            'username' => 'required|min:3|max:15',
            'password' => 'min:6|max:20|required|same:password_confirmation',
            'password_confirmation' => 'min:6|max:20|required|same:password',
            'name' => 'required|min:4|max:50',
            'type' => 'required'
        ];

        $customMessages = [
            'username.required' => 'Username Harus Diisi !',
            'password.required' => 'Password Harus Diisi !',
            'password_confirmation.required' => 'Konfirmasi Password Harus Diisi !',
            'name.required' => 'Nama Harus Diisi !',
            'type.required' => 'Tipe User Harus Diisi !',
            'username.min' => 'Username Minimal 3 Huruf !',
            'username.max' => 'Username Maksimal 15 Huruf !',
            'password.min' => 'Password Minimal 6 Huruf !',
            'password.max' => 'Password Maksimal 20 Huruf !',
            'password_confirmation.min' => 'Konfirmasi Password Minimal 6 Huruf !',
            'password_confirmation.max' => 'Konfirmasi Password Maksimal 20 Huruf !',
            'password.same' => 'Pastikan Password Sama !',
            'password_confirmation.same' => 'Pastikan Password Sama !',
            'name.min' => 'Nama Minimal 4 Huruf !',
            'name.max' => 'Nama Maksimal 50 Huruf !'

        ];

        $this->validate($request, $rules, $customMessages);

        if(User::where('username',strtolower($request->username))->exists()){
            return redirect()->back()->with('error', 'Username sudah ada !')->withInput();
        }

        $data = array(
            'username' => strtolower($request->username),
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'type' => $request->type,
        );
        User::create($data);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $choose = User::find($id);
        $user = User::all();
        return view('updateUser', compact('choose','user'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:4|max:50',
            'type' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Nama Harus Diisi !',
            'type.required' => 'Tipe User Harus Diisi !',
            'name.min' => 'Nama Minimal 4 Huruf !',
            'name.max' => 'Nama Maksimal 50 Huruf !'

        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::find($id);

        if($request->name != $user->name){
            if(User::where('name', $request->name)->exists()) {
                return redirect()->back()->with('errorName', 'Nama sudah ada !')->withInput();
            }
        }

      $user->name = $request->get('name');
      $user->type = $request->get('type');
      $user->save();
      return redirect()->route('user.index')
                      ->with('success', 'User berhasil di update.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')
                        ->with('success', 'User berhasil dihapus.');
    }

}
