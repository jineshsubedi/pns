<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AppConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Library\Imagetool;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-setting',   ['only' => ['create', 'store']]);
        $this->middleware('permission:read-setting',   ['only' => ['index']]);
        $this->middleware('permission:update-setting',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-setting',   ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $settings = Setting::latest()->paginate(20)->withQueryString();
        return view('Admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['status'] = AppConstant::REQUIRED;
        return view('Admin.setting.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request): RedirectResponse
    {
        $logo = $icon = '';
        if($request->hasFile('logoFile'))
        {
            $file = $request->file('logoFile');
            $logo = 'setting/logo/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);

        }
        if($request->hasFile('iconFile'))
        {
            $file = $request->file('iconFile');
            $icon = 'setting/icon/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $icon);
        }
        Setting::create($request->validated() + [
            'logo' => $logo,
            'icon' => $icon,
        ]);
        return redirect()->route('admin.settings.index')->with('success', 'Setting Added Successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting): View
    {
        $data['status'] = AppConstant::REQUIRED;
        return view('Admin.setting.edit', compact('setting', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting): RedirectResponse
    {
        $logo = $setting->logo;
        $icon = $setting->icon;
        if($request->hasFile('logoFile'))
        {
            if($logo != '')
                $this->removeFile($logo);
            $file = $request->file('logoFile');
            $logo = 'setting/logo/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);

        }
        if($request->hasFile('iconFile'))
        {
            if($icon != '')
                $this->removeFile($icon);
            $file = $request->file('iconFile');
            $icon = 'setting/icon/'.time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $icon);
        }
        $setting->update($request->validated() + [
            'logo' => $logo,
            'icon' => $icon,
        ]);
        return redirect()->route('admin.settings.index')->with('success', 'Setting Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting): RedirectResponse
    {
        if($setting->icon != null)
            $this->removeFile($setting->icon);
        if($setting->logo != null)
            $this->removeFile($setting->logo);
        $setting->delete();
        return back()->with('success', 'Setting Deleted Successfully!');
    }

    private function removeFile($file): void
    {
        if(Storage::exists($file))
            Storage::delete($file);
    }
}
