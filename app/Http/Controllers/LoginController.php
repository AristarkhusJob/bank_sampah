<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\User;
use Carbon\Carbon;
use Socialite;
use Auth;
use Exception;

session_start();

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (!\Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        }
        
        return redirect('/home');
    }

     
}
