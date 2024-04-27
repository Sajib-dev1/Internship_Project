@extends('admin.auth.layout')
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Category Table</h4>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addcategoryModal" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</button>
                    </div>
                    <form action="{{ route('category.checked.delete') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 120px">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="chkSelectAll">
                                                <label class="form-check-label" for="chkSelectAll">
                                                    All Check
                                                </label>
                                            </div>
                                        </th>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $categories as $sl=>$category ) 
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input chkDel" name="category_id[]" type="checkbox" value="{{ $category->id }}" id="flexCheckDefault">
                                                </div>
                                            </td>
                                            <th scope="row">{{ $sl+1 }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>

                                                <button data-link="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-sm cat_del_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button class="btn btn-danger btn-sm mt-3">Chack delete</button>
                            </div>
                        </div> <!-- end table-responsive-->
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
    </div>

    {{-- Add Category --}}
    <div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h1 class="modal-title fs-5 text-light" id="addCategoryLabel">Add Category</h1>
              <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('store.category') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Category name">
                        @error('category_name')
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

    {{-- Edit Category --}}
    @foreach ( $categories as $sl=>$category ) 
    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h1 class="modal-title fs-5 text-light" id="editCategoryLabel{{ $category->id }}"><i class="fa-solid fa-pen-to-square"></i> Edit Category</h1>
              <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.update',$category->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        {{-- <input type="hidden" name="category_id" value="{{ $category->id }}"> --}}
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="Category name">
                        @error('category_name')
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
<script>
    $('.cat_del_btn').click(function(){
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
<script>
    $("#chkSelectAll").on('click', function(){
        this.checked ? $(".chkDel").prop("checked",true) : $(".chkDel").prop("checked",false);  
    })
</script>
@endsection