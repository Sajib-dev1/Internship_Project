@extends('layouts.admin')
@section('content')
@include('bladecompunet')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.update',$role->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Edit role</label>
                            <input type="text" name="role_name" class="form-control" value="{{ $role->name }}">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                @foreach ( $permitions as $permition )  
                                    <div class="col-lg-4">
                                        <div class="form-check">
                                            <input {{ $role->hasPermissionTo($permition->name)?'checked':'' }} class="form-check-input" name="permission[]" type="checkbox" value="{{ $permition->name }}" id="flex{{ $permition->id }}">
                                            <label class="form-check-label" for="flex{{ $permition->id }}">{{ $permition->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection