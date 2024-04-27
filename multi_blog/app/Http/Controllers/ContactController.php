<?php

namespace App\Http\Controllers;

use App\Models\InputUser;
use App\Models\Instragam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   function contact(){
      $instragams = Instragam::latest()->get();
    return view('frontend.all_page.contact',[
      'instragams'=>$instragams,
    ]);
   }

   function input_user_store(Request $request){
      $request->validate([
         'inputname'=>'required',
         'inputemail'=>'required',
         'inputsubject'=>'required',
         'inputmessage'=>'required',
      ]);
      InputUser::insert([
         'inputname'=>$request->inputname,
         'inputemail'=>$request->inputemail,
         'inputsubject'=>$request->inputsubject,
         'inputmessage'=>$request->inputmessage,
         'created_at'=>Carbon::now(),
      ]);
      return back()->with('send','Your message send successfully');
   }
}
