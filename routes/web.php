<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ProfileFollowController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetController;
use App\Models\Tweet;
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

//dd(Tweet::withCount(['likes', 'dislikes'])->get('attributes'));

Route::get('/', function () {
    if(Auth::guest()){
        return view('auth.login');
    }
    return redirect('/tweets');
});

Fortify::loginView(function () {
    return view('auth.login');
});
Fortify::registerView(function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function(){
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetController::class, 'store']);

    Route::get('/profiles/{profile:username}', [ProfilesController::class, 'show'])->name('profile');
    Route::post('/profiles/{profile}/follow', [ProfileFollowController::class, 'store'])->name('profile.follow');


    Route::get('/profiles/{profile:username}/edit', [ProfilesController::class, 'edit'])->name('profile.edit')->middleware('can:edit,profile');
    Route::patch('/profiles/{profile:username}', [ProfilesController::class, 'update'])->name('profile.update')->middleware('can:update,profile');

    Route::get('/explore', [ExploreController::class, 'index']);

    Route::post('/tweets/{tweet}/like', [LikesController::class, 'store']);
});




Route::get('/logout', function(){
    Auth::logout();

    return back();
});
