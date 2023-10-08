<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySetting extends Model
{
    public $guarded = [];

    public static function setMany($data)
    {
        foreach ($data as $key => $value) {
            if($value != null)
            Self::set($key, $value);
        }
    }

    private static function set($key, $value)
    {
        $setting = self::where('key',$key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        }else{
            MySetting::create(['key' => $key,'value' => $value]);
        }
    }
}
