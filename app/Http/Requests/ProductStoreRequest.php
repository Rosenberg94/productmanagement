<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:255'],
            'code' => ['bail', 'required', 'string', 'max:255'],
            'amount' => ['bail', 'integer', 'max:2555555'],
            'price' => ['max:12'],
        ];
    }
}
