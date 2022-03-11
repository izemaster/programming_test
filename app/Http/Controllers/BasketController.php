<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function addToBasket(Car $car)
    {
        if(Auth::guest()){
            $id = $car->id;
            $cart = session()->get('cart', []);

            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "make" => $car->make,
                    "model" => $car->model,
                    "quantity" => 1,
                    "price" => $car->price,
                    "image" => $car->image
                ];
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Car added to basket successfully!');
    }

    public function checkout(Request $request){

    }

    public function refreshBasket(){
        $basket = session()->get('cart',[]);
        return view('basket',compact('basket'));
    }

    public function deleteFromBasket(Car $car){
       $cart = session()->get('cart',[]);
       unset($cart[$car->id]);
       session()->forget('cart');
       session()->put('cart', $cart);

       return redirect()->back()->with('success', 'Car deleted to basket successfully!');
    }

    public function updateQuantity(Car $car, Request $request)
    {
        if(Auth::guest()){
            $id = $car->id;
            $cart = session()->get('cart', []);

            if(isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity;
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Car added to basket successfully!');
    }
}
