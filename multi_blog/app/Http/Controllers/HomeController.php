<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Populer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function dashboard(){
        $users = User::count();
        $getusertoday = User::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
        $blog_post = Blog::where('bloger_id',Auth::id())->count();
        $weekly_blog = Blog::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->where('bloger_id',Auth::id())->count();
        $daily_blog = Blog::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-1 days')) )->where('bloger_id',Auth::id())->count();
        $blog_post_populer = Blog::where('bloger_id',Auth::id())->where('populer_id','!=',null)->count();
        $month_populer = Blog::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-30 days')) )->where('bloger_id',Auth::id())->where('populer_id','!=',null)->count();

        $top_comments = Comment::where('bloger_id',Auth::id())->where('user_id','!=',Auth::id())->whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-30 days')) )->latest()->paginate(5);
        $comment_alert = Comment::where('bloger_id',Auth::id())->where('status',1)->count();

        return view('dashboard',[
            'users'=>$users,
            'blog_post'=>$blog_post,
            'blog_post_populer'=>$blog_post_populer,
            'getusertoday'=>$getusertoday,
            'weekly_blog'=>$weekly_blog,
            'month_populer'=>$month_populer,
            'top_comments'=>$top_comments,
            'daily_blog'=>$daily_blog,
            'comment_alert'=>$comment_alert,
        ]);
    }

    function getcommentstatus(Request $request){
        Comment::find($request->comment_id)->update([
            'status'=>0,
        ]);
    }

    function getcommentalertstatus(Request $request){
        Comment::find($request->comment_id)->update([
            'status'=>0,
        ]);
    }
}
