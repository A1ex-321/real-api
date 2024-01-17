@extends('admin.layouts.app')


@section('content')

<!-- SweetAlert2 CSS -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
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
                            <h3 class="card-title">Edit  link <small></small></h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('update-link', ['id' => $getRecord->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="card-body">
                                    <!-- Form inputs here -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sco link<span style="color:red">*</span></label>
                                        <input type="text" name="scolink" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$getRecord->scolink}}" >
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