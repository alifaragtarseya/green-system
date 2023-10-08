<?php

use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'site_name' => 'الانشاء و التعمير',
            'sm_description' => 'الانشاء و التعمير',
            'email_1' => 'info@swar.com',
            'phone_1' => '+201149632353',
            'logo' => 'public/images/setting/20102653313736775.png',
            'logo_white' => 'public/images/setting/20102653313635746.png',
            'favicon' => 'public/images/setting/20102653313421437.png',
            'favicon_white' => 'public/images/setting/20102653313849085.png',
        ];
        Setting::create($data);

        Slider::create([
            'title'  => 'test slider',
            'image'  => 'public/images/setting/20102653313736775.png',
            'description'  => 'اسلايدر',
            'title_en'  => 'اسلايدر',
            'description_en'  => 'slider'
        ]);
    }
}
