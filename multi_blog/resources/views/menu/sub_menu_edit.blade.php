@extends('layouts.admin')
@section('content')
@include('bladecompunet')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>update Sub Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sub.menu.update',$sub_menu_item->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <select name="menu_id" class="form-control" id="">
                            <option value="">Select Sub menu</option>
                            @foreach ( $menus as $menu )
                            <option value="{{ $menu->id }}" {{ $sub_menu_item->menu_id == $menu->id ?'selected':'' }}>{{ $menu->menu }}</option>
                            @endforeach
                        </select>
                        @error('menu_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="category_id" class="form-control" id="">
                            <option value="">Select Category</option>
                            @foreach ( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('menu_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">sub Menu</label>
                        <input type="text" name="sub_menu" class="form-control" value="{{ $sub_menu_item->sub_menu }}">
                        @error('sub_menu')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('menu') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection