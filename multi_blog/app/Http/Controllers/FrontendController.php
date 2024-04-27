<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminLogo;
use App\Models\AdminSocile;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FrontendLogo;
use App\Models\Instragam;
use App\Models\Populer;
use App\Models\Socile;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $popular_posts = Populer::groupBy('blog_id')
        ->selectRaw('blog_id, sum(view_total) as sum')
        ->orderBy('sum','DESC')->get();
        $ban_category = Blog::groupBy('category')
        ->selectRaw('sum(status) as sum,category')
        ->orderBy('sum','DESC')->get();
        $cat_id = $ban_category[0]['category'];
        $blog_info = Blog::where('category',$cat_id)->where('status',1)->latest()->get();
        $editor_blogs = Blog::where('updated_at' ,'!=',null)->where('status',1)->get();
        $edit_main_id = $editor_blogs->first()->id;
        $editor_list_blog = Blog::where('updated_at' ,'!=',null)->where('status',1)->where('id','!=',$edit_main_id) ->get();
        $latest_blogs = Blog::where('status',1)->latest()->get();
        $inspiration_blogs = Blog::where('status',1)->where('category',2)->latest()->get();
        $categories = Category::all();
        $blogs = Blog::latest()->get();
        $tags = Tag::all();
        $instragams = Instragam::latest()->get();

        $tranding_blogs = Blog::where('status',1)->where('populer_id','!=',null)->latest()->get();

        
        // $tranding_blogs2 = Blog::where('status',1)->where('populer_id','!=',null)->take(2)->latest()->skip(1)->get();
        $tranding_blogs2 = $tranding_blogs->skip(1);
        $tranding_blogs3 = $tranding_blogs2->skip(2);
        $tranding_blogs4 = $tranding_blogs3->skip(1);

        // $tranding_blogs3 = Blog::where('status',1)->where('populer_id','!=',null)->where('populer_id','!=',$populer_first_id)->take(1)->latest()->get();


        return view('frontend.index',[
            'popular_posts'=>$popular_posts,
            'blog_info'=>$blog_info,
            'editor_list_blog'=>$editor_list_blog,
            'latest_blogs'=>$latest_blogs,
            'editor_blogs'=>$editor_blogs,
            'inspiration_blogs'=>$inspiration_blogs,
            'categories'=>$categories,
            'blogs'=>$blogs,
            'tags'=>$tags,
            'instragams'=>$instragams,
            'tranding_blogs'=>$tranding_blogs,
            'tranding_blogs2'=>$tranding_blogs2,
            'tranding_blogs3'=>$tranding_blogs3,
            'tranding_blogs4'=>$tranding_blogs4,
        ]);
    }

    function blog_single($id){
        $popular_posts = Populer::groupBy('blog_id')
        ->selectRaw('blog_id, sum(view_total) as sum')
        ->orderBy('sum','DESC')->get();
        $popular_info = Populer::where('blog_id',$id)->count();

        if($popular_info == 1){
            Populer::where('blog_id',$id)->increment('view_total',1);
        }
        else{
           $populer_id = Populer::create([
                'blog_id'=>$id,
                'view_total'=>1,
                'created_at'=>Carbon::now(),
            ]);

            Blog::find($id)->update([
                'populer_id'=>$populer_id->id,
            ]);
        }
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
        $comments = Comment::with('replies')->where('blog_id',$id)->whereNull('parent_id')->get();
        $instragams = Instragam::latest()->get();
        $personal_socile_icons = Socile::where('user_id',$blog_single->bloger_id)->get();
        $personal_user_info = User::find($blog_single->bloger_id);
        return view('frontend.all_page.blog_single',[
            'popular_posts'=>$popular_posts,
            'popular_blog'=>$popular_blog,
            'blog_single'=>$blog_single,
            'admin_sociles'=>$admin_sociles,
            'logo'=>$logo,
            'admin_info'=>$admin_info,
            'categories'=>$categories,
            'blogs'=>$blogs,
            'tags'=>$tags,
            'comments'=>$comments,
            'instragams'=>$instragams,
            'personal_socile_icons'=>$personal_socile_icons,
            'personal_user_info'=>$personal_user_info,
        ]);
    }
}
