<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileFollowController extends Controller
{
    public function store(User $profile)
    {
        Auth::user()->toggleFollow($profile);

        return back();
    }
}
