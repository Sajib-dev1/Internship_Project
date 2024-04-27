@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Blog List</h4>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $blogs as $sl=>$blog )  
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>
                                    <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" width="100" alt="">
                                </td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->rel_to_cat->category_name }}</td>
                                <td>{{ $blog->created_at->format("d M Y") }}</td>
                                <td class="toogle_btn text-center">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" {{ $blog->status == 1?'checked':'' }} data-id="{{ $blog->id }}" class="status" data-toggle="toggle" value="{{ $blog->status }}">
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>
<!-- end row-->
@endsection
@section('footer_script')
    <script>
        $('.status').change(function(){
            if($(this).val() != 1){
                $(this).attr('value',1);
            }
            else{
                $(this).attr('value',0);
            }
            var blog_id = $(this).attr('data-id');
            var status = $(this).val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: "POST",
                url: '/getblogstatus',
                data: { 'blog_id':blog_id,'status':status },
                success: function( data ) {
                }
            });
        })
    </script>
@endsection