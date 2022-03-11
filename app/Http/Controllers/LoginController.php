<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            //$request->session()->regenerate();
            if(Auth::user()->is_admin){
                return redirect()->route('dashboard');
            }else{
                return redirect()->intended('/');
            }

        }
    }

    public function login(){
        return view('login');
    }



    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
