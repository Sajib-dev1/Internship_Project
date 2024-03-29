@extends('layouts.admin')
@section('pageTitle')
    View
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h4><span class="text-info">{{ $user_info->name }}</span> Information</h4>
            </div>
            <table class="table table-borderd">
                <tr>
                    <th>Self Introduction :</th>
                    <td>{{ $user_info->about }}</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        @if ($user_info->photo == null)
                        <img src="{{ Avatar::create( $user_info->name )->toBase64() }}" width="50"/>
                        @else 
                            <img src="{{ asset('uploads/user') }}/{{ $user_info->photo }}" width="50" alt=""> 
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td>{{ $user_info->email }}</td>
                </tr>
                <tr>
                    <th>Profetion :</th>
                    <td>{{ $user_info->profetion }}</td>
                </tr>
                <tr>
                    <th>Phone Or Moblie :</th>
                    <td>{{ $user_info->phone }}</td>
                </tr>
                <tr>
                    <th>Nationality :</th>
                    <td>{{ $user_info->rel_to_country->name }} , {{ $user_info->rel_to_city->name }}</td>
                </tr>
                <tr>
                    <th>Join Date :</th>
                    <td>{{ $user_info->created_at->format("d M Y") }}</td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="{{ route('user') }}" class="btn btn-light"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection