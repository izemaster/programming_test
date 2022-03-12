<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registration(Request $request){
        $request->validate([

            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            're_password' => 'same:password'
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect("/")->withSuccess('S');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
}
