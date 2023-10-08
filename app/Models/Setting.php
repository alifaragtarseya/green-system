<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'site_name', 'sm_description','sm_description_en','phone_1','phone_2', 'whatsapp_phone', 'email_1', 'email_2', 'logo', 'logo_white', 'favicon',
        'favicon_white', 'address', 'address_en', 'facebook', 'twitter', 'instagram', 'snapchat', 'location', 'who_we_are_video', 'contact_us_img','tiktok'
    ];

}
