<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'digits:10', 'max:255'],
            'address' => ['required', 'max:255', 'string'],
        ];
    }
}