<?php

namespace App\Http\Controllers;

use App\Basket;
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
        elseif(Auth::check()){
            if(Auth::user()->baskets()->where('status','pending')->count()>0){
                $basket = Auth::user()->baskets()->where('status','pending')->first();
            }else{
                $basket = Auth::user()->baskets()->save(Basket::create([
                    'status' => 'pending']));

            }


            if($basket->cars->contains($car->id)){
                $qty = $basket->cars()->find($car->id)->pivot->quantity;
                $new_qty = ++$qty;
                $basket->cars()->updateExistingPivot($car->id , ["quantity" => $new_qty]);
            }else{
                $basket->cars()->attach($car->id,['quantity'=>1]);
            }
        }

        return redirect()->back()->with('success', 'Car added to basket successfully!');
    }

    public function checkout(Request $request){
        if(Auth::guest()){
            return redirect()->route('login');
        }
        elseif(Auth::check()){
            $basket = Auth::user()->baskets()->where('status','pending')->first();
            $basket->update([
                'status' => 'finished'
            ]);
            //dd($basket);
            //str_pad($order->id,6,'0',STR_PAD_LEFT
            return view('checkout');
        }


    }

    public function refreshBasket(){
        if(Auth::guest()){
            $basket = session()->get('cart',[]);
        }elseif(Auth::check()){
            $user = Auth::user();
            $cart = $user->baskets->where('status','pending')->first();
            if(!is_null($cart)){
                foreach($cart->cars as $car){
                    $basket[$car->id] = [
                        "make" => $car->make,
                        "model" => $car->model,
                        "quantity" => $car->pivot->quantity,
                        "price" => $car->price,
                        "image" => $car->image
                    ];
                }
            }else{
                $basket = null;
            }

        }

        return view('basket',compact('basket'));
    }

    public function deleteFromBasket(Car $car){

        if(Auth::guest()){
            $cart = session()->get('cart',[]);
            unset($cart[$car->id]);
            session()->forget('cart');
            session()->put('cart', $cart);
        }
        elseif(Auth::check()){
            $user = Auth::user();
            $user->baskets()->where('status','pending')->first()->cars()->detach($car->id);
        }


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
        elseif(Auth::check()){
            $basket = Auth::user()->baskets()->where('status','pending')->first();
            $basket->cars()->updateExistingPivot($car->id , ["quantity" => $request->quantity]);
        }

        return redirect()->back()->with('success', 'Car added to basket successfully!');
    }
}
