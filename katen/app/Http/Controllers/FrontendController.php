<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $blogs = Blog::where('status',1)->latest()->get();
        $categories = Category::all();
        $tags = Tag::all();
        $subscriber = Subscriber::count();
        return view('frontend.index',[
            'blogs'=>$blogs,
            'categories'=>$categories,
            'tags'=>$tags,
            'subscriber'=>$subscriber,
        ]);
    }

    function blog_sngle($id){
        $blog_info = Blog::find($id);
        $categories = Category::all();
        $blogs = Blog::where('status',1)->latest()->get();
        $tags = Tag::all();
        $subscriber = Subscriber::count();
        return view('frontend.blog_sngle',[
            'blog_info'=>$blog_info,
            'categories'=>$categories,
            'blogs'=>$blogs,
            'tags'=>$tags,
            'subscriber'=>$subscriber,
        ]);
    }

    function subscriber_store(Request $request){
        $request->validate([
            'email'=>'required | unique:subscribers'
        ]);
        Subscriber::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success',"You are subscribed");
    }
}
