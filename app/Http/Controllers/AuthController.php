<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(!auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function getAddUser()
    {
        return view('addUser');
    } 

    public function postAddUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:4|unique:users',
            'name' => 'required|min:4',
            'passsword' => 'required|min:6|confirmed',
            'type' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'type' => $request->type
        ]);

        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
