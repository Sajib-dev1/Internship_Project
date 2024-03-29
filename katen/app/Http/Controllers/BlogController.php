<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    function blog(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin_sorce.blog_post.blog',[
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }

    function blog_store(Request $request){
        $request->validate([
            'blog_title'=>'required',
            'category'=>'required',
            'tag'=>'required',
            'blog_des'=>'required',
            'summary_blog'=>'required',
            'image'=>'required',
        ]);
        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/blog/'.$file_name));

        Blog::insert([
            'bloger_id'=>$request->bloger_id,
            'blog_title'=>$request->blog_title,
            'category'=>$request->category,
            'tag'=>implode(',',$request->tag),
            'blog_des'=>$request->blog_des,
            'summary_title'=>$request->summary_title,
            'field_name'=>implode(',',$request->field_name),
            'summary_blog'=>$request->summary_blog,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        $suvscrivers = Subscriber::all();
        foreach ($suvscrivers as $subs) {
            Mail::to($request->email)->send(new InvoiceMail($subs->email));
        }

        return back()->with('success','New Blog added successfull');
    }

    function blog_list(){
        $blogs = Blog::all();
        return view('admin_sorce.blog_post.blog_list',[
            'blogs'=>$blogs,
        ]);
    }
    
}
