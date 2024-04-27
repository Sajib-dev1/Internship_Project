@extends('layouts.admin')
@section('content')
@include('bladecompunet')
@can('role_access')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>User List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        @foreach ( $users as $user )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>   
                                    @forelse ($user->getRoleNames() as $role )
                                        <span class="badge bg-primary p-1">{{ $role }}</span>
                                    @empty
                                        <span class="badge bg-light p-1">Not assign</span>
                                    @endforelse
                                </td>
                                <td>
                                <a href="{{ route('role.remove',$user->id) }}" class="btn btn-danger btn-sm" title="delete">Remove Role</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Role List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr>
                            <th>Role</th>
                            <th>Permition</th>
                            <th>Action</th>
                        </tr>
                        @foreach ( $roles as $role )
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->getPermissionNames() as $permission )
                                        <span class="badge bg-primary p-1">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{ route('role.delete',$role->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add a new Permition</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('permition.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Add a permition</label>
                            <input type="text" name="permition" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Permition</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Assign Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('assin.role') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <select name="user_id" class="form-control" id="">
                                <option value="">Select User</option>
                                @foreach ( $users as $user )
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="role" class="form-control" id="">
                                <option value="">Select Role</option>
                                @foreach ( $roles as $role )
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Assign Role</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    <h4>Add a new Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Add a role</label>
                            <input type="text" name="role_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                @foreach ( $permitions as $permition )  
                                    <div class="col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $permition->name }}" id="flex{{ $permition->id }}">
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
    @else
    <h4 class="text-warning">You dont have to access this page</h4>
@endcan
@endsection