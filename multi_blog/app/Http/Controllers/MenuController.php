<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Submenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    function menu(){
        $menus = Menu::all();
        $categories = Category::all();
        return view('menu.menu',[
            'menus'=>$menus,
            'categories'=>$categories,
        ]);
    }

    function menu_store(Request $request){
        $request->validate([
            'menu'=>'required|unique:menus',
        ]);
        $menu_link = Str::lower(str_replace(' ','_',$request->menu));
        Menu::insert([
            'menu'=>$request->menu,
            'menu_link'=>$menu_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','menu store successfull');
    }

    function menu_item_edit($id){
        $menu_item = Menu::find($id);
        return view('menu.menu_item_edit',[
            'menu_item'=>$menu_item,
        ]);
    }

    function menu_update(Request $request, $id){
        $request->validate([
            'menu'=>'required|unique:menus',
        ]);
        $menu_link = Str::lower(str_replace(' ','_',$request->menu));
        Menu::find($id)->update([
            'menu'=>$request->menu,
            'menu_link'=>$menu_link,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('menu')->with('update',"Menu Updated successfull");
    }

    function menu_item_delete($id){
        Menu::find($id)->delete();

        return back()->with('delete','menu delete successfull');
    }

    function sub_menu_store(Request $request){
        $request->validate([
            'menu_id'=>'required',
            'category_id'=>'required',
            'sub_menu'=>'required|unique:submenus',
        ]);
        $sub_menu_link = Str::lower(str_replace(' ','_',$request->sub_menu));
        Submenu::insert([
            'menu_id'=>$request->menu_id,
            'category_id'=>$request->category_id,
            'sub_menu'=>$request->sub_menu,
            'sub_menu_link'=>$sub_menu_link,
        ]);
        return back()->with('success','Sub menu store successfull');
    }

    function sub_menu_edit($id){
        $sub_menu_item = Submenu::find($id);
        $categories = Category::all();
        $menus = Menu::all();
        return view('menu.sub_menu_edit',[
            'sub_menu_item'=>$sub_menu_item,
            'categories'=>$categories,
            'menus'=>$menus,
        ]);
    }

    function sub_menu_update(Request $request, $id){
        $request->validate([
            'menu_id'=>'required',
            'category_id'=>'required',
            'sub_menu'=>'required|unique:submenus',
        ]);
        $sub_menu_link = Str::lower(str_replace(' ','_',$request->sub_menu));
        Submenu::find($id)->update([
            'menu_id'=>$request->menu_id,
            'category_id'=>$request->category_id,
            'sub_menu'=>$request->sub_menu,
            'sub_menu_link'=>$sub_menu_link,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('menu')->with('update',"Sub menu Updated successfull");
    }

    function sub_menu_delete($id){
        Submenu::find($id)->delete();
        return back()->with('delete','menu delete successfull');
    }
}
