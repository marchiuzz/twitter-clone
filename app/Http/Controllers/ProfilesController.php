<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    use PasswordValidationRules;

    public function show(User $profile){

        $tweets = $profile->timeline();

        return view('profiles.show', ['tweets' => $tweets, 'profile' => $profile]);
    }

    public function edit(User $profile){
        return view('profiles.edit', compact('profile'));
    }

    public function update(User $profile, UpdateProfileRequest $request){
        $validation = $request->validated();

        if($request->avatar){
            $validation['avatar'] = $request->avatar->store('avatars');
        }

        $profile->update($validation);

        return back();
    }
}
