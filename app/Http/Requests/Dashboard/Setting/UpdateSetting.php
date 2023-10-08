<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
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
            'site_name' => 'required|string|max:191',
            'sm_description' => 'required|string',
            'sm_description_en' => 'nullable|string',
            'whatsapp_phone' => 'nullable|string|max:191',
            'phone_1' => 'required|string|max:191',
            'phone_2' => 'required|string|max:191',
            'email_1' => 'required|string|email|max:191',
            'email_2' => 'nullable|string|email|max:191',
            'address' => 'nullable|string|max:191',
            'address_en' => 'nullable|string|max:191',
            'location' => 'nullable|url|max:191',
            'facebook' => 'nullable|url|max:191',
            'twitter' => 'nullable|url|max:191',
            'instagram' => 'nullable|url|max:191',
            'who_we_are_video' => 'nullable|url|max:191',
            'snapchat' => 'nullable|url|max:191',
            'tiktok' => 'nullable|url|max:191',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png',
            'logo_white' => 'nullable|image|mimes:jpeg,jpg,png',
            'favicon' => 'nullable|image|mimes:jpeg,jpg,png',
            'favicon_white' => 'nullable|image|mimes:jpeg,jpg,png',
            'contact_us_img' => 'nullable|image|mimes:jpeg,jpg,png',
        ];
    }
}
