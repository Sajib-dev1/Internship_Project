<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    function uses(){
        $users = User::where('id','!=',Auth::id())->get();
        return view('admin.user.uses',[
            'users'=>$users,
        ]);
    }

    function user_profile(){
        return view('admin.user.user_profile');
    }

    function user_update(Request $request){
       if($request->photo == null){
        User::find(Auth::id())->update([
            'name'=>$request->name,
            'update_at'=>Carbon::now(),
        ]);
        return back()->with('updated','Information Update Successfull');
       }
       else{
        $photo = $request->photo;
        $extension = $photo->extension();
        $file_name = Auth::id().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/user/'.$file_name));

        User::find(Auth::id())->update([
            'name'=>$request->name,
            'photo'=>$file_name,
            'update_at'=>Carbon::now(),
        ]);
        return back()->with('updated','Information Update Successfull');
       }
       
    }
}
