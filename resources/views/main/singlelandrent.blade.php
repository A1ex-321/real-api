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
<div class="breadcrumb-area section" style="background-image: url({{ asset('public/images/images3.jpg') }}); height:255PX;">

    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h2>Land For Rent</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Properties Details</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->

<!-- Page Conttent -->
<main class="page-content section">

    <!-- Featured Properites Start -->
    <div class="properites-sidebar-wrap pt-80 pt-md-60 pt-sm-40 pt-xs-30 pb-110 pb-md-90 pb-sm-70 pb-xs-60">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 col-12 order-lg-2 order-2">
                    <div class="row widgets">


                        <div class="col-lg-12">
                            <div class="single-widget widget">
                                <h4 class="widget-title">
                                    <span>New Added Property</span>
                                </h4>
                                @foreach($All as $property)
                                <div class="row single-propertiy-wigets">
                                    <div class="col-lg-12 col-md-6 single-propertiy mb-30">
                                        <a href="{{ url('/singlelandrent/' . $property->id) }}"><img src="{{ asset('public/images/' . $property->Image) }}" alt="">

                                        </a>
                                        <div class="propertiy-det-box">
                                            <h4><a href="{{ url('/singlelandrent/' . $property->id) }}">Property Rent</a></h4>
                                            <h5>
                                                {{ $property->address }}
                                            </h5>
                                            <p>Price : ₹{{$property->price}}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>



                    </div>
                </div>
                @foreach ($getRecord as $property)

                <div class="col-lg-8 col-xl-9 col-12 order-lg-1 order-1">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-details-warpper">
                                <div class="details-image mt-30">
                                    <img style="width:100%;height:400px;" src="{{ asset('public/images/' . $property->Image) }}" alt="">

                                </div>
                                <div class="details-contents-wrap">

                                    <h2>{{ $property->Tittle }} (RENT)</h2>

                                    <h3>Description</h3>
                                    <p>{{ $property->Description }} </p>



                                    <div class="propertice-details pt-25">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="properties-details-title mb-10">
                                                    <h4>Condition</h4>
                                                </div>
                                            </div>


                                            @if (!empty($property->condition))
                                            @php
                                            $conditionsArray = explode(',,', $property->condition);
                                            @endphp

                                            @foreach ($conditionsArray as $condition)
                                            @php
                                            list($strong, $span) = explode(':', $condition, 2);
                                            @endphp
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <strong>{{ $strong }}:</strong><span> {{ $span }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif





                                            <div class="propertice-details pt-25" style="margin-left:17px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="properties-details-title mb-10">
                                                            <h4>Address and Price</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="single-info">
                                                            <strong>Address:</strong><span> {{ $property->address }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="single-property-price">
                                                            <strong>Price: ₹{{ $property->price }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="propertice-details pt-25">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="properties-details-title mb-10">
                                                    <h4>Amenities</h4>
                                                </div>
                                            </div>
                                            @if (!empty($property->amenities))
                                            @php
                                            $amenitiesArray = explode(',,', $property->amenities);
                                            @endphp

                                            @foreach ($amenitiesArray as $amenity)

                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>{{ $amenity }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="propertice-details pt-25">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="properties-details-title mb-20">
                                                            <h4>Multiple Photos</h4>
                                                        </div>
                                                    </div>
                                                    @if (!empty($property->multiimage))
                                                    @foreach (explode(',', $property->multiimage) as $image)
                                                    <div class="col-lg-6"> <!-- Each image takes one-third of the column -->

                                                        <div class="image">
                                                            <img style="padding-bottom:15px;width:100%;height:200px;object-fit:cover;" src="{{ asset('public/images/' . $image) }}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div><!-- Featured Properites End -->

</main>
<!--// Page Conttent -->
@include('includes.footer')