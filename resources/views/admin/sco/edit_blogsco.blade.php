@extends('admin.layouts.app')


@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 250Px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include TinyMCE from CDN -->
    <!-- <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script> -->


    <!-- Include Select2 from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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
                        <form action="{{ route('blogsco-update', ['id' => $getRecord->id])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}


                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title<span style="color:red">*</span></label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="title" value="{{$getRecord->title}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description<span style="color:red"></span></label>
                                        <textarea name="description" class="form-control" id="exampleInputEmail1" placeholder="Description" style="width: 100%; height: 100px;">{{$getRecord->description}}</textarea>


                                    </div>
                                    <div class="form-group">
                                        <label for="editor">Content</label>
                                        <textarea name="content" id="editor" style="height: 250px; visibility: hidden;">{{$getRecord->content}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thumb Image<span style="color:red">*</span></label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="Image" value="{{$getRecord->image}}" >
                                    </div>
                                    
                                @if ($getRecord->image)
                                <div>
                                    <img src="{{ asset('public/images/' . $getRecord->image) }}" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">
                                </div>
                                @endif
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

    <!-- /.content -->
</div>




<!-- Your scripts -->
<!-- ... (previous code) ... -->

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
            }
            // ,
            //  plugins: ['color', 'fontSize', 'fontFamily', 'fontBackgroundColor', 'fontColor', 'ckfinder'],
            //  toolbar: ['heading', '|', 'bold', 'italic', 'underline', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'colorPicker', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],

        })

        .catch(error => {
            console.error(error);
        });
</script>
@endsection




@section('style')
<!-- Include jQuery -->

<!-- Initialize Select2 -->





@endsection