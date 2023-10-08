<?php

namespace App\Http\Requests\Dashboard\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlider extends FormRequest
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
            'ar.title' => ['required', 'max:191'],
            'ar.description' => 'nullable',
            'en.title' => ['required', 'max:191'],
            'en.description' => 'nullable',
            'image' => ['nullable', 'mimes:jpeg,jpg,png',],
            'link' => ['nullable', 'url'],
        ];
    }
}
