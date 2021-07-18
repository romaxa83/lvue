<?php

namespace App\Http\Requests\Api\V1\Role;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => ['required', 'string'],
            'sort'  => ['nullable', 'number'],
            'active'  => ['nullable', 'boolean'],
        ];
    }
}

