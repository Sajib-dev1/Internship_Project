@extends('layouts.admin')
@section('content')
@include('bladecompunet')
    @can('blog_access')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Blog Table</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Bloger Name</th>
                                    <th>Blog Title</th>
                                    <th>Category</th>
                                    <th>Created at</th>
                                    <th>Blog Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach ( $blogs as $sl=>$blog ) 
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" width="100" alt="">
                                    </td>
                                    <td>{{ $blog->rel_to_user->name }}</td>
                                    <td>{{ $blog->blog_title }}</td>
                                    <td>{{ $blog->rel_to_cat->category_name }}</td>
                                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                                    <td>
                                        @can('blog_view')
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#viewblogModal{{ $blog->id }}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        @endcan
                                        @can('blog_edit')
                                        <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('blog_delete')
                                        <a href="{{ route('blog.soft.delete',$blog->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        @else
        <h4 class="text-warning">You dont have to access this page</h4>
    @endcan
<!-- end row-->
@endsection

{{-- View Blog --}}
@foreach ( $blogs as $sl=>$blog ) 
<div class="modal fade" id="viewblogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="viewblogLabel{{ $blog->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h1 class="modal-title fs-5 text-light" id="viewblogLabel{{ $blog->id }}"><i class="fa fa-eye" aria-hidden="true"></i>View Blog</h1>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <table class="table table-borderd">
                    <tr>
                        <th>Blog Create</th>
                        <td>{{ $blog->created_at->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th>Blog Status</th>
                        <td>
                            @if ($blog->status == 1)
                            <span class="badge text-bg-success p-2">on</span>
                            @else
                            <span class="badge text-bg-secondary p-2">off</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Blog Image</th>
                        <td>
                            <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" max-width="600" height="200" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Blog Title</th>
                        <td>{{ $blog->blog_title }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ $blog->rel_to_cat->category_name }}</td>
                    </tr>
                    <tr>
                        <th>Blog Description</th>
                        <td>{!! $blog->blog_des !!}</td>
                    </tr>
                    <tr>
                        <th>Blog Sumary Title</th>
                        <td>{{ $blog->summary_title }}</td>
                    </tr>
                    <tr>
                        <th>Blog Sumary Description</th>
                        <td>{{ $blog->summary_blog }}</td>
                    </tr>
                    <tr>
                        <th>Blog Tags</th>
                        <td>
                            @php
                            $after_exploads = explode(',',$blog->tag)
                            @endphp
                            @foreach ( $after_exploads as $tag )
                                <span style="padding: 0 10px;" class="badge bg-secondary p-2">{{ App\Models\Tag::find($tag)->tag_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@section('footer_script')
    <script>
        @if(Session::has('update'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.success("{{ session('update') }}");
        @endif

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