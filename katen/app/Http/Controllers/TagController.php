<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tag(){
        $tages = Tag::all();
        return view('admin.tag.index',[
            'tages'=>$tages,
        ]);
    }

    function store_tag(Request $request){
        Tag::insert([
            'tag_name'=>$request->tag_name,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
}
