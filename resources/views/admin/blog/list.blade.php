@extends('admin.layouts.app')


@section('content')

<!-- SweetAlert2 CSS -->
<style>
    td div {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        max-width: 100%;
        word-wrap: break-word;
    }

    td {
        max-height: 10px;
        /* Adjust the max-height as needed */
        overflow-y: auto;
        /* Add a vertical scrollbar if needed */
    }
</style>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0">Add</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Work</li>



                        <a href="{{route('create-blog')}}" class="btn btn-block btn-primary">
                            Add
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
                                        <th>Type</th>
                                        <th>Property Title </th>
                                        <th>Description</th>
                                        <th>Thumb Image</th>
                                        <th>Address</th>
                                        <th>Price</th>
                                        <th>Amenities</th>
                                        <th>Condition</th>
                                        <th>Edit & Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp

                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>
                                            @if ($value->type == 1)
                                            Property Sale
                                            @elseif ($value->type == 2)
                                            Property Rent
                                            @elseif ($value->type == 3)
                                            Land Sale
                                            @elseif ($value->type == 4)
                                            Land Rent
                                            @endif
                                        </td>
                                        <td>{{$value->Tittle}}</td>
                                        <td>{{ Str::limit($value->Description, 100) }}</td>
                                        <td><img src="{{ asset('public/images/' . $value->Image) }}" alt="Image" width="80" height="80"></td>

                                        <!--<td>
                                            <button style="background-color: #cae8ca; color: #fff; border: none;">
                                                <a href="{{route('view-blogcontent', ['id' => $value->id])}}" class="btn">
                                                    <i class=""></i>
                                                    <span>View Blog content</span>
                                                </a>
                                            </button>
                                        </td> -->
                                        <!-- Define the function -->


 
<!-- Usage -->
<td>₹{{ $value->address }}</td>

<td>₹{{ $value->price }}</td>







                                        <td>
                                            @if (!empty($value->amenities))
                                            @foreach (explode(',,', $value->amenities) as $amenity)
                                            <div>{{ Str::limit($amenity, 200) }}</div>
                                            @endforeach
                                            @endif
                                        </td>

                                        <td>
                                            @if (!empty($value->condition))
                                            @foreach (explode(',,', $value->condition) as $conditionPart)
                                            <div class="limited-text">{{ $conditionPart }}</div>
                                            @endforeach
                                            @endif
                                        </td>


                                        <td>
                                            <a href="{{url('admin/sale/edit/'.$value->id)}}" class="btn"><i class="fas fa-edit"></i></a>
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