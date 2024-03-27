@extends('layouts.admin')
@section('pageTitle')
    User
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="header-title">User Table List</h4>
                        <h4 class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</h4>
                    </div>

                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Start date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ( $users as $sl=>$user )
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>
                                        @if ($user->photo == null)
                                        <img src="{{ Avatar::create( $user->name )->toBase64() }}" width="50"/>
                                        @else 
                                            <img src="{{ asset('uploads/user') }}/{{ $user->photo }}" width="50" alt=""> 
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection