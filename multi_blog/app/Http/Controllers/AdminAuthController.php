<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    function user_info(){
        $user_informations = User::latest()->get();
        return view('admin.report_info.user_info',[
            'user_informations'=>$user_informations,
        ]);
    }

    function user_delete($id){
        $users = User::find($id);
        if($users->photo == null){
            $blog_infos = Blog::where('bloger_id',$id)->get();
            foreach ($blog_infos as $blog_info) {
                $delete_form = public_path('uploads/blog/'.$blog_info->image);
                unlink($delete_form);
                Blog::find($blog_info->id)->forceDelete();
            }
            User::find($id)->delete();
            return back()->with('delete','User delete successfull');
        }
        else{
            $blog_infos = Blog::where('bloger_id',$id)->get();
            foreach ($blog_infos as $blog_info) {
                $delete_form = public_path('uploads/blog/'.$blog_info->image);
                unlink($delete_form);
                Blog::find($blog_info->id)->forceDelete();
            }
            $delete_form = public_path('uploads/user/'.$users->photo);
            unlink($delete_form);
    
            User::find($id)->delete();
            return back();
        }
        return back()->with('delete','User delete successfull');
    }
}
