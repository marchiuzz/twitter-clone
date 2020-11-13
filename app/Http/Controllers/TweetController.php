<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tweets = Auth::user()->timeline(); //todo: later change
        $tweets = Tweet::all();
        return view('tweets.index', ['tweets' => $tweets]);
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
