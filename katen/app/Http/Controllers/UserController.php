<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
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
        return view('admin_sorce.user.user_profile',[
            'countries'=>$countries,
        ]);
    }

    function user_update(Request $request){
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

    function getcity(Request $request){
        $str = '<option>Select City</option>';
        $cities = City::where('country_id',$request->country_id)->get();
    
        foreach ($cities as $city) {
            $str .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        echo $str;
    }

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
}
