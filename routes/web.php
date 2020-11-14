<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileFollowController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetController;
use Illuminate\Contracts\Auth\Access\Gate;
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
    if(Auth::guest()){
        return view('auth.login');
    }
    return redirect('/tweets');
});

Route::middleware('auth')->group(function(){
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetController::class, 'store']);

    Route::get('/profiles/{profile:username}', [ProfilesController::class, 'show'])->name('profile');
    Route::post('/profiles/{profile}/follow', [ProfileFollowController::class, 'store'])->name('profile.follow');


    Route::get('/profiles/{profile:username}/edit', [ProfilesController::class, 'edit'])->name('profile.edit')->middleware('can:edit,profile');
    Route::patch('/profiles/{profile:username}', [ProfilesController::class, 'update'])->name('profile.update')->middleware('can:update,profile');
});


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
