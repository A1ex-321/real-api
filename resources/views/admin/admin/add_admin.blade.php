@extends('admin.layouts.app')


@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- /.row start -->
       <div class="row">
        {{-- Start -  Content comes here --}}




        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Admin <small>Page</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   action="" method="post">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{old('name')}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}" required>
                    <div style="color:red" >{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                   <select name="status" class="form-control" required>
                    <option value="0" {{(old('status'==0)?'selected':'')}}>Active</option>
                    <option value="1" {{(old('status'==1)?'selected':'')}}> Inactive</option>
                   </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                   <select name="role" class="form-control" required>
                    <option value="0" {{(old('status'==0)?'selected':'')}}>Admin</option>
                    <option value="1" {{(old('status'==1)?'selected':'')}}>super Admin</option>
                   </select>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>











        {{-- End - Content comes here --}}
       </div>
        <!-- /.row end -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection







