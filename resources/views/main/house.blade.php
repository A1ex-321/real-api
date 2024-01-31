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
                    <h1 style="color: black;font-weight: bold;font-size:40px;" >Welcome To Our</h1>
                    <h1 style="color: rgb(238, 199, 28); font-weight: bold;font-size:40px;" >RK Housing</h1>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->
    
<div class="hero-section section">

    <div class="hero-slider hero-slider-one">
    <div class="hero-slide-item" style="background-image: url({{ asset('public/images/g2.png') }}); height: 500px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">
                      
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/b6.jpeg') }}); height: 500px;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/g4.png') }}); height: 500px;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 ml-auto mr-auto">
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item" style="background-image: url({{ asset('public/images/b3.jpg') }}); height: 500px;">

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
                       <li class="active"><a class="active" href="#tab_item_01" role="tab" data-toggle="tab">House for Sale</a></li>
                       <li><a href="#tab_item_02" role="tab" data-toggle="tab">House for Rent</a></li>
                   </ul>
                </div>
            </div>

        </div>
       
        <!-- tab-contnt start -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab_item_01">
                
                <div class="row ">

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-property Start -->
                        <div class="single-property mt-30">
                            <div class="property-img">
                                <a href="{{url('/singleland')}}">
                                <img src="{{ asset('public/images/c1.jpg') }}" alt="">
                                </a>
                                <!-- <span class="level-stryker">FOR RENT</span> -->
                            </div>
                            <div class="property-desc">
                                <h4><a href="{{url('/singleland')}}">PLOT for rent</a></h4>
                                <p>
                                    <span class="location">Address</span>
                                   
                                </p>
                               
                            </div>
                        </div><!-- single-property End -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-property Start -->
                        <div class="single-property mt-30">
                            <div class="property-img">
                                <a href="properties-details.html">
                                <img src="{{ asset('public/images/c2.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="property-desc">
                                <h4><a href="properties-details.html">PLOT for sale</a></h4>
                                <p>
                                    
                                    <span class="property-info">Address </span>
                                </p>
                             
                            </div>
                        </div><!-- single-property End -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-property Start -->
                        <div class="single-property mt-30">
                            <div class="property-img">
                                <a href="properties-details.html">
                                <img src="{{ asset('public/images/c3.jpg') }}" alt="">
                                </a>
                                <!-- <span class="level-stryker-2">FOR RENT</span> -->
                            </div>
                            <div class="property-desc">
                                <h4><a href="properties-details.html">PLOT for rent</a></h4>
                                <p>
                                  
                                    <span class="property-info">Address </span>
                                </p>
                               
                            </div>
                        </div><!-- single-property End -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-property Start -->
                        <div class="single-property mt-30">
                            <div class="property-img">
                                <a href="properties-details.html">
                                <img src="{{ asset('public/images/c3.jpg') }}" alt="">
                                </a>
                                <!-- <span class="level-stryker-2">FOR RENT</span> -->
                            </div>
                            <div class="property-desc">
                                <h4><a href="properties-details.html">PLOT for sale</a></h4>
                                <p>
                                  
                                    <span class="property-info">Address </span>
                                </p>
                               
                            </div>
                        </div><!-- single-property End -->
                    </div>
                
                  
                  

                 

                </div>
            </div>
    
        </div>
    </div>
</div><!-- Featured Properites End -->  

@include('includes.footer')
