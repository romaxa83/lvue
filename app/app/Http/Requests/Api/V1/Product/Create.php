<?php

namespace App\Http\Requests\Api\V1\Product;

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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'sort' => ['nullable', 'number'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
