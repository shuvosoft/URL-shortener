<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.backend.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request)
    {
        $this>$this->validate($request,[
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::findOrFail(auth()->id());
        $user->update($request->only([
            'name','email'
        ]));
    }

    public function password_update(Request $request){
//        $this->validate($request,[
//            'password' => 'required|string|min:8|max:24|confirmed',
//            'old_password'=> 'required|string|max:24'
//        ]);
        $user = User::find(auth()->id());
        if (Hash::check($request->old_password, $user->password)){
            $user->update([
               'password' => Hash::make($request->password)
            ]);
            return response()->json([
              'message' => 'Password Update Successfully'
            ]);

        }else{
            return response([
                'message' => 'Whops ! Old password dos not match !!'
            ]);
        }
     }

     public function image_upload(Request $request){
        $user = User::find(auth()->id());

         $file = $request->avatar;
         if ($request->avatar){
             list($type,$file) = explode(';', $request->avatar);
             list(, $extension) = explode('/', $type);
             $filename = uniqid().'.'.$extension;
             $source = fopen($request->avatar, 'r');
             $destination = fopen(public_path().'/user_image/'. $filename, 'w');
             stream_copy_to_stream($source,$destination);
             fclose($source);
             fclose($destination);
             $avatar = $filename;
//             dd($avatar);
             $user->update([
                 'avatar' => $avatar
             ]);
         }

     }


     public function user_list(){
         return view('layouts.backend.user_list');
     }


     public function user_all(Request $request){
        $users = User::latest()
            ->where('name','LIKE','%'.$request->search.'%')
            ->paginate(2);
//        dd($users);
        return response()->json($users);
     }

//link------------------------

    public function link(){
        return view('layouts.backend.link');
    }

    public function get_link(Request $request){
        $links = Link::latest()->paginate(2);
        return response()->json($links);
    }
}
