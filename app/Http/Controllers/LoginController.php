<?php

namespace App\Http\Controllers;

use App\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);
        if (Auth::attempt($credentials)) {

            //retrieve temp cart
            $cart = session()->get('cart', []);
            session()->forget('cart');

            $user = Auth::user();

            //set temp cart to pending if cart doesn't exist
            if($user->baskets->where('status','pending')->count() == 0){
                $basket = $user->baskets()->save(Basket::create([
                    'status' => 'pending']));

                foreach($cart as $id=>$item){
                    $basket->cars()->attach($id,['quantity'=>$item['quantity']]);
                }
            }

            //Redirect user or admin
            if(Auth::user()->is_admin){
                return redirect()->route('dashboard');
            }else{
                return redirect()->intended('/');
            }

        }else{
            return redirect()->back()->withErrors('Wrong credentials');
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
