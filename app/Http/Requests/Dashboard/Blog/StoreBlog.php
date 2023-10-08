<?php

namespace App\Http\Requests\Dashboard\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class StoreBlog extends FormRequest
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
            ],
            'en.title' => [
                'required',
                'max:191',
            ],
            'ar.description' => 'required',
            'en.description' => 'required',
            'category_id' => 'required',
            'model_id' => 'nullable',
            'model_type' => 'nullable',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                Rule::requiredIf(function() {
                    return Request::is('dashboard/blogs/store');
                })
            ]
        ];
    }
}
