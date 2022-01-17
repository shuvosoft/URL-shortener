<?php

namespace App\Http\Controllers;

use App\Models\Link;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UrlLinkController extends Controller
{
    public function short_url(Request $request){
        $this->validate($request,[
           'url'=>'required'
        ]);
        if (Auth::check()){
            $userId = Auth::id();
        }else{
            $userId = null;
        }
        $letter = array_merge(range('a','z'), range('A','Z'));
        $randInt = rand(0,9);
        $hash = $letter[rand(0,51)] . $randInt . Str::random(4);
//        dd($hash);
        $created = Link::create([
           'link' => $request->url,
           'user_id' => $userId,
           'hash' => $hash,
        ]);
        if ($created){
            return response()->json(['success'=>true,'message'=>'Link Shorted successfully','data'=>$created]);
        }
        return response()->json(['success'=>false,'message'=>'Link Shorted fail','data'=>null]);
    }

    public function redirect_link($hash){

        $link = Link::where('hash',$hash)->first();
        if ($link){
            $link->increment('view_count');
            return redirect()->to($link->link);
        }
        return redirect()->back();
    }
}
