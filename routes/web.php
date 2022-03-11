<?php

use App\Car;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Pages
Route::get('/', "PageController@home")->name('home');
Route::get('/dashboard',"PageController@dashboard")->middleware('auth')->name('dashboard');

//Authentication
Route::get('/login', "LoginController@login")->name('login');
Route::get('/register', "RegisterController@register")->name('register');
Route::post('/registration', "RegisterController@registration")->name('registration');
Route::post('/authenticate', "LoginController@authenticate")->name('authenticate');
Route::get('/logout', "LoginController@logout")->name('logout');

Route::resource('cars','CarController');
Route::put('cars/{car}/toggle','CarController@toggle')->name('cars.toggle');

//Basket
Route::post('/basket/add/{car}','BasketController@addToBasket')->name('add.to.basket');
Route::post('/basket/delete/{car}','BasketController@deleteFromBasket')->name('delete.to.basket');
Route::post('/basket/update/{car}','BasketController@updateQuantity')->name('update.to.basket');

//Ajax
Route::get('/ajax/basket','BasketController@refreshBasket')->name('ajax.refresh.basket');
