@extends('admin.layouts.app')


@section('content')

<!-- SweetAlert2 CSS -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Blog</h1>
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
                            <h3 class="card-title">Edit New Blog <small></small></h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('blogsco-update', ['id' => $getRecord->id])}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="card-body">
                                    <!-- Form inputs here -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Title<span style="color:red">*</span></label>
                                        <input type="text" name="metatitle" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$getRecord->metatitle}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Description<span style="color:red">*</span></label>
                                        <input type="text" name="metadescription" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$getRecord->metadescription}}" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">update</button>
                                </div>
                            </form>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
   
@endsection

@section('style')
<!-- Include jQuery -->

<!-- Initialize Select2 -->





@endsection