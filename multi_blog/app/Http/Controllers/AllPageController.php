<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AllPageController extends Controller
{
    function home(){
        return view('frontend.index');
    }
}
