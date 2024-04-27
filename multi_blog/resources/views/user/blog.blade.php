@extends('layouts.admin')
@section('content')
@include('bladecompunet')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Blog</h4>
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label for="inputTitle4" class="form-label">Blog Title</label>
                                <input type="text" class="form-control" name="blog_title" id="inputTitle4" placeholder="Blog Title">
                                <input type="hidden" name="bloger_id" value="{{ Auth::id() }}">
                                @error('blog_title')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-6">
                                <label for="inputTitle4" class="form-label">Category List</label>
                                <select class="js-example-basic-single" name="category">
                                    <option value="">Select Category</option>
                                    @foreach ( $categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="inputTitle4" class="form-label">Tag List</label>
                                <select class="blog-tag" class="form-control" name="tag[]" multiple="multiple">
                                    @foreach ( $tags as $tag )
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                @error('tag')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-12">
                                <label for="inputTitle4" class="form-label">Blog Dascription</label>
                                <textarea id="blog_des" name="blog_des" class="form-control" cols="30" rows="10"></textarea>
                                @error('blog_des')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-8">
                                <label for="inputTitle4" class="form-label">Sumary Title</label>
                                <input type="text" class="form-control" name="summary_title">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="inputTitle4" class="form-label">Sumary List</label>
                                <div class="field_wrapper">
                                    <div class="d-flex">
                                        <input type="text" class="form-control" name="field_name[]" value=""/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{ asset("backend/images/plus.png") }}" width="25"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-12">
                                <label for="inputTitle4" class="form-label">Sumary Description</label>
                                <textarea id="" name="summary_blog" class="form-control" cols="30" rows="5"></textarea>
                                @error('summary_blog')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-8">
                                <label for="inputTitle4" class="form-label">Blog Image</label>
                                <input type="file" class="form-control" name="image"onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-8">
                                <img src="" alt="" id="blah" width="200">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
<script>
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    $('.blog-tag').select2();
});
</script>
<script>
$(document).ready(function() {
    $('#blog_des').summernote();
});
</script>
<script>
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="d-flex"><input type="text" name="field_name[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button"><img src="{{ asset("backend/images/minus.png") }}" width="25"/></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        // Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            }else{
                alert('A maximum of '+maxField+' fields are allowed to be added. ');
            }
        });
        
        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
    </script>
    @if(session('success'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif
@endsection