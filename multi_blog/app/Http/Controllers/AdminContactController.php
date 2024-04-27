<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    function contact_list(){
        return view('admin.contact.contact_list');
    }
}
