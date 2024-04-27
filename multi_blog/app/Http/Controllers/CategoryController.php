<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category(){
        $categories = Category::all();
        return view('admin.frontend.category.category',[
            'categories'=>$categories,
        ]);
    }

    function store_category(Request $request){
        $request->validate([
            'category_name'=>'required',
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Category store successfull');
    }

    function category_update(Request $request, $id){
        $request->validate([
            'category_name'=>'required',
        ]);

        Category::find($id)->update([
            'category_name'=>$request->category_name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('update',"Category Update successfull");
    }

    function category_delete($id){
        $blog_infos = Blog::where('category',$id)->get();
        foreach ($blog_infos as $blog_info) {
            Blog::find($blog_info->id)->update([
                'category'=>1,
            ]);
        }
        Category::find($id)->delete();
        return back()->with('delete',"Category delete successfull");
    }

    function category_checked_delete(Request $request){
        foreach ($request->category_id as $category_id) {
            Category::find($category_id)->delete();
        }
        return back()->with('delete',"Checked category delete successfull");
    }
}
