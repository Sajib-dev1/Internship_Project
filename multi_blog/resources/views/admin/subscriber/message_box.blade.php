@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Blog Table</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Input Name</th>
                            <th>Input Email</th>
                            <th>Input Subject</th>
                            <th>Input Message</th>
                            <th>Message date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $input_users as $sl=>$input_user ) 
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $input_user->inputname }}</td>
                            <td>{{ $input_user->inputemail }}</td>
                            <td>{{ $input_user->inputsubject }}</td>
                            <td>{{ $input_user->inputmessage }}</td>
                            <td>{{ $input_user->created_at->format('d M Y') }}</td>
                            <td>
                                <button data-link="{{ route('input.message.delete',$input_user->id) }}" class="btn btn-danger btn-sm message_del_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
@section('footer_script')
<script>
    $('.message_del_btn').click(function(){
        let link = $(this).attr('data-link')
        
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href=link;
        }
        });
    });
</script>
@if (session('delete'))
    <script>
        Swal.fire({
        title: "Deleted!",
        text: "{{ session('delete') }}",
        icon: "success"
        });
    </script>
@endif
@endsection