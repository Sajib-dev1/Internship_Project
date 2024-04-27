<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\AlertMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    function my_blog(){
        $my_blogs = Blog::where('bloger_id',Auth::id())->latest()->get();
        $blogs = Blog::where('status',1)->get();
        return view('user.my_blog',[
            'my_blogs'=>$my_blogs,
            'blogs'=>$blogs,
        ]);
    }

    function blog(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.blog',[
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
        Image::make($photo)->resize(750,540)->save(public_path('uploads/blog/'.$file_name));

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

        dispatch(new SendMailJob(0));
        return back()->with('success','Blog Store Successfull');
    }

    function blog_list(){
        $blogs = Blog::where('status',1)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.blog_list',[
            'blogs'=>$blogs,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }

    function blog_view($id){
        $blog_info = Blog::find($id);
        return view('user.blog_view',[
            'blog_info'=>$blog_info,
        ]);
    }

    function blog_edit($id){
        $blog_info = Blog::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.blog_edit',[
            'blog_info'=>$blog_info,
            'categories'=>$categories,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }

    function blog_update(Request $request,$id){
        if($request->image == null){
            $request->validate([
                'blog_title'=>'required',
                'category'=>'required',
                'tag'=>'required',
                'blog_des'=>'required',
                'summary_blog'=>'required',
            ]);
            Blog::find($id)->update([
                'bloger_id'=>$request->bloger_id,
                'blog_title'=>$request->blog_title,
                'category'=>$request->category,
                'tag'=>implode(',',$request->tag),
                'blog_des'=>$request->blog_des,
                'summary_title'=>$request->summary_title,
                'field_name'=>implode(',',$request->field_name),
                'summary_blog'=>$request->summary_blog,
                'updated_at'=>Carbon::now(),
            ]);
    
            return redirect()->route('blog.list')->with('update','Blog updated successfull');
        }
        else{
            $request->validate([
                'image'=>'required',
            ]);
            $blog_info = Blog::find($id);
            $delete_form = public_path('uploads/blog/'.$blog_info->image);
            unlink($delete_form);
    
            $photo = $request->image;
            $extension = $photo->extension();
            $file_name = uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/blog/'.$file_name));
    
            Blog::find($id)->update([
                'bloger_id'=>$request->bloger_id,
                'blog_title'=>$request->blog_title,
                'category'=>$request->category,
                'tag'=>implode(',',$request->tag),
                'blog_des'=>$request->blog_des,
                'summary_title'=>$request->summary_title,
                'field_name'=>implode(',',$request->field_name),
                'summary_blog'=>$request->summary_blog,
                'image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);
    
            return redirect()->route('blog.list')->with('update','Blog Updated successfull');
        }
    }

    function blog_soft_delete($id){
        Blog::find($id)->delete();
        return back()->with('delete','Blog Soft delete successfully');
    }

    function soft_delete(){
        $blogs = Blog::onlyTrashed()->get();
        return view('user.soft_delete',[
            'blogs'=>$blogs,
        ]);
    }

    function blog_replay($id){
        Blog::onlyTrashed()->find($id)->restore();

        return redirect()->route('blog.list')->with('update','Blog restore successfull');
    }

    function blog_delete($id){
        $blog_info = Blog::onlyTrashed()->find($id);
        $delete_form = public_path('uploads/blog/'.$blog_info->image);
        unlink($delete_form);
        Blog::onlyTrashed()->find($id)->forceDelete();
        return back()->with('delete','Blog delete successfull');
    }

    function blog_delete_own($id){
        $blog_info = Blog::find($id);
        $delete_form = public_path('uploads/blog/'.$blog_info->image);
        unlink($delete_form);
        Blog::find($id)->delete();

        return back()->with('deleted','Blog delete successfull');
    }
}
