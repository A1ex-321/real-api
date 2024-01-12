@extends('admin.layouts.app')

@section('content')


<head>
    <title>Laravel 9 Multiple Upload Images using Dropzone drag and drop</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"></script>
</head>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- Content header content here -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add New Blog <small></small></h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('create-blog') }}" method="post" enctype="multipart/form-data" id="step1">
                                <div class="card-body">
                                    <!-- Form inputs here -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tittle<span style="color:red">*</span></label>
                                        <input type="text" name="Tittle" class="form-control" id="exampleInputEmail1" placeholder="Tittle" value="{{ $all->Tittle }}" required>

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description<span style="color:red"></span></label>
                                        <input type="text" name="Description" class="form-control" id="exampleInputEmail1" placeholder="Description" value="{{ $all->Description }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thumb Image<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" readonly value="{{ $all->Image }}" />
                                    </div>

                            </form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">multiple image<span style="color:red">*</span></label>
                            </div>
                            <form method="post" action="{{ url('image/upload/store/' . $all->id) }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                                @csrf
                                <!-- Other form elements go here -->
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        paramName: "file", // This should match the name used in the server-side code
        acceptedFiles: ".jpeg, .jpg, .png, .gif",
        addRemoveLinks: true,
        timeout: 5000,
        init: function() {
            this.on("success", function(file, response) {
                console.log(response);
            });
            this.on("error", function(file, response) {
                return false;
            });
        }
    };
</script>





@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/min/dropzone.min.js"></script>

<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        paramName: "file", // This should match the name used in the server-side code
        acceptedFiles: ".jpeg, .jpg, .png, .gif",
        addRemoveLinks: true,
        timeout: 5000,
        init: function() {
            this.on("success", function(file, response) {
                console.log(response);
            });
            this.on("error", function(file, response) {
                return false;
            });
        }
    };
</script>
<script>
    $(document).ready(function() {
        // Assuming your form has an ID of "step1" and the file input has a name of "Image"
        $('#step1 input[name="Image"]').change(function() {
            $('#step1').submit(); // Submit the form when the file input changes
        });
    });
</script>
<script>
    function submitForms() {
        // Submit the first form
        var form1 = document.getElementById("step1");
        var formData1 = new FormData(form1);
        // You can perform additional actions or validations if needed

        // Submit the second form (dropzone)
        var form2 = document.getElementById("dropzone");
        var formData2 = new FormData(form2);
        // You can perform additional actions or validations if needed

        // Combine both form data into a single form data object if necessary
        var combinedFormData = new FormData();
        combinedFormData.append('Title', formData1.get('Title'));
        combinedFormData.append('Description', formData1.get('Description'));
        combinedFormData.append('Image', formData1.get('Image'));
        combinedFormData.append('ImageFile', formData2.get('ImageFile'));
        console.log(combinedFormData);

        // Now you can perform the AJAX request to submit combinedFormData
        // Adapt this based on your backend API or route
        // fetch('', {
        //     method: 'POST',
        //     body: combinedFormData
        // })
        // .then(response => response.json())
        // .then(data => {
        //     // Handle success or display success message
        //     console.log(data);
        // })
        // .catch(error => {
        //     // Handle error
        //     console.error('Error:', error);
        // });
    }
</script>
@endpush