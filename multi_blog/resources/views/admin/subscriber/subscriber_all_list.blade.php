@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-8 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Blog Table</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Subscriber Email</th>
                            <th>Join date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach ( $subscribers as $sl=>$subscriber ) 
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->created_at->format('d M Y') }}</td>
                            <td>
                                <button data-link="{{ route('subscriber.list.delete',$subscriber->id) }}" class="btn btn-danger btn-sm subscriber_del_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
    $('.subscriber_del_btn').click(function(){
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
