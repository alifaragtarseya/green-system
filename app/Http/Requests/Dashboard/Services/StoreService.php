<?php

namespace App\Http\Requests\Dashboard\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class StoreService extends FormRequest
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
                'max:191',
                Rule::unique('services', 'title')->ignore($this->route('id'))
            ],
            'en.title' => [
                'required',
                'max:191',
                Rule::unique('services', 'title')->ignore($this->route('id'))
            ],
            'icon' => [
                'nullable',
                'max:191'
            ],
            'ar.description' => 'required',
            'en.description' => 'required',
            'ar.meta_keywords' => 'nullable',
            'en.meta_keywords' => 'nullable',
            'ar.meta_description' => 'nullable',
            'en.meta_description' => 'nullable',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                // Rule::requiredIf(function() {
                //     return Request::is('dashboard/services/store');
                // })
            ]
        ];
    }
}
