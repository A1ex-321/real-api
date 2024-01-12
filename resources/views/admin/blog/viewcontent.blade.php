@extends('admin.layouts.app')


@section('content')

<style>
    /* styles.css */
    .container {
        text-align: center;
        color: #333;
    }

    /* styles.css */
    .title {
        background-color: #2ECDB7;
        color: #ffffff;
        padding: 13px;

    }

    .subtitle {
        background-color: #2ECCFA;
        color: #ffffff;
        padding: 5px;
        margin-top: 17px !important;
        padding: 20px;

    }
</style>


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
                        <li class="breadcrumb-item active">Blog</li>



                        <a href="{{route('blog-list')}}" class="btn btn-block btn-primary">
                            Back
                        </a>
                    </ol>

                </div><!-- /.col -->
                <div class="container" style="text-align: center; color: #333;">

                    <h1 class="subtitle">Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;{{ $content->Tittle }}</h1>
                    <h3 class="title">Description&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;{{ $content->Description }}&nbsp;&nbsp;&nbsp;</h3>


                    @if ($imageArray)
                    <div class="row" >
                        @foreach ($imageArray as $image)
                        <div class="col-md-3 mb-3 d-flex align-items-center" style="background-color: #f0f0f0; border: 2px solid #3498db; margin: 1px;">
                            <img src="{{ asset('public/images/' . $image) }}" alt="Image" class="img-fluid" style="width: 500px; height: 300px;">
                        </div>
                        @endforeach
                    </div>

                    @endif
                </div>


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection

@section('style')




@endsection