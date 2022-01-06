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
        $appSetting = ['app_name'=>$app_name,'app_title'=>$app_title,'sologan'=>$sologan,'second_sologan'=>$second_sologan];

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
        $tops_add    = $request->tops_add;
        $bottom_add = $request->bottom_add;
        $add_code = ['popup_add'=>$popup_add,'tops_add'=>$tops_add,'bottom_add'=>$bottom_add];

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
}
