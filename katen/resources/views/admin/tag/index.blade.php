@extends('admin.auth.layout')
@section('pageTitle')
   Admin Tag
@endsection
@section('content')
    <div class="row mt-5">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Tag Table</h4>
                        <h4><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Category</button></h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tag Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $tages as $sl=>$tag ) 
                                    <tr>
                                        <th scope="row">{{ $sl+1 }}</th>
                                        <td>{{ $tag->tag_name }}</td>
                                        <td>{{ $tag->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Tag</h1>
          <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('store.tag') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="tag_name" class="form-control" placeholder="Tag name">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection