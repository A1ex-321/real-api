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
                            <h3 class="card-title">Add New Blog <small></small></h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('create-logo') }}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="card-body">
                                    <!-- Form inputs here -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Logo<span style="color:red">*</span></label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="Logo" value="" required>
                                    </div>
                                </div>
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
<p>(**only first image will be display.If exists please delete**)</p>
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
                                        <th>Logo</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp

                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td><img src="{{ asset('public/images/' . $value->image) }}" alt="Image" width="80" height="80"></td>

                                   

                                        <td>

                                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/logo/delete/'.$value->id)}}" class="btn"><i class="fas fa-trash"></i></a>
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