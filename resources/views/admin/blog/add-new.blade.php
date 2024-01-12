@extends('admin.layouts.app')

@section('content')

<head>
    <title>Laravel 9 Multiple Upload Images using Dropzone drag and drop</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>
    #preview {
        display: flex;
        flex-wrap: wrap;
    }


    .image-container {
        margin-right: 10px;
    }
</style>
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
                        <form action="{{ route('create-blog') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tittle<span style="color:red">*</span></label>
                                    <input type="text" name="Tittle" class="form-control" id="exampleInputEmail1" placeholder="Tittle" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description<span style="color:red">*</span></label>
                                    <input type="text" name="Description" class="form-control" id="exampleInputEmail1" placeholder="Description" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image<span style="color:red">*</span></label>
                                    <input type="file" name="Image" class="form-control" id="exampleInputEmail1" placeholder="Image" value="" required>
                                </div>
                                <input type="hidden" id="imageIds" name="multiimage" value="" >

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Multiple Image<span style="color:red">*</span></label>
                                    <input type="file" id="imageInput" name="" class="form-control" value="" multiple required>
                                </div>


                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">multiple Image<span style="color:red">*</span></label>
                                    <input type="file" id="imageInput" name="image" accept="image/*" multiple>
                                </div> -->
                                <div id="preview"></div>

                                <!-- /.card-body -->
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
</div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function() {
        $('#imageInput').on('change', function() {
            var formData = new FormData();
            var files = $('#imageInput')[0].files;

            for (var i = 0; i < files.length; i++) {
                formData.append('multipleimage[]', files[i]);
            }

            // Add CSRF token to formData
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ url("upload-multiple") }}', // Replace with your actual route
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Images uploaded successfully:', response);
                    // Handle the response as needed

                    // Fetch images after successful upload
                    fetchImages();

                },
                error: function(error) {
                    console.error('Error uploading images:', error);
                    // Handle errors if any
                }
            });
        });


        function fetchImages() {
    $.ajax({
        url: '{{ url("fetch-images") }}', // Replace with your actual route for fetching images
        method: 'GET',
        success: function(response) {
            // Clear previous preview
            $('#preview').empty();

            var imageIds = '';  // String to store image IDs

            // Loop through the image URLs and create image elements for preview
            response.images.forEach(function(imageUrl) {
                var imageHtml = '<div class="preview-item" style="position: relative; width: 100px; height: 100px;">';
                imageHtml += '<img src="' + imageUrl.url + '" class="preview-image" alt="Preview Image" style="width: 100%; height: 100%;">';
                imageHtml += '<button class="delete-btn" data-id="' + imageUrl.id + '" style="position: absolute; top: 0; right: 0; background-color: white; border: none; padding: 5px; cursor: pointer; color: red; font-size: 16px;" type="button">&#10005;</button>';
                imageHtml += '</div>';

                $('#preview').append(imageHtml);

                // Append the image ID to the string
                imageIds += imageUrl.id + ',';
            });

            // Remove the trailing comma
            imageIds = imageIds.slice(0, -1);

            // Set the value of the hidden input
            $('#imageIds').val(imageIds);
        },
        error: function(error) {
            console.error('Error fetching images:', error);
            // Handle errors if any
        }
    });
}

        // Add CSRF token to formData
        // formData.append('_token', '{{ csrf_token() }}');
        var clickCount = 0;

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            deleteImage(id);
            fetchImages(); // Call fetchImages after deleting an image
            fetchImages();
        });


        function deleteImage(id) {
            $.ajax({
                url: '/delete-image/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.message);
                    // Handle success, maybe remove the deleted image from the UI
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('XHR:', xhr);
                    console.error('Status:', textStatus);
                    console.error('Error Thrown:', errorThrown);
                }
            });
        }


        // Fetch images on page load
        fetchImages();

    });

    // function fetch(){

    // }
</script>


<script>
    $(document).ready(function() {
        var uploadedImages = []; // Array to store image data
        var fileArray = [];

        $('#imageInput').on('change', function() {
            var input = this;

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    var file = input.files[i];
                    var fileName = file.name;

                    reader.onload = (function(name) {
                        return function(e) {
                            // Store original image data in the array
                            uploadedImages.push({
                                src: e.target.result,
                                name: name
                            });

                            renderImages(); // Call a function to render images based on the array
                        };
                    })(fileName);

                    reader.readAsDataURL(file);
                }
            }
            console.log('All files:', uploadedImages);

        });

        // function renderImages() {
        //     $('#preview').empty(); // Clear existing previews

        //     // Render images based on the array
        //     for (var i = 0; i < uploadedImages.length; i++) {
        //         var imageContainer = '<div class="image-container" style="margin-top: 10px; position: relative;">' +
        //     '<img src="' + uploadedImages[i].src + '" alt="' + uploadedImages[i].alt + '" class="preview-image" style="width: 100px; height: 100px;">' +
        //     '<button id="' + uploadedImages[i].name + '" class="removeBtn" data-index="' + i + '" style="position: absolute; top: 0; right: 0;">&#10005;</button>' +
        //     '</div>';

        //         $('#preview').append(imageContainer);
        //     }
        // }

        //         function replaceFileInput(fileArray) {
        //     var fileInput = document.getElementById('imageInput');

        //     // Unbind previous change event to avoid multiple bindings
        //     $(fileInput).off('change');

        //     // Clear the existing files
        //     fileInput.value = '';

        //     // Trigger change event to simulate user interaction
        //     $(fileInput).change(function() {
        //         handleFileUpload();
        //     });

        //     // Update attributes of the existing input element based on fileArray
        //     if (fileArray.length > 0) {
        //         fileInput.removeAttribute('id');
        //         fileInput.removeAttribute('name');
        //         fileInput.removeAttribute('multiple');

        //         fileInput.id = 'imageInput';
        //         fileInput.name = 'multipleimage[]';
        //         fileInput.multiple = true;
        //     }
        // }







        function handleFileUpload() {
            var input = document.getElementById('imageInput');
            var selectedFiles = input.files;

            // 'selectedFiles' is a FileList, you can loop through it to access each file
            for (var i = 0; i < selectedFiles.length; i++) {
                var file = selectedFiles[i];
                var fileInfo = {
                    name: file.name,
                    type: file.type,
                    size: file.size
                };
                fileArray.push(fileInfo);
            }

            console.log('All files fill:', fileArray);

        }
        document.getElementById('imageInput').addEventListener('change', handleFileUpload);

        $('#preview').on('click', '.removeBtn', function() {
            var index = $(this).data('index');
            var clickedImageName = uploadedImages[index].name;
            var clickedFileName = fileArray[index].name;
            console.log('clickedImageName:', clickedImageName);
            console.log('clickedFileName:', clickedFileName);
            if (clickedImageName == clickedFileName) {
                uploadedImages.splice(index, 1);
                fileArray.splice(index, 1);
                renderImages();
                replaceFileInput(fileArray); // Replace the file input after removing images

            }
            console.log('All files fill after:', fileArray);
            console.log('All files:after', uploadedImages);


        });


    });
</script>

@endpush