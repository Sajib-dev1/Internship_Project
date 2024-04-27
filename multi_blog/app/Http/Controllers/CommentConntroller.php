<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentConntroller extends Controller
{
    function comment_store(Request $request){
        $request->validate([
            'comment'=>'required',
        ]);

        Comment::insert([
            'user_id'=>Auth::id(),
            'blog_id'=>$request->blog_id,
            'comment'=>$request->comment,
            'parent_id'=>$request->parent_id,
            'bloger_id'=>$request->bloger_id,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
