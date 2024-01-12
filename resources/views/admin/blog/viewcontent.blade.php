@extends('admin.layouts.app')

@section('content')

<style>
    /* styles.css */
    .container {
        text-align: center;
        color: #333;
    }

    /* styles.css */
    .title{
        background-color: #2ECDB7;
        color: #ffffff;
        padding: 13px;
    }
    .subtitle {
        background-color: #2ECDB7;
        color: #ffffff;
        padding: 13px;
        margin-top: 5px !important;

    }

    @media (max-width: 768px) {
        .subtitle {
            margin-top: 0 !important;
            padding: 10px;
        }

        .img-container {
            width: 100%; /* Make image container full-width on smaller screens */
        }
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
                        <a href="{{ route('blog-list') }}" class="btn btn-block btn-primary">Back</a>
                    </ol>
                </div><!-- /.col -->
                <div class="container" style="text-align: center; color: #333;">
                    <h1 class="subtitle">Title: {{ $content->Tittle }}</h1>
                    <h3 class="title">Description: {{ $content->Description }}</h3>

                    @if ($imageArray)
                    <div class="row" style="background-color: antiquewhite !important;padding-left: 250px">
                        @foreach ($imageArray as $image)
                        <div class="col-md-4 mb-4 d-flex align-items-center img-container" style="background-color: #f0f0f0; border: 2px solid #3498db; margin: 10px;">
                        
                            <img src="{{ asset('public/images/' . $image) }}" alt="Image" class="img-fluid" style="width: 100%; height: auto;">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

@endsection

@section('style')

@endsection
