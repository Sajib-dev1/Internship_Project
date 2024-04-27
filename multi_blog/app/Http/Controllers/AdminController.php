<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminLogo;
use App\Models\AdminSocile;
use App\Models\Blog;
use App\Models\City;
use App\Models\Country;
use App\Models\FabiconLogo;
use App\Models\FrontendLogo;
use App\Models\InputUser;
use App\Models\Instragam;
use App\Models\Populer;
use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    function admin_dashboard(){
        $user_count = User::count();
        $blog_count = Blog::count();
        $popular_count =DB::table('populers')->sum('view_total');
        $subscriber_count = Subscriber::count();
        $message_count = InputUser::count();
        $popular_blog_count =DB::table('populers')->sum('status');
        return view('admin.dashboard',[
            'user_count'=>$user_count,
            'blog_count'=>$blog_count,
            'popular_count'=>$popular_count,
            'subscriber_count'=>$subscriber_count,
            'message_count'=>$message_count,
            'popular_blog_count'=>$popular_blog_count,
        ]);
    }
    function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function admin_profile(){
        $countries = Country::all();
       return view('admin.profile',[
        'countries'=>$countries,
       ]);
    }

    function getcity(Request $request){
        $str = '<option>Select City</option>';
        $cities = City::where('country_id',$request->country_id)->get();
    
        foreach ($cities as $city) {
            $str .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        echo $str;
    }

    function admin_profile_update(Request $request){
        if($request->photo == null){
            $request->validate([
                'about'=>'required',
                'name'=>'required',
                'profetion'=>'required',
                'country'=>'required',
                'city'=>'required',
                'phone'=>'required',
            ]);
            Admin::find(Auth::guard('admin')->id())->update([
                'name'=>$request->name,
                'about'=>$request->about,
                'profetion'=>$request->profetion,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'city'=>$request->city,
                'update_at'=>Carbon::now(),
            ]);
            return back()->with('updated','Information Update Successfull');
        }
        else{
            $request->validate([
                'photo'=>'required',
            ]);
            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/admin/'.$file_name));
    
            Admin::find(Auth::guard('admin')->id())->update([
                'name'=>$request->name,
                'about'=>$request->about,
                'profetion'=>$request->profetion,
                'phone'=>$request->phone,
                'country'=>$request->country,
                'city'=>$request->city,
                'photo'=>$file_name,
                'update_at'=>Carbon::now(),
            ]);
            return back()->with('updated','Information Update Successfull');
        }
    }

    function admin_socile_icon(){
        $sociles = AdminSocile::all();
        return view('admin.exta_page.admin_socile_icon',[
            'sociles'=>$sociles,
        ]);
    }

    function admin_socile_icon_store(Request $request){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        AdminSocile::insert([
            'icon'=>$request->icon,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Socile Link store Successfull');
    }

    function profile_socile_edit($id){
        $socile_info = AdminSocile::find($id);
        return view('admin.exta_page.profile_socile_edit',[
            'socile_info'=>$socile_info,
        ]);
    }

    function admin_socile_icon_update(Request $request){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        Admin::find(Auth::guard('admin')->id())->update([
            'icon'=>$request->icon,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('admin.socile.icon')->with('update','Socile Link store Successfull');
    }

    function profile_socile_delete($id){
        AdminSocile::find($id)->delete();

        return back()->with('delete','Socile Link Delete Successfull');
    }

    function admin_logo(){
        $admin_logo_info = AdminLogo::first();
        $frontend_logo_info = FrontendLogo::first();
        $favicon_info = FabiconLogo::first();
        return view('admin.exta_page.admin_logo',[
            'admin_logo_info'=>$admin_logo_info,
            'frontend_logo_info'=>$frontend_logo_info,
            'favicon_info'=>$favicon_info,
        ]);
    }

    function admin_logo_update(Request $request,$id){
        $request->validate([
            'logo'=>'required',
        ]);
        $admin_info = AdminLogo::find($id);
        $delete_form = public_path('uploads/admin/'.$admin_info->logo);
        unlink($delete_form);

        $photo = $request->logo;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/admin/'.$file_name));

        AdminLogo::find($id)->update([
            'logo'=>$file_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update',"Admin logo store successfull");
    }

    function frontend_logo_update(Request $request,$id){
        $request->validate([
            'logo'=>'required',
        ]);
        $fontend_info = FrontendLogo::find($id);
        $delete_form = public_path('uploads/logo/'.$fontend_info->logo);
        unlink($delete_form);

        $photo = $request->logo;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/logo/'.$file_name));

        FrontendLogo::find($id)->update([
            'logo'=>$file_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update',"Admin logo store successfull");
    }

    function favicon_log_update(Request $request,$id){
        $request->validate([
            'logo'=>'required',
        ]);
        $fontend_info = FabiconLogo::find($id);
        $delete_form = public_path('uploads/logo/'.$fontend_info->logo);
        unlink($delete_form);

        $photo = $request->logo;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/logo/'.$file_name));

        FabiconLogo::find($id)->update([
            'logo'=>$file_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update',"Admin logo store successfull");
    }

    function instragam(){
        $instragam_infos = Instragam::all();
        return view('admin.exta_page.instragam',[
            'instragam_infos'=>$instragam_infos,
        ]);
    }

    function store_instragam(Request $request){
        $request->validate([
            'link'=>'required',
            'image'=>'required',
        ]);
        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/instragram/'.$file_name));
        Instragam::insert([
            'link'=>$request->link,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Post added successfull');
    }

    function instra_update(Request $request,$id){
        if($request->image == ''){
            $request->validate([
                'link'=>'required',
            ]);
            Instragam::find($id)->update([
                'link'=>$request->link,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update','Post update successfull');
        }
        else{
            $request->validate([
                'image'=>'required',
            ]);
            $ins_info = Instragam::find($id);
            $delete_form = public_path('uploads/instragram/'.$ins_info->image);
            unlink($delete_form);

            $photo = $request->image;
            $extension = $photo->extension();
            $file_name = uniqid().'.'.$extension;
            Image::make($photo)->resize(182,182)->save(public_path('uploads/instragram/'.$file_name));

            Instragam::find($id)->update([
                'link'=>$request->link,
                'image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update','Post update successfull');
        }
    }

    function instragam_info_delete($id){
        $ins_info = Instragam::find($id);
        $delete_form = public_path('uploads/instragram/'.$ins_info->image);
        unlink($delete_form);
        
        Instragam::find($id)->delete();
        return back()->with('delete',"Post delete successfull");
    }


}
