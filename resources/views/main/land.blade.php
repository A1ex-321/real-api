@include('includes.head')
@include('includes.header')
<!--  search overlay -->
<div class="search-overlay" id="search-overlay">

    <div class="search-overlay__header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 ml-auto col-4">
                    <!-- search content -->
                    <div class="search-content text-right">
                        <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-overlay__inner">
        <div class="search-overlay__body">
            <div class="search-overlay__form">
                <form action="#">
                    <input type="text" placeholder="Search">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of search overlay -->


<!-- Breadcrumb -->
<div class="breadcrumb-area section" style="background-color: aliceblue;">
    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h1 style="color: black;font-weight: bold;font-size:40px;">Welcome To Our</h1>
                    <h1 style="color: rgb(238, 199, 28); font-weight: bold;font-size:40px;">RK Housing</h1>

                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->

<div class="hero-section section">

    <div class="hero-slider hero-slider-one">
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/21.jpg') }}); height: 500px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">


                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/22.jpg') }}); height: 500px;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">



                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/23.jpg') }}); height: 500px;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">



                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/12.jpg') }}); height: 500px;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">



                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- Hero Section End -->
<div class="featured-properites-section section " style="margin-top: 100px;margin-bottom: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tabs-categorys-list mb-30 mb-md-20 mb-xs-20 mb-sm-20">
                    <ul class="nav" role="tablist">
                        <li class="active"><a class="active" href="#tab_item_01" role="tab" data-toggle="tab">Land for Sale</a></li>
                        <li><a href="#tab_item_02" role="tab" data-toggle="tab">Land for Rent</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- tab-contnt start -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab_item_01">

                <div class="row ">
                    @foreach ($getRecord as $property)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-property Start -->
                        <div class="single-property mt-30">
                            <div class="property-img">
                            @if($property->type == 3)
                            <a href="{{ url('/singlelandsale/' . $property->id) }}">
                                    <img src="{{ asset('public/images/' . $property->Image) }}" alt="" style="height:200px;">

                                </a>
                                @elseif($property->type == 4)
                                <a href="{{ url('/singlelandrent/' . $property->id) }}">
                                    <img src="{{ asset('public/images/' . $property->Image) }}" alt="" style="height:200px;">

                                </a>
                                @endif
                              
                            </div>
                            <div class="property-desc">
                                @if($property->type == 3)
                                <h4><a href="{{ url('/singlelandsale/' . $property->id) }}">Land For Sale (₹{{$property->price}})</a></h4>
                                @elseif($property->type == 4)
                                <h4><a href="{{ url('/singlelandrent/' . $property->id) }}">Land For Rent (₹{{$property->price}})</a></h4>
                                @endif
                                <p>
                                    <span class="location">{{ $property->address }}</span>
                                </p>
                            </div>
                        </div><!-- single-property End -->
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div><!-- Featured Properites End -->

@include('includes.footer')