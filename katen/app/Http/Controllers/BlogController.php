<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

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
}
