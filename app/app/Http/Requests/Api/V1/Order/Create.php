<?php

namespace App\Http\Requests\Api\V1\Order;

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
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'code' => ['required', 'string'],
            'address' => ['required', 'string'],
            'address_2' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'zipcode' => ['nullable', 'string'],
            'items' => ['required', 'array'],
            'items.*.productId' => ['required', 'integer'],
            'items.*.quantity' => ['required', 'numeric'],
        ];
    }
}
