<?php

namespace App\Http\Requests\Front\Messages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class StoreMessage extends FormRequest
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
            'username' => 'required|max:191|min:3',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:191|min:7|regex:/^([0-9\s\-\+\(\)]*)$/',
            'message' => 'required',
            'subject' => [
                'max:191',
                'min:6',
                Rule::requiredIf(function() {
                    return Request::is('contact');
                })
            ],
            'service_id' => [
                'nullable',
                Rule::requiredIf(function() {
                    return Request::is('request');
                })
            ],
        ];
    }
}
