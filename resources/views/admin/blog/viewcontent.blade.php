@extends('admin.layouts.app')


@section('content')



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



                        <a href="{{route('create-blog')}}" class="btn btn-block btn-primary">
                            Add Blog
                        </a>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="text-center mt-1 mb-2">


                </div>
                {{-- Start - Content comes here --}}
                <div class="col-md-12">
                    @include('admin.layouts.message')
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"></h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="text-center" style="background-color: #cce0df; padding: 2%">

                                <div class="container" style="max-width: 800px;">
                                    @if($content && !empty($content->content_blog))
                                    <div style="padding: 10%;">
                                        {!! html_entity_decode($content->content_blog) !!}
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-4" style="margin-bottom: 1%;width:75%">
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/blog/delete/'.$content->id)}}" class="btn btn-sm btn-block btn-primary">Delete content</a>
                                        </div>
                                        <div class="col-md-4" style="margin-bottom: 1%;">
                                            <a href="{{url('admin/contentblog/edit/'.$content->id)}}" class="btn btn-sm btn-block btn-primary">Edit content</a>
                                        </div>
                                    </div>
                                    @else
                                    <p>No content available. Please create.</p>
                                    @endif
                                </div>

                            </div>


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
@endsection

@section('style')




@endsection