@extends('admin.auth.layout')
@section('content')
    <div class="row">
        {{-- <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Instragam Post Table</h4>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addinstraModal" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add post</button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Post Link</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $instragam_infos as $sl=>$instragam_info ) 
                                    <tr>
                                        <th scope="row">{{ $sl+1 }}</th>
                                        <td>
                                            <img src="{{ asset('uploads/instragram') }}/{{ $instragam_info->image }}" width="100" alt="{{ $instragam_info->image }}">
                                        </td>
                                        <td>{{ $instragam_info->link }}</td>
                                        <td>{{ $instragam_info->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editinstraModal{{ $instragam_info->id }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button data-link="{{ route('instragam_info.delete',$instragam_info->id) }}" class="btn btn-danger btn-sm ins_del_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Instragan Table</h4>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Post Link</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach ( $instragam_infos as $sl=>$instragam_info ) 
                                    <tr>
                                        <th scope="row">{{ $sl+1 }}</th>
                                        <td>
                                            <img src="{{ asset('uploads/instragram') }}/{{ $instragam_info->image }}" width="50" alt="{{ $instragam_info->image }}">
                                        </td>
                                        <td>{{ $instragam_info->link }}</td>
                                        <td>{{ $instragam_info->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editinstraModal{{ $instragam_info->id }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button data-link="{{ route('instragam_info.delete',$instragam_info->id) }}" class="btn btn-danger btn-sm ins_del_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
    </div>
@endsection

{{-- Add Instragam post --}}
<div class="modal fade" id="addinstraModal" tabindex="-1" aria-labelledby="addinstragamLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h1 class="modal-title fs-5 text-light" id="addinstragamLabel">Add Post</h1>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('store.instragam') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="url" name="link" class="form-control" placeholder="Instragram post link">
                    @error('link')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Post Image</label>
                    <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <img src="" width="150" id="blah" alt="">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- Edit Instragam Post --}}
@foreach ( $instragam_infos as $sl=>$instragam ) 
    <div class="modal fade" id="editinstraModal{{ $instragam->id }}" tabindex="-1" aria-labelledby="editinstraLabel{{ $instragam->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h1 class="modal-title fs-5 text-light" id="editinstraLabel{{ $instragam->id }}"><i class="fa-solid fa-pen-to-square"></i> Edit Post</h1>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('instra.update',$instragam->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Post Link</label>
                        <input type="text" name="link" value="{{ $instragam->link }}" class="form-control" placeholder="Post Link">
                        @error('link')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Post Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('hello').src = window.URL.createObjectURL(this.files[0])">
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/instragram') }}/{{ $instragam->image }}" width="150" id="hello" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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

    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif
</script>
<script>
    $('.ins_del_btn').click(function(){
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