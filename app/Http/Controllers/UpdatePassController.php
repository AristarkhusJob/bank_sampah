<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UpdatePassController extends Controller
{
    public function edit($id)
    {
        $choose = User::find($id);
        $user = User::all();
        return view('updatePass', compact('choose','user'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'password' => 'min:6|max:20|required|same:password_confirmation',
            'password_confirmation' => 'min:6|max:20|required|same:password'
        ];

        $customMessages = [
            'password.required' => 'Password Baru Harus Diisi !',
            'password.min' => 'Password Baru Minimal 6 Huruf !',
            'password.max' => 'Password Baru Maksimal 20 Huruf !',
            'password_confirmation.min' => 'Konfirmasi Password Baru Minimal 6 Huruf !',
            'password_confirmation.max' => 'Konfirmasi Password Baru Maksimal 20 Huruf !',
            'password.same' => 'Pastikan Password Baru dan Konfirmasi Password Sama !',
            'password_confirmation.same' => 'Pastikan Password Baru Sama !'
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::find($id);
        $user->password = bcrypt($request->get('password'));
        $user->save();
      return redirect()->route('user.index')
                      ->with('success', 'Password berhasil di update.');
    }

}
