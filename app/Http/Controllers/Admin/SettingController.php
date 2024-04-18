<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function updateGeneral(Request $request)
    {
        $validatedData = $request->validate([
            'site_name' => ['required','string','max:255'],
            'site_email' => ['required','email','max:255'],
            'site_phone' => ['required','string'],
            'site_default_currency' => ['required','max:4'],
            'site_currency_icon' => ['required'],
            'site_currency_position' => ['required','in:left,right'],
            'num_sub_cat_in_home' => ['required','numeric'],
            'site_timezone' => ['required']
        ]);

        foreach ($validatedData as $key => $value){
            Setting::query()->updateOrCreate(
                ['key' =>$key],
                ['value' => $value]
            );
        }
        //reset cache
        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('General Setting Updated Successfully');
        return redirect()->back();
    }

    public function updatePusher(Request $request)
    {
        $validatedData = $request->validate([
            'pusher_app_id' => 'required',
            'pusher_key' => 'required',
            'pusher_secret' => 'required',
            'pusher_cluster' => 'required',
            'pusher_active' => 'required |boolean'
        ]);

        foreach ($validatedData as $key => $value){
            Setting::query()->updateOrCreate(
                ['key' =>$key],
                ['value' => $value]
            );
        }

        //reset cache
        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Pusher Setting Updated Successfully');
        return redirect()->back();

    }
}
