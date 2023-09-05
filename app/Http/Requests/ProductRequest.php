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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        'supplier_id'=> 'required',
        'product_name' => 'required|min:3',
        'product_code' => 'required|',
        'logo_image' => 'nullable|image|mimes:jpeg,png,gif|dimensions:min_width=100,min_height=100',
        'description' => 'nullable',
        'unit_price' => 'required|numeric|between:0,999999.99',
        'quantity' => 'required|integer|min:0',
        'status' => 'boolean',
        ];
    }
}
