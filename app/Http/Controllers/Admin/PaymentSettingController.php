<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use App\Services\PaymentSettingsService;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index(){
        return view('admin.payment-setting.index');
    }

    public function paypalSetting(Request $request)
    {
        $validatedData = $request->validate([
            'paypal_status' => ['required','in:active,inactive'],
            'paypal_mode'=>['required','in:sandbox,live'],
            'paypal_country'=>['required'],
            'paypal_currency'=>['required'],
            'paypal_currency_rate'=>['required','numeric'],
            'paypal_client_id'=>['required'],
            'paypal_secret_key'=>['required'],
            'paypal_app_key'=>['required']
        ]);

        foreach ($validatedData as $key=>$value){
            PaymentSetting::query()->updateOrCreate(
                ['key'=>$key],
                ['value'=>$value]
            );
        }
        
        //update Catch
        $paypalSettingsService = app(PaymentSettingsService::class);
        $paypalSettingsService->clearCachedSettings();

        toastr()->success('paypal Setting is updated successfully');
        return redirect()->back();
    }
}
