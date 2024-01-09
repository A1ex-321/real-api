@extends('admin.layouts.app')

@section('content')
<style type="text/css">
    .ck-editor__editable_inline
    {
        height:350Px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- ... (Your existing content header) ... -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Your existing form -->
                    <form action="{{ route('update-content', ['id' => $getRecord->id]) }}" method="post">
                        @csrf
                       

                        <textarea name="content_blog" id="editor" style="height: 250px; visibility: hidden;">{{ old('content_blog', $getRecord->content_blog) }}</textarea>


                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div id="editor" contenteditable="true"> -->
    <!-- Users can input text and insert images here -->
</div>
@endsection

@push('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
     }
    // ,
    // plugins: ['color', 'fontSize', 'fontFamily', 'fontBackgroundColor', 'fontColor', 'ckfinder'],
    // toolbar: ['heading', '|', 'bold', 'italic', 'underline', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'colorPicker', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
    
})

        .catch( error => {
            console.error( error );
        } );
</script>
@endpush