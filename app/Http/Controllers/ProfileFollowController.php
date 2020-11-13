<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileFollowController extends Controller
{
    public function store(User $profile){

        if($profile->id !== Auth::user()->id){
            if(count(Auth::user()->follows->where('id', $profile->id)) === 0){
                Auth::user()->follow($profile);
            }
        }


        return back();
    }
}
