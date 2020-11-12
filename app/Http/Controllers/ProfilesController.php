<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $profile){

        return view('profiles.show', compact('profile'));
    }
}
