@extends('layouts.admin')
@section('content')
@include('bladecompunet')
@can('blog_access')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Trushed Blog</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr>
                            <th>SL</th>
                            <th>Blog Image</th>
                            <th>Blog Create</th>
                            <th>Blog Title</th>
                            <th>Blog Category</th>
                            <th>Action</th>
                        </tr>
                        @foreach ( $blogs as $sl=>$blog )   
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>
                                <img width="100" src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="">
                            </td>
                            <td>{{ $blog->created_at->format("d M Y") }}</td>
                            <td>{{ $blog->blog_title }}</td>
                            <td>{{ $blog->rel_to_cat->category_name }}</td>
                            <td>
                                <a href="{{ route('blog.replay',$blog->id) }}" class="btn btn-success btn-sm" title="replay"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                <a href="{{ route('blog.delete',$blog->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>  
    @else
    <h4 class="text-warning">You dont have to access this page</h4>
@endcan  
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