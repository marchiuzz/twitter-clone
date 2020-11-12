<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index()
    {
        return view('home', ['tweets' => Auth::user()->timeline()]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required|max:255',
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $validatedData['body'],
        ]);

        return back();

    }
}
