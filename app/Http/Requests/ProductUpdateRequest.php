<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:255'],
            'code' => ['bail', 'required', 'string', 'max:255'],
            'amount' => ['bail', 'integer', 'max:255255'],
            'price' => ['max:12'],
            'manufacturer_id' => ['bail', 'integer', 'max:1000'],
        ];
    }
}
