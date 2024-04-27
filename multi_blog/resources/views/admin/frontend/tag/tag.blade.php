@extends('admin.auth.layout')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title">Tag Table</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addtagModal" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add New Tag</button>
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
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#edittagModal{{ $tag->id }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button data-link="{{ route('tag.delete',$tag->id) }}" class="btn btn-danger btn-sm tag_del_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
                
            </div>
        </div> <!-- end card -->
    </div>
</div> 

{{-- Add Tag --}}
<div class="modal fade" id="addtagModal" tabindex="-1" aria-labelledby="addtagLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h1 class="modal-title fs-5 text-light" id="addtagLabel">Add new Tag</h1>
          <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('store.tag') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="tag_name" class="form-control" placeholder="tag name">
                    @error('tag_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
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

    {{-- Edit Teg --}}
    @foreach ( $tages as $sl=>$tag ) 
        <div class="modal fade" id="edittagModal{{ $tag->id }}" tabindex="-1" aria-labelledby="edittagLabel{{ $tag->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                <h1 class="modal-title fs-5 text-light" id="edittagLabel{{ $tag->id }}"><i class="fa-solid fa-pen-to-square"></i> Edit Tag</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tag.update',$tag->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="tag_name" value="{{ $tag->tag_name }}" class="form-control" placeholder="Tag name">
                            @error('tag_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
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
@endsection
@section('footer_script')
<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('check_delete'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('check_delete') }}");
    @endif
</script>
<script>
    $('.tag_del_btn').click(function(){
        let link = $(this).attr('data-link');
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
<script>
    $("#chkSelectAll").on('click', function(){
        this.checked ? $(".chkDel").prop("checked",true) : $(".chkDel").prop("checked",false);  
    })
</script>
@endsection