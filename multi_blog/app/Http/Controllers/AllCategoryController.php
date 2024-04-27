<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminSocile;
use App\Models\Blog;
use App\Models\Category;
use App\Models\FrontendLogo;
use App\Models\Instragam;
use App\Models\Populer;
use App\Models\Submenu;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AllCategoryController extends Controller
{
    function category_item($id){
        $popular_posts = Populer::groupBy('blog_id')
        ->selectRaw('blog_id, sum(view_total) as sum')
        ->orderBy('sum','DESC')->get();
        $popular_blog = Blog::groupBy('category')
        ->selectRaw('sum(status) as sum,category')
        ->orderBy('sum','DESC')->get();
        $blog_single = Blog::find($id);
        $admin_sociles = AdminSocile::all();
        $logo = FrontendLogo::first();
        $admin_info = Admin::first();
        $categories = Category::all();
        $blogs = Blog::latest()->get();
        $tags = Tag::all();
        $cat_info = Category::find($id);
        $blog_cats = Blog::where('category',$id)->latest()->get();
        $instragams = Instragam::latest()->get();
        return view('frontend.all_category.index',[
            'popular_posts'=>$popular_posts,
            'cat_info'=>$cat_info,
            'blog_cats'=>$blog_cats,
            'popular_blog'=>$popular_blog,
            'admin_sociles'=>$admin_sociles,
            'blog_single'=>$blog_single,
            'logo'=>$logo,
            'admin_info'=>$admin_info,
            'categories'=>$categories,
            'blogs'=>$blogs,
            'tags'=>$tags,
            'instragams'=>$instragams,
        ]);
    }

    function allSubmenu($id){
        $popular_posts = Populer::groupBy('blog_id')
        ->selectRaw('blog_id, sum(view_total) as sum')
        ->orderBy('sum','DESC')->get();
        $popular_blog = Blog::groupBy('category')
        ->selectRaw('sum(status) as sum,category')
        ->orderBy('sum','DESC')->get();
        $blog_single = Blog::find($id);
        $admin_sociles = AdminSocile::all();
        $logo = FrontendLogo::first();
        $admin_info = Admin::first();
        $categories = Category::all();
        $blogs = Blog::latest()->get();
        $tags = Tag::all();
        $submenu_info = Submenu::find($id);
        $cat_id = $submenu_info->category_id;
        $blog_cats = Blog::where('category',$cat_id)->latest()->paginate(10);
        $instragams = Instragam::latest()->get();
        return view('frontend.all_category.allSubmenu',[
            'submenu_info'=>$submenu_info,
            'popular_posts'=>$popular_posts,
            'popular_blog'=>$popular_blog,
            'blog_cats'=>$blog_cats,
            'blog_single'=>$blog_single,
            'admin_sociles'=>$admin_sociles,
            'logo'=>$logo,
            'admin_info'=>$admin_info,
            'categories'=>$categories,
            'blogs'=>$blogs,
            'tags'=>$tags,
            'instragams'=>$instragams,
        ]);
    }
}
