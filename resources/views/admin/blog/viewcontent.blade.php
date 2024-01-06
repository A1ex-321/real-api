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
        <div class="container-fluid">
            <div class="row">
                <div class="text-center mt-1 mb-2">


                </div>
                {{-- Start - Content comes here --}}
                <div class="col-12">
                    @include('admin.layouts.message')
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"></h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="col-2">
                                @if($content && !empty($content->content_blog))
                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/blog/delete/'.$content->id)}}" class="btn btn-block btn-primary">Delete content</a>
                                @endif

                            </div>




                            <div style="text-align: center;">
                                <div style="max-width: 800px; margin: 0 auto;">

                                    @if($content && !empty($content->content_blog))
                                    {!! html_entity_decode($content->content_blog) !!}
                                    @else
                                    <p>No content available please create</p>
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