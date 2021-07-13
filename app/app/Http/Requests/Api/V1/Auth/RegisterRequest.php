<?php

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => ['required', 'string'],
            'email'  => ['required', 'email'],
//             @see https://laravel.com/docs/8.x/validation#validating-passwords
            'password'  => ['required', 'string', Password::min(5)],
        ];
    }
}
