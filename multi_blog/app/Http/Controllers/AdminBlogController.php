<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\InputUser;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    function admin_blog_list(){
        $blogs = Blog::all();
        return view('admin.report_info.admin_blog_list',[
            'blogs'=>$blogs,
        ]);
    }

    function getblogstatus(Request $request){
        Blog::find($request->blog_id)->update([
            'status'=>$request->status,
            'updated_at'=>Carbon::now(),
        ]);
    }

    function subscriber_all_list(){
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber.subscriber_all_list',[
            'subscribers'=>$subscribers,
        ]);
    }

    function message_box(){
        $input_users = InputUser::latest()->get();
        return view('admin.subscriber.message_box',[
            'input_users'=>$input_users,
        ]);
    }

    function input_message_delete($id){
        InputUser::find($id)->delete();

        return back()->with('delete','message delete successfull');
    }

    function subscriber_list_delete($id){
        Subscriber::find($id)->delete();

        return back()->with('delete','Sucscriber delete successfull');
    }
}
