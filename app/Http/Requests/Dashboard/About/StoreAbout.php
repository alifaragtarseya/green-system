<?php

namespace App\Http\Requests\Dashboard\About;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbout extends FormRequest
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
            'title' => ['required', 'max:191'],
            'description' => 'required',
            'title_en' => ['nullable', 'max:191'],
            'description_en' => 'nullable',
            'image' => ['nullable', 'mimes:jpeg,jpg,png',]
        ];
    }
}
