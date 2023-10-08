<?php

namespace App\Http\Requests\Dashboard\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class StoreProject extends FormRequest
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
                    return Request::is('dashboard/projects/store');
                })
            ],
            'ar.title' => [
                'required',
                'max:191',
                Rule::unique('projects', 'title')->ignore($this->route('id'))
            ],
            'en.title' => [
                'required',
                'max:191',
                Rule::unique('projects', 'title')->ignore($this->route('id'))
            ],
            'ar.description' => 'required',
            'en.description' => 'required',
            'ar.meta_keywords' => 'nullable',
            'en.meta_keywords' => 'nullable',
            'ar.meta_description' => 'nullable',
            'en.meta_description' => 'nullable',
        ];
    }
}
