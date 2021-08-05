<?php

namespace App\Http\Requests\Api\V1\Link;

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
            'productIds' => ['required', 'array'],
        ];
    }
}
