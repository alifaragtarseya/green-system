<?php

namespace App\Providers;

use App\Models\MySetting;
use App\Models\Setting;
use App\Models\Services;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SharingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
            view()->share('path', url('dashboard/'));
            view()->share('setting', Setting::first());
            view()->share('mySetting', MySetting::all());
            view()->share('servicesForm', Services::where('hide', 0)->get());
        }
    }
}
