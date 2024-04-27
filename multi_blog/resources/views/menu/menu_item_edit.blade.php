@extends('layouts.admin')
@section('content')
@include('bladecompunet')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Update Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.update',$menu_item->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Menu</label>
                        <input type="text" name="menu" class="form-control" value="{{ $menu_item->menu }}">
                        @error('menu')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('menu') }}" class="btn btn-light mt-3"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection