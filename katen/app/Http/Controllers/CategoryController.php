<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category(){
        $categories = Category::all();
        return view('admin.category.index',[
            'categories'=>$categories,
        ]);
    }

    function store_category(Request $request){
        Category::insert([
            'category_name'=>$request->category_name,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
}
