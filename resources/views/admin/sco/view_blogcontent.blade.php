@extends('admin.layouts.app')

@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 250Px;
    }
</style>
<style>
    .ckeditor-content img {
        width: 100%; /* Set the width to 100% to ensure responsiveness */
        height: auto; /* Maintain aspect ratio */
        width: 600px; /* Set your desired maximum width */
        height: 350px; /* Set your desired maximum height */
        object-fit: cover;
        border-radius: 1%;
    }
</style>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<style>
    /* styles.css */
    .container {
        text-align: center;
        color: #333;
    }

    /* styles.css */
    .title {
        background-color: #2ECDB7;
        color: #ffffff;
        padding: 13px;
    }

    .subtitle {
        background-color: #2ECDB7;
        color: #ffffff;
        padding: 13px;
        margin-top: 5px !important;
    }

    /* Assuming CKEditor alignment classes */
    @media (max-width: 768px) {
        .subtitle {
            margin-top: 0 !important;
            padding: 10px;
        }

        .img-container {
            width: 100%;
            /* Make image container full-width on smaller screens */
        }
    }
</style>

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
                        <li class="breadcrumb-item active">Blog</li>
                        <a href="{{ route('blogsco-list') }}" class="btn btn-block btn-primary">Back</a>
                    </ol>
                </div><!-- /.col -->
                <div class="container" style="text-align: center; color: #333;">
                    <h1 class="subtitle">Title: {{ $content->title }}</h1>
                    <h3 class="title">Description: {{ $content->description }}</h3>
                    <div class="ckeditor-content">
                        <div>{!! $content->content !!}</div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<script>
    const oembedContainers = document.querySelectorAll('oembed');
    oembedContainers.forEach(oembed => {
    const outerHtml = oembed.outerHTML;
    const urlMatch = outerHtml.match(/url="(.*?)"/);

    if (urlMatch) {
        const url = urlMatch[1];
        console.log("url", url);

        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', url);
        iframe.setAttribute('width', '600'); // Set your desired width
        iframe.setAttribute('height', '400'); // Set your desired height
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.style.margin = 'auto'; // Center align the iframe

        oembed.replaceWith(iframe);
    }
});
// console.log("uid", oembedContainers)
// document.addEventListener("DOMContentLoaded", function () {
//     const blogListContainer1 = document.querySelector('.ckeditor-content');
//     const content = {!! json_encode($content->content ?? '') !!};

//     // Manually extract YouTube video URLs
//     const youtubeRegex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/g;
//     const youtubeMatches = content.matchAll(youtubeRegex);

//     for (const match of youtubeMatches) {
//         const videoId = match[1];
//         const youtubeUrl = `https://www.youtube.com/embed/${videoId}`;

//         // Create an iframe element with allow attribute
//         const iframe = document.createElement('iframe');
//         iframe.src = youtubeUrl;
//         iframe.allow = 'autoplay; fullscreen'; // Allow autoplay and fullscreen
//         iframe.style.width = '700px';
//         iframe.style.height = '400px'; // You can adjust the height as needed

//         // Append each iframe to the container
//         blogListContainer1.appendChild(iframe);
//     }

//     if (!youtubeMatches || youtubeMatches.length === 0) {
//         // Handle case when no YouTube video URL is found in the content
//         console.error('No YouTube video URLs found in the content');
//     }
// });


</script>

@endsection

@section('style')

@endsection
