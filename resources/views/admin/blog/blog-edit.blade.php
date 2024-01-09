@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Blog </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- /.row start -->
            <div class="row">
                {{-- Start - Content comes here --}}
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Blog <small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('update-brand', ['id' => $getRecord->id]) }}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                           

                            <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tittle<span style="color:red">*</span></label>
                    <input type="text" name="Tittle" class="form-control" id="exampleInputEmail1" placeholder="Tittle"  value="{{old('Tittle', $getRecord->Tittle)}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description<span style="color:red">*</span></label>
                    <input type="text" name="Description" class="form-control" id="exampleInputEmail1" placeholder="Description" value="{{old('Description', $getRecord->Description)}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image<span style="color:red">*</span></label>
                    <input type="file" name="Image" class="form-control" id="exampleInputEmail1" placeholder="Image" value="{{old('Image', $getRecord->Image)}}" >
                  </div>
                  
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">MAIL_FROM_ADDRESS<span style="color:red">*</span></label>
                    <input type="text" name="MAIL_FROM_ADDRESS" class="form-control" id="exampleInputEmail1" placeholder="MAIL_FROM_ADDRESS" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">MAIL_FROM_NAME<span style="color:red">*</span></label>
                    <input type="text" name="MAIL_FROM_NAME" class="form-control" id="exampleInputEmail1" placeholder="MAIL_FROM_NAME" value="" required>
                  </div> -->

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

</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        function readURL(input) {
            console.log('idd')
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result).css('display', 'block');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            console.log('ss')
            readURL(this);
        });
    });
</script>
@endpush
