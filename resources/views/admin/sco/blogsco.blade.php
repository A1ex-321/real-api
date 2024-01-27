@extends('admin.layouts.app')


@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 470Px;
    }
</style>

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- ... (other scripts) ... -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Add Blog</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<!-- SweetAlert2 CSS -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0">Add blog</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"></li>




                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Blog data <small></small></h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('create-blogsco') }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}


                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title<span style="color:red">*</span></label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Title" value="{{ old('title') }}" required>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description<span style="color:red"></span></label>
                                        <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="Description" style="width: 100%; height: 100px;" >{{ old('description') }}</textarea>


                                    </div>
                                    <div class="form-group">
                                        <label for="editor">Content</label>
                                        <textarea name="content" id="editor" style="height: 250px; visibility: hidden;">{{ old('content') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thumb Image<span style="color:red">*</span></label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="Image"  value="{{ old('image') }}"required>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                            </form>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center mt-1 mb-2">


                </div>
                {{-- Start - Content comes here --}}
                <div class="col-12">
                    @include('admin.layouts.message')
                    <p></p>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Thum Image</th>
                                        <th>view content</th>
                                        <th>Edit & Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp

                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td> <img src="{{ asset('public/images/' . $value->image) }}" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td><button style="background-color: #cae8ca; color: #fff; border: none;">
                                                <a href="{{route('view_blogcontent', ['id' => $value->id])}}" class="btn">
                                                    <i class=""></i>
                                                    <span>View Blog content</span>
                                                </a>
                                            </button></td>

                                        <td>
                                            <a href="{{url('admin/blogsco/edit/'.$value->id)}}" class="btn"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/blogsco/delete/'.$value->id)}}" class="btn"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>









                {{-- End - Content comes here --}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>




<!-- Your scripts -->
<!-- ... (previous code) ... -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- ... (other scripts) ... -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                }

                // Add any other CKEditor configurations as needed
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    // Function to check the availability of the slug
    function checkSlugAvailability() {
        const slugInput = $('input[name="slug"]');
        const slugValue = slugInput.val();

        // Make an AJAX request to your Laravel route
        $.ajax({
            url: '/check-slug-availability',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Ensure proper syntax
                slug: slugValue
            },
            success: function(response) {
                const messageElement = $('#slugAvailabilityMessage');

                if (response.available) {} else {
                    messageElement.text('Slug already exists. Please choose another one.');
                }
            },
            error: function(error) {
                console.error('Error checking slug availability:', error);
            }
        });
    }
    // Attach the function to the 'change' event of the slug input
    $('input[name="slug"]').on('change', checkSlugAvailability);
</script>

@endsection




@section('style')
<!-- Include jQuery -->

<!-- Initialize Select2 -->





@endsection