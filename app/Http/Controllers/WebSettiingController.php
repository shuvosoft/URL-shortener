<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class WebSettiingController extends Controller
{
    public function setting(){
        return view('layouts.backend.setting');
    }

    public function get_web_setting(){
        $settings = Setting::pluck('setting_value','setting_name');
//        dd($settings);
        return $settings;
    }

    public function store_web_setting(Request $request){
//           return $request->all();
        $fb_link        = $request->fb_link;
        $youtube_link   = $request->youtube_link;
        $linkedin_link  = $request->linkedin_link;
        $instagram_link = $request->instagram_link;
        $settings       = ['fb_link'=>$fb_link,'youtube_link'=>$youtube_link,'linkedin_link'=>$linkedin_link,'instagram_link'=>$instagram_link];
//   dd($settings);
        foreach ($settings as $key=>$value){
            Setting::updateOrCreate(
              ['setting_name' => $key],
              [
                  'setting_name' => $key,
                  'setting_value' => $value
              ]
            );
        }
    }

    public function footer(Request $request){
        $footer_text = $request->footer_text;

        $footer      = ['footer_text'=>$footer_text];

        foreach ($footer as $key=>$value){
            Setting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value
                ]
            );
        }
    }

    public function contract(Request $request){
        $email      = $request->email;
        $phn_number = $request->phn_number;
        $contract   = ['email'=>$email,'phn_number'=>$phn_number];
        foreach ($contract as $key=>$value){
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
