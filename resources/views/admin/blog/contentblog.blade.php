@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- ... (Your existing content header) ... -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Your existing form -->
                    <form action="{{ route('ckeditor.upload') }}" method="post">
                        @csrf
                        <input type="hidden" name="blog_id" value="blog->id">
                        <textarea name="blog_content" id="editor" style="height: 250px;"required></textarea>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.tiny.cloud/1/API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/API_KEY/tinymce/5/plugins/image/plugin.min.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) ,{
            ckfinder:{                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",

}
        })
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush