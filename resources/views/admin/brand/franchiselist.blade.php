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
                        <li class="breadcrumb-item active"></li>



                        <a href="{{route('add-new')}}" class="btn btn-block btn-primary">
                            
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
                                        <th>Name</th>
                                        <th>phone</th>
                                        <th>state</th>
                                        <th>city</th>
                                        
                                        <!-- <th>Mail Address</th>
                                        <th>Mail From name</th> -->
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)

                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->state}}</td>
                                        <td>{{$value->city}}</td>
                                        <!-- <td>{{$value->MAIL_PASSWORD}}</td>
                                        <td>{{$value->MAIL_ENCRYPTION}}</td> -->
                                        <!-- <td>{{$value->MAIL_FROM_ADDRESS}}</td>
                                        <td>{{$value->MAIL_FROM_NAME}}</td>       -->
                                        <td>
                                        <td>
                                            <!-- <a href="{{url('admin/brand/edit/'.$value->id)}}" class="btn  "><i
                                                    class="fas fa-edit"></i>
                                            </a> -->
                                            <a onclick="return confirm('Are you sure you want to delete?')"
                                                href="{{url('admin/franchise/delete/'.$value->id)}}" class="btn "><i
                                                    class="fas fa-trash"></i></a>

                                        </td>

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




@endsection