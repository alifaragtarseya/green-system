<?php

use Illuminate\Database\Seeder;
use \App\Models\MetasBanners;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['page' => 'contact','title' => 'contact us','keywords' => 'contact us','description' => 'contact us',],
            ['page' => 'home','title' => 'home','keywords' => 'home','description' => 'home',],
            ['page' => 'about','title' => 'about','keywords' => 'about','description' => 'about',],
            ['page' => 'services','title' => 'services','keywords' => 'services','description' => 'services',],
            ['page' => 'blogs','title' => 'blogs','keywords' => 'blogs','description' => 'blogs',],
        ];

        foreach ($data as $get) {
            MetasBanners::updateOrCreate($get);
        }
    }
}
