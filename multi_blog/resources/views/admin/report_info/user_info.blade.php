@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">All User Information</h4>

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
                        @foreach ( $user_informations as $sl=>$user ) 
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>
                                    @if ($user->photo == null)
                                    <img src="{{ Avatar::create( $user->name )->toBase64() }}" width="50" />
                                    @else 
                                        <img src="{{ asset('uploads/user') }}/{{ $user->photo }}" width="50" alt=""> 
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger btn-icon btn-sm">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
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
@section('footer_script')
<script>
    @if(Session::has('delete'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('delete') }}");
    @endif
</script>
@endsection