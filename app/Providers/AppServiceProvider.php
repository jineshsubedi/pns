<?php

namespace App\Providers;

use App\Constants\AppConstant;
use App\Models\Setting;
use App\Observers\SettingObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::where('status', AppConstant::ACTIVE)->first();
        // $setting->logo_path = isset($setting) ? $setting->logo_path : url(asset('images/logo.png'));
        // $setting->icon_path = isset($setting) ? $setting->icon_path : url(asset('images/logo.png'));
        // $setting->logo_thumb = isset($setting) ? $setting->logo_thumb : url(asset('images/logo.png'));
        // $setting->icon_thumb = isset($setting) ? $setting->icon_thumb : url(asset('images/logo.png'));
        $config = array(
            'app.settings' => $setting,
        );
        config($config);

        Setting::observe(SettingObserver::class);
    }
}
