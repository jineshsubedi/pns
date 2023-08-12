<?php

namespace App\Observers;

use App\Constants\AppConstant;
use App\Models\Setting;

class SettingObserver
{
    /**
     * Handle the Setting "created" event.
     */
    public function created(Setting $setting): void
    {
        if($setting->status == AppConstant::ACTIVE)
        {
            Setting::where('id', '!=', $setting->id)->update(['status' => 0]);
        }
    }

    /**
     * Handle the Setting "updated" event.
     */
    public function updated(Setting $setting)
    {
        if($setting->isDirty('status') && $setting->status == AppConstant::ACTIVE)
        {
            Setting::where('id', '!=', $setting->id)->update(['status' => 0]);
        }else{
            Setting::latest()->first()->update(['status' => 1]);
        }
    }

    /**
     * Handle the Setting "deleted" event.
     */
    public function deleted(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "restored" event.
     */
    public function restored(Setting $setting): void
    {
        //
    }

    /**
     * Handle the Setting "force deleted" event.
     */
    public function forceDeleted(Setting $setting): void
    {
        //
    }
}
