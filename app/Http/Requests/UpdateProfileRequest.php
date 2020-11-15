<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    use PasswordValidationRules;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $validation = [
            'username' => ['required', 'string', Rule::unique('users')->ignore($this->profile), 'without_spaces'],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->profile),
            ],
            'password' => $this->passwordRules(),
        ];


        return $validation;
    }
}
