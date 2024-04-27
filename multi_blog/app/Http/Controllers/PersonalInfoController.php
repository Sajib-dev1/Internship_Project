<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminLogo;
use App\Models\AdminSocile;
use App\Models\Blog;
use App\Models\Category;
use App\Models\FrontendLogo;
use App\Models\Instragam;
use App\Models\Populer;
use App\Models\Socile;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    function personal_info($id){
        $popular_posts = Populer::groupBy('blog_id')
        ->selectRaw('blog_id, sum(view_total) as sum')
        ->orderBy('sum','DESC')->get();
        $personal_user_info = User::find($id);
        $personal_socile_icons = Socile::where('user_id',$id)->get();
        $blogs = Blog::where('bloger_id',$id)->where('status',1)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $instragams = Instragam::latest()->get();
        return view('frontend.all_page.personal',[
            'popular_posts'=>$popular_posts,
            'personal_user_info'=>$personal_user_info,
            'personal_socile_icons'=>$personal_socile_icons,
            'blogs'=>$blogs,
            'categories'=>$categories,
            'tags'=>$tags,
            'instragams'=>$instragams,
        ]);
    }

    function all_caegory(){
       return back();
    }
}
