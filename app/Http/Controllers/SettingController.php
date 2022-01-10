<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function app_setting(){
        return view('layouts.backend.setting.setting');
    }

    public function app_setting_get(){
        $settings = Setting::pluck('setting_value','setting_name');
//        dd($settings);
        return $settings;
    }

    public function app_setting_store(Request $request){
        $app_name       = $request->app_name;
        $app_title      = $request->app_title;
        $sologan        = $request->sologan;
        $second_sologan = $request->second_sologan;
        $appSetting     = ['app_name'=>$app_name,'app_title'=>$app_title,'sologan'=>$sologan,'second_sologan'=>$second_sologan];

        foreach ($appSetting as $key=>$value){
            Setting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value
                ]
            );
        }
    }

    public function app_url_store(Request $request){
        $redirect_status = $request->redirect_status;
        $app_url = ['redirect_status'=>$redirect_status];

        foreach ($app_url as $key=>$value){
            Setting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value
                ]
            );
        }

    }

    public function app_add_store(Request $request){
        $popup_add  = $request->popup_add;
        $tops_add   = $request->tops_add;
        $bottom_add = $request->bottom_add;
        $add_code   = ['popup_add'=>$popup_add,'tops_add'=>$tops_add,'bottom_add'=>$bottom_add];

        foreach ($add_code as $key=>$value){
            Setting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value
                ]
            );
        }
    }

    public function app_emailSend_store(Request $request){
        $email_from_name       = $request->email_from_name;
        $mail_from_address     = $request->mail_from_address;
        $email_smtp_host       = $request->email_smtp_host;
        $email_port            = $request->email_port;
        $email_driver          = $request->email_driver;
        $email_user_Name       = $request->email_user_Name;
        $email_password        = $request->email_password;
        $email_encryption_type = $request->email_encryption_type;

        $sendEmail             = ['email_from_name'=>$email_from_name,'mail_from_address'=>$mail_from_address,'email_smtp_host'=>$email_smtp_host,
                                 'email_port'=>$email_port,'email_driver'=>$email_driver,'email_user_Name'=>$email_user_Name,'email_password'=>$email_password,'email_encryption_type'=>$email_encryption_type];

        foreach ($sendEmail as $key=>$value){
            Setting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value
                ]
            );
        }
    }
}
