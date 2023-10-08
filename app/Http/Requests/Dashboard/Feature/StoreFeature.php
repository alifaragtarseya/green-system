<?php

namespace App\Http\Requests\Dashboard\Feature;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class StoreFeature extends FormRequest
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
            'ar.title' => [
                'required',
                'max:191'
            ],
            'en.title' => [
                'required',
                'max:191'
            ],
            'type' => 'required',
            'ar.description' => 'required',
            'en.description' => 'required',
            'ar.meta_keywords' => 'nullable',
            'en.meta_keywords' => 'nullable',
            'ar.meta_description' => 'nullable',
            'en.meta_description' => 'nullable',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                Rule::requiredIf(function() {
                    return Request::is('dashboard/features/store');
                })
            ]
        ];
    }
}
