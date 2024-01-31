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
<div class="breadcrumb-area section" style="background-image: url({{ asset('public/images/bg/breadcrumb.jpg') }});">

    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h2>Land For sale</h2>
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
                                <div class="row single-propertiy-wigets">
                                    <div class="col-lg-12 col-md-6 single-propertiy mb-30">
                                        <a href="#"><img src="{{ asset('public/images/propertes/w-propertie-01.jpg') }}" alt="">
</a>
                                        <div class="propertiy-det-box">
                                            <h4><a href="#">sale</a></h4>
                                            <p>Price $1,09,000</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 single-propertiy mb-30">
                                        <a href="#"><img src="{{ asset('public/images/propertes/w-propertie-01.jpg') }}" alt="">
</a>
                                        <div class="propertiy-det-box">
                                            <h4><a href="#">sale</a></h4>
                                            <p>Price $1,03,000</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 single-propertiy mb-30">
                                        <a href="#"><img src="{{ asset('public/images/propertes/w-propertie-01.jpg') }}" alt="">
</a>
                                        <div class="propertiy-det-box">
                                            <h4><a href="#">sale</a></h4>
                                            <p>Price $1,08,000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9 col-12 order-lg-1 order-1">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-details-warpper">
                                <div class="details-image mt-30">
                                <img src="{{ asset('public/images/propertes/property_details.jpg') }}" alt="">

                                </div>
                                <div class="details-contents-wrap">
                                   
                                    <h3>Mariyasa de Casel(SALE)</h3>

                                    <p class="mt-10">Ortiz is one of the most popular real estate company all around USA. You can find your dream property or build property with us. We always provide importance to our customer that what they want or what they like ipsam </p>
                                    
                                    <h4>Description</h4>
                                    
                                    <p>Ortiz is one of the most popular real estate company all around USA. You can find your dream property or build property with us. We always provide importance to our customer that what they want or what they like ipsam ursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure</p>
                                    
                                    <p>Ortiz is one of the most popular real estate company all around USA. You can find your dream property or build property with us. We always provide importance to our customer that what they want or what they like ipsam ursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone </p>
                                    
                                    
                                    
                                    <div class="propertice-details pt-25">
                                        <div class="row">
                                           
                                            <div class="col-12">
                                                <div class="properties-details-title mb-10">
                                                    <h4>Condition</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <strong>Areas:</strong><span> 1200 Sqrt</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-info">
                                                    <strong>Bedroom:</strong><span> 5 Bedroom</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <strong>Bathroom:</strong><span> 3 Bathroom</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <strong>Kitchen: </strong><span> 2</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <strong>Leaving room:</strong><span> 3</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <strong>Garage:</strong><span> 3</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-6">
                                                <div class="single-info">
                                                    <strong>Address:</strong><span>   22 Aveniew Tower (5th floor) First Street, Chicago, USA</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-property-price">
                                                    <strong>Price:  $1,53,000</strong>
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
                                            
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Air Conditioning</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="single-info">
                                                    <span>Bedding</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Balcony</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Cable TV</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Internet</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Parking</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>lift</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Home Theater</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Pool</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Dishwasher</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-info">
                                                    <span>Toaster</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="propertice-details pt-25">
                                    <div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <div class="properties-details-title mb-20">
                    <h4>Multi Images</h4>
                </div>
            </div>
            <div class="col-lg-4"> <!-- Each image takes one-third of the column -->
                <div class="image">
                    <img src="{{ asset('public/images/propertes/property-map.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="image">
                    <img src="{{ asset('public/images/propertes/property-map.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="image">
                    <img src="{{ asset('public/images/propertes/property-map.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                    
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>
    </div><!-- Featured Properites End -->  

</main>
<!--// Page Conttent -->
@include('includes.footer')
