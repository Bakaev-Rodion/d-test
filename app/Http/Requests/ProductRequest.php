<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'productName' => 'required|max:255',
            'productPrice' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'productInfo' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'productName.required' => 'A name is required',
            'productPrice.required' => 'Price is required',
            'productPrice.regex' => 'Incorrect format of price',
            'productInfo.unique' => 'Product info required'
        ];
    }
}
