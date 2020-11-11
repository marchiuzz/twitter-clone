<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
})->middleware('auth');

Fortify::loginView(function () {
    return view('auth.login');
});
Fortify::registerView(function () {
    return view('auth.register');
});

Route::get('/logout', function(){
    Auth::logout();

    return back();
});
