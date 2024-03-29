@extends('layouts.admin')
@section('pageTitle')
    Blog List

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog list</h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderd">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Blog Title</th>
                            <th>summary title</th>
                            <th>Blog Action</th>
                        </tr>
                        @foreach ( $blogs as $sl=>$blog ) 
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>
                                    <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" width="100" alt="">
                                </td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->summary_title }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection