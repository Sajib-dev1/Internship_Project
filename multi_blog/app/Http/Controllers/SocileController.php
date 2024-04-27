<?php

namespace App\Http\Controllers;

use App\Models\Socile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocileController extends Controller
{
    function socil_icon(){
        $sociles = Socile::where('user_id',Auth::id())->get();
        return view('socile.socil_icon',[
            'sociles'=>$sociles,
        ]);
    }

    function user_socile_icon_store(Request $request){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        Socile::insert([
            'user_id'=>Auth::id(),
            'icon'=>$request->icon,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('store','Socile Link store Successfull');
    }

    function user_profile_socile_edit($id){
        $profile_info = Socile::find($id);
        return view('socile.user_profile_socile_edit',[
            'profile_info'=>$profile_info,
        ]);
    }

    function profile_socile_icon_update(Request $request, $id){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        Socile::find($id)->update([
            'user_id'=>Auth::id(),
            'icon'=>$request->icon,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('updated','User Info Update Successfull');
    }


    function user_profile_socile_delete($id){}
}
