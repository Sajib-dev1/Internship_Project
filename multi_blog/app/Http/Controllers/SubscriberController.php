<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Instragam;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function subscriber_store(Request $request){
        $request->validate([
            'email'=>'required|unique:subscribers'
        ]);

        Subscriber::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success','your subscriber successfull');
    }

    function loadmore_store(Request $request){
        $data = $request->all();
        $latest_blogs = Blog::where('status',1)->where(function($q) use ($data){
            if(!empty($data['search_input']) && $data['search_input'] != '' && $data['search_input'] != 'undefind'){
                $q->where(function($q) use ($data){
                    $q->where('blog_title', 'like', '%'.$data['search_input'].'%');
                });
            }
        })->latest()->paginate(6);
        $instragams = Instragam::latest()->get();
        return view('frontend.all_page.all_blog',[
            'latest_blogs'=>$latest_blogs,
            'instragams'=>$instragams,
        ]);
    }
}
