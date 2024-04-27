<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    function user_profile(){
        $my_blogs = Blog::where('bloger_id',Auth::id())->latest()->get();
        $blogs = Blog::where('status',1)->get();
        return view('user.user_profile',[
            'my_blogs'=>$my_blogs,
            'blogs'=>$blogs,
        ]);
    }

    function user_profile_update(Request $request){
        if(Auth::user()->photo == null){
            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/user/'.$file_name));

            User::find(Auth::id())->update([
                'name'=>$request->name,
                'profetion'=>$request->profetion,
                'about'=>$request->about,
                'photo'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('update','User update successfull');
        }
        else{
            $user_info = User::find(Auth::id());
            $delete_form = public_path('uploads/user/'.$user_info->photo);
            unlink($delete_form);
    
            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/user/'.$file_name));
    
            User::find(Auth::id())->update([
                'name'=>$request->name,
                'profetion'=>$request->profetion,
                'about'=>$request->about,
                'photo'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);

            return back()->with('update','User update successfull');
        }
    }
}
