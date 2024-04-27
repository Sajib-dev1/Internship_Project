@extends('layouts.admin')
@section('content')
@include('bladecompunet')
    @can('menu_access')
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Menu List
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd"> 
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach ( $menus as $sl=>$menu_item ) 
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $menu_item->menu }}</td>
                                    <td>
                                        <a href="{{ route('menu_item.edit',$menu_item->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ route('menu_item.delete',$menu_item->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @can('menu_add')
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Menu</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('menu.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Add Menu</label>
                                    <input type="text" name="menu" class="form-control">
                                    @error('menu')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Sub Menu List</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ( $menus as $menu ) 
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>{{ $menu->menu }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderd">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Sub Menu</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach (App\Models\Submenu::where('menu_id',$menu->id)->get() as $sl=>$sub_menu ) 
                                                <tr>
                                                    <td>{{ $sl+1 }}</td>
                                                    <td>{{ $sub_menu->sub_menu }}</td>
                                                    <td>{{ $sub_menu->category_id }}</td>
                                                    <td>
                                                        <a href="{{ route('sub_menu.edit',$sub_menu->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="{{ route('sub_menu.delete',$sub_menu->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @can('menu_add')
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Sub Menu</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sub.menu.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <select name="menu_id" class="form-control" id="">
                                        <option value="">Select menu</option>
                                        @foreach ( $menus as $menu )
                                        <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select name="category_id" class="form-control" id="">
                                        <option value="">Select Category</option>
                                        @foreach ( $categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Add sub Menu</label>
                                    <input type="text" name="sub_menu" class="form-control">
                                    @error('sub_menu')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div> 
        @else
        <h4 class="text-warning">You dont have to access this page</h4>
    @endcan   
@endsection
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