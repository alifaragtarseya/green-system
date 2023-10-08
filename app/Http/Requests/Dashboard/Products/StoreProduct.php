<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                Rule::requiredIf(function() {
                    return Request::is('dashboard/products/store');
                })
            ],
            'ar.title' => [
                'required',
                'max:191',
                // Rule::unique('products', 'title')->ignore($this->route('id'))
            ],
            'en.title' => [
                'required',
                'max:191',
                // Rule::unique('products', 'title')->ignore($this->route('id'))
            ],
            'category_id'  =>  'required',
            'link'  =>  'nullable',
            'ar.description' => 'required',
            'en.description' => 'required'
        ];
    }
}
