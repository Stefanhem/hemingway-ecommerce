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
            'name' => 'required',
            'price' => 'required|integer',
            'quantityInStock' => 'required|integer',
            'isOnSpecialOffer' => 'boolean',
            'description' => 'required',
            'image' => 'file',
            'idType' => 'required|exists:product_types,id'
        ];
    }
}
