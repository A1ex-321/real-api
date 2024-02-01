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
    #add-tag-button 
    {
        background-color: green;

    }    

    .image-container {
        margin-right: 10px;
    }

    #tags-container {
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        border: 1px solid #ccc;
    }

    .tag {
        background-color: #f0f0f0;
        padding: 5px;
        margin: 5px;
        border-radius: 3px;
        cursor: pointer;
    }

    .remove-button {
        color: red;
        cursor: pointer;
        margin-left: 5px;
    }

    #tags-container1,
    #tags-container2 {
        display: inline-block;
        vertical-align: top;
        /* Adjust as needed */
    }

    .horizontal-tags {
        display: flex;
        flex-wrap: wrap;
        /* Wrap to the next line when width reaches 100% */
    }

    .combined-tag {
        display: inline-block;
        margin-right: 10px;
        /* Adjust the spacing as needed */
        margin-bottom: 5px;
    }

    .remove-button {
        margin-left: 5px;
        /* Adjust the spacing as needed */
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
                            <h3 class="card-title">Edit <small></small></h3>
                        </div>
                        <form action="{{ route('update-brand', ['id' => $getRecord->id]) }}" method="post" enctype="multipart/form-data" id="tags-form">
                            {{csrf_field()}}


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type<span style="color:red">*</span></label>
                                    <select name="type" class="form-control" id="exampleInputEmail1">
                                        <option {{($getRecord->type==1)? 'selected':''}} value="1">Property Sale</option>
                                        <option {{($getRecord->type==2)? 'selected':''}} value="2">Property Rent</option>
                                        <option {{($getRecord->type==3)? 'selected':''}} value="3">Land Sale</option>
                                        <option {{($getRecord->type==4)? 'selected':''}} value="4">Land Rent</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Property Title<span style="color:red">*</span></label>
                                    <input type="text" name="Tittle" class="form-control" id="exampleInputEmail1" placeholder="Title" value="{{old('Tittle', $getRecord->Tittle)}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description<span style="color:red"></span></label>
                                    <textarea name="Description" class="form-control" id="exampleInputEmail1" placeholder="Description" style="width: 100%; height: 100px;">{{ old('Tittle', $getRecord->Description) }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address<span style="color:red"></span></label>
                                    <textarea name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" style="width: 100%; height: 100px;">{{ old('address', $getRecord->address) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thumb Image<span style="color:red">*</span></label>
                                    <input type="file" name="Image" class="form-control" id="exampleInputEmail1" placeholder="Image" value="{{ old('Tittle', $getRecord->Image) }}">
                                </div>

                                @if ($getRecord->Image)
                                <div>
                                    <img src="{{ asset('public/images/' . $getRecord->Image) }}" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">
                                </div>
                                @endif

                                <input type="hidden" id="imageIds" name="multiimage" value="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price<span style="color:red">*</span></label>
                                    <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Price" value="{{ old('price', $getRecord->price) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amenities<span style="color:red"></span></label>
                                    <div id="tags-container">
                                        <input type="text" id="tag-input" placeholder="Amenities" name="amenities">
                                        <button type="button" id="add-tag-button">+</button>
                                  
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Condition<span style="color:red"></span></label>
                                    <label for="exampleInputEmail1">Title<span style="color:red"></span></label>
                                    <div id="tags-container1">
                                        <input type="text" id="tag-input1" placeholder="first" name="">
                                    </div>
                                    <label for="exampleInputEmail1">Value<span style="color:red"></span></label>
                                    <div id="tags-container2">
                                        <input type="text" id="tag-input2" placeholder="second" name="">
                                    </div>
                                    <button type="button" style="background-color:green;" class="add-tag-button">Add Tag</button>
                                </div>




                                <div id="combined-tags" class="horizontal-tags"></div>
                                <input type="hidden" id="condition" name="condition" value="">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Multiple Image<span style="color:red">*</span></label>
                                    <input type="file" id="imageInput" name="" class="form-control" value="" multiple>
                                </div>


                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">multiple Image<span style="color:red">*</span></label>
                                    <input type="file" id="imageInput" name="image" accept="image/*" multiple>
                                </div> -->
                                <div id="preview"></div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">update</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const tagsContainer = document.getElementById('tags-container');
        const tagInput = document.getElementById('tag-input');
        const addButton = document.getElementById('add-tag-button');
        const tagsForm = document.getElementById('tags-form');

        // Assume you have a PHP variable $getRecordAmenities containing the amenities from the database
        const amenitiesFromDatabase = {!! json_encode($getRecord->amenities) !!};

        // Split the amenities with double commas and filter empty strings
        const amenitiesArray = amenitiesFromDatabase.split(',,').filter(Boolean);

        // Display tags from the database
        amenitiesArray.forEach(tagText => addTag(tagText));

        addButton.addEventListener('click', function () {
            const tagText = tagInput.value;
            if (tagText !== '') {
                addTag(tagText);
                tagInput.value = '';
            }
        });

        tagsForm.addEventListener('submit', function (event) {
            const tagValues = Array.from(tagsContainer.getElementsByClassName('tag'))
            .map(tagElement => tagElement.textContent.replace(/(✕|✏️)/g, ''))
                .join(',,');

            document.getElementsByName('amenities')[0].value = tagValues;
        });

       

        function addTag(tagText) {
            const tagElement = document.createElement('div');
            tagElement.classList.add('tag');

            const tagContent = document.createElement('span');
            tagContent.textContent = tagText;
            tagElement.appendChild(tagContent);

            const editButton = document.createElement('button');
            editButton.classList.add('edit-button');
            editButton.textContent = '✏️';
            editButton.addEventListener('click', function (e) {
                e.preventDefault();
                const updatedText = prompt('Edit the tag:', tagText);
                if (updatedText !== null) {
                    tagContent.textContent = updatedText;
                }
            });
            tagElement.appendChild(editButton);

            const removeButton = document.createElement('button');
            removeButton.classList.add('remove-button');
            removeButton.textContent = '✕';
            removeButton.addEventListener('click', function () {
                tagsContainer.removeChild(tagElement);
            });
            tagElement.appendChild(removeButton);

            tagsContainer.appendChild(tagElement);
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addTagButton = document.querySelector('.add-tag-button');
        const combinedTagsContainer = document.getElementById('combined-tags');
        const hiddenInput = document.getElementById('condition');
        const amenitiesFromDatabase = {!! json_encode($getRecord->condition) !!};

        // Split the amenities with double commas and filter empty strings
        const amenitiesArray1 = amenitiesFromDatabase.split(',,').filter(Boolean);
        amenitiesArray1.forEach(combinedText => displayCombinedTags(combinedText));

        addTagButton.addEventListener('click', function() {
            const tagInput1 = document.getElementById('tag-input1');
            const tagInput2 = document.getElementById('tag-input2');

            const tagText1 = tagInput1.value;
            const tagText2 = tagInput2.value;

            if (tagText1 !== '' && tagText2 !== '') {
                const combinedText = `${tagText1}:${tagText2}`;
                displayCombinedTags(combinedText);

                tagInput1.value = '';
                tagInput2.value = '';
            }
        });

        function displayCombinedTags(combinedText) {
            const combinedTagsElement = document.createElement('div');
            combinedTagsElement.classList.add('combined-tag');

            const tagContent = document.createElement('span');
            tagContent.textContent = combinedText;
            combinedTagsElement.appendChild(tagContent);

            const editButton = document.createElement('button');
            editButton.classList.add('edit-button');
            editButton.textContent = '✏️';
            editButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the form submission
                const updatedText = prompt('Edit the tag:', tagContent.textContent);
                if (updatedText !== null) {
                    tagContent.textContent = updatedText;
                    updateHiddenInput();
                }
            });
            combinedTagsElement.appendChild(editButton);
            const removeButton = document.createElement('button');
            removeButton.classList.add('remove-button');
            removeButton.textContent = '✕';
            removeButton.addEventListener('click', function() {
                combinedTagsContainer.removeChild(combinedTagsElement);
                updateHiddenInput();
            });
            combinedTagsElement.appendChild(removeButton);

            combinedTagsContainer.appendChild(combinedTagsElement);

            updateHiddenInput();
        }

        function updateHiddenInput() {
            const combinedTags = Array.from(combinedTagsContainer.getElementsByClassName('combined-tag'))
                .map(tagElement => tagElement.textContent.replace(/(✕|✏️)/g, ''))
                .join(',,');

            hiddenInput.value = combinedTags;
        }
    });
</script>

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

                    var imageIds = ''; // String to store image IDs

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
@endpush