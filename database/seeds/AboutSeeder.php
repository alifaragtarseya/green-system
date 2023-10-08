<?php

use Illuminate\Database\Seeder;
use \App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'about','image' => 'about','description' => 'about','title_en' => 'about','description_en' => 'about',],
            ['title' => 'about2','image' => 'about 2','description' => 'about 2','title_en' => 'about 2','description_en' => 'about 2',],
        ];

        foreach ($data as $get) {
            About::firstOrCreate($get);
        }
    }
}
