<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Socile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    function uses(){
        $users = User::where('id','!=',Auth::id())->get();
        return view('admin_sorce.user.uses',[
            'users'=>$users,
        ]);
    }

    function user_profile(){
        $countries = Country::all();
        $sociles = Socile::all();
        return view('admin_sorce.user.user_profile',[
            'countries'=>$countries,
            'sociles'=>$sociles,
        ]);
    }

//__profile update__//
    function user_update(Request $request){
        $request->validate([
            'about'=>'required',
            'name'=>'required',
            'profetion'=>'required',
            'country'=>'required',
            'city'=>'required',
            'phone'=>'required',
        ]);
       if($request->photo == null){
        User::find(Auth::id())->update([
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
            'about'=>'required',
            'name'=>'required',
            'profetion'=>'required',
            'country'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'photo'=>'required',
        ]);
        $photo = $request->photo;
        $extension = $photo->extension();
        $file_name = Auth::id().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/user/'.$file_name));

        User::find(Auth::id())->update([
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

    //__profile update city__//
    function getcity(Request $request){
        $str = '<option>Select City</option>';
        $cities = City::where('country_id',$request->country_id)->get();
    
        foreach ($cities as $city) {
            $str .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        echo $str;
    }

//__profile password__//
    function user_password_update(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required',
            'password'=>['required','confirmed',Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation'=>'required',
        ]);

        $user = User::find(Auth::id());
        if(Hash::check($request->current_password,$user->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('updated','Password Update Successfull'); 
        }
    }

    //__profile socile __//
    function socile_icon_store(Request $request){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        Socile::insert([
            'icon'=>$request->icon,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('store','Socile Link store Successfull');
    }

    //__Admin View __//
    function user_view($id){
        $user_info = User::find($id);
        return view('admin_sorce.user.user_view',[
            'user_info'=>$user_info,
        ]);
    }

    //__Admin Edit __//
    function user_edit($id){
        $user_info = User::find($id);
        return view('admin_sorce.user.user_edit',[
            'user_info'=>$user_info,
        ]);
    }

    //__Admin Update __//
    function user_profile_update_info(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);

        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('user')->with('updated','User Info Update Successfull');
    }
    //__Admin Delete __//
    function user_delete($id){
        User::find($id)->delete();
        return back()->with('delete','User Delete successfull');
    }

    //__profile socile icon edit__//
    function profile_socile_edit($id){
        $profile_info = Socile::find($id);
        return view('admin_sorce.user.profile_socile_edit',[
            'profile_info'=>$profile_info,
        ]);
    }

    //__profile socile icon Update__//
    function profile_socile_icon_update(Request $request,$id){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        Socile::find($id)->update([
            'icon'=>$request->icon,
            'link'=>$request->link,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('updated','User Info Update Successfull');
    }

    function profile_socile_delete($id){
        Socile::find($id)->delete();
        return back()->with('delete','User Delete successfull');
    }
}
