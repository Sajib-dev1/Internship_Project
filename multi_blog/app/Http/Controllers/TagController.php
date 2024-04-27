<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tag(){
        $tages = Tag::all();
        return view('admin.frontend.tag.tag',[
            'tages'=>$tages
        ]);
    }

    function store_tag(Request $request){
        $request->validate([
            'tag_name'=>'required',
        ]);
        Tag::insert([
            'tag_name'=>$request->tag_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Tag store successfull');
    }

    function tag_update(Request $request, $id){
        $request->validate([
            'tag_name'=>'required',
        ]);

        Tag::find($id)->update([
            'tag_name'=>$request->tag_name,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('tag')->with('update',"Tag Update successfull");
    }

    function tag_check_list(Request $request){
        foreach ($request->tag_all_id as $tag_all_id) {
            Tag::find($tag_all_id)->delete();
        }
        return back()->with('check_delete',"Checked Tag delete successfull");
    }

    function tag_delete($id){
        Tag::find($id)->delete();
        return back()->with('delete',"Tag delete successfull");
    }

    // function tag_checked_delete(Request $request){
    //     foreach ($request->tag_id as $tag_id) {
    //         Tag::find($tag_id)->delete();
    //     }
    //     return back()->with('check_delete',"Checked Tag delete successfull");
    // }

    function tag_blog($id){
        $all = '';
        foreach(Blog::all() as $blog){
            $explode = explode( ',',$blog->tag );
            if(in_array( $id, $explode )){
                $all .= $blog->id.',';
            }
        }
        $explode2 = explode(',',$all);
         $blogs = Blog::find($explode2);
        return view('frontend.tag.tag',[
            'blogs'=>$blogs,
        ]);
    }
}
