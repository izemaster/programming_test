<?php

namespace App\Http\Controllers;

use App\Car;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function home(){
        $cars  = Car::where('enabled',1)->get();
        $basket = session('cart', null);
        return view('home',compact('cars','basket'));
    }

    public function dashboard(){
        if(Gate::allows('admin-options')){
            return view('dashboard');
        }
        else{
            abort(403);
        }

    }
}
