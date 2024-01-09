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
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Title </th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->Tittle}}</td>
                                        <td>{{$value->Description}}</td>
                                        <td><img src="{{ asset('public/images/' . $value->Image) }}" alt="Image" width="80" height="80"></td>

                                        <td>
                                            @php $buttonEnabled = false; @endphp
                                            @foreach($getRecordcontent as $record)
                                            @if($value->id == $record->blog_id)
                                            @php $buttonEnabled = true; @endphp

                                            <button onclick="return confirm('Please delete existing blog content')" style="padding: 8px;background-color: #f75d52; color: #0a0302; border: none;">
                                                <i class="fas fa-plus"></i>
                                                <span>Add Blog content</span>
                                            </button>
                                            @break
                                            @endif
                                            @endforeach

                                            @if(!$buttonEnabled)
                                            <a href="{{ route('add-blogcontent', ['id' => $value->id]) }}" class="btn">
                                                <button style="padding: 8px; background-color: #cae8ca; color: #0a0302; border: none;">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Add Blog content</span>
                                                </button>
                                            </a>
                                            @endif
                                        </td>




                                        <td>
                                            <button style="background-color: #cae8ca; color: #fff; border: none;">
                                                <a href="{{route('view-blogcontent', ['id' => $value->id])}}" class="btn">
                                                    <i class=""></i>
                                                    <span>View Blog content</span>
                                                </a>
                                            </button>
                                        </td>

                                        <td>
                                            <a href="{{url('admin/blog/edit/'.$value->id)}}" class="btn"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/brand/delete/'.$value->id)}}" class="btn"><i class="fas fa-trash"></i></a>
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
@endsection

@section('style')
<!-- Include jQuery -->

<!-- Initialize Select2 -->





@endsection