<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(150);

        $settings  = Setting::where('setting_type','app_setting')->get();
        $appConfig = Arr::pluck($settings->toArray(),'setting_value','setting_name');
        View::share('appConfig',$appConfig);
//        dd($settings);
    }
}
