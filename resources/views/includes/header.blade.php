<style>.main-menu > ul > li > a {
    padding: 15px !important;
}
.main-menu > ul > li {
    list-style-type: none;
    display: inline-block;
    margin-right: 15px;
}

.main-menu > ul > li > a {
    text-decoration: none;
    color: #000;  /* Adjust the color as needed */
    transition: color 0.3s ease;
}

.main-menu > ul > li > a:hover {
    color: #007bff;  /* Adjust the hover color as needed */
}
.main-menu > ul > li:hover {
    background-color: #f0f0f0;  /* Adjust the background color as needed */
}
.single-propertiy:hover img {
    transform: scale(1.1); /* Increase the size on hover */
    transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
    
}
/* Add this CSS to your stylesheet or within a style tag in your HTML */
.single-propertiy:hover h4 a {
    color: #ff6600; /* Change the color on hover */
    transition: color 0.3s ease-in-out; /* Add a smooth transition effect */
}

</style>
<header class="header-wrapper section">
    
        <div class="header-section section">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-2 col-6">
                        <div class="header-logo" >
                            <a href="index.html"><img src="{{ asset('public/images/image__5_-removebg-preview.png') }}" alt="">

                            <img src="{{ asset('public/images/rk-housing-high-resolution-logo-transparent.png') }}" alt="">

                        </div>
                    </div>

                    <div class="col-lg-10 col-6">
                        <div class="header-mid_right-bar">
                            <nav class="main-menu d-lg-block d-none" >
                                <ul>
                                <li style="padding: 0 !important"><a  href="{{ url('/') }}">Home</a></li>


                                <li><a href="{{url('/land')}}">Property</a></li>
                                    <li><a href="{{url('/house')}}">House</a></li>

                                    <!-- <li class="has-dropdown"><a>Plots</a>
                                        <ul class="sub-menu">

                                            <li><a href="properties-left-sidebar.html">Srivilliputhur,Chennai</a></li>
                                            <li><a href="properties-right-sidebar.html">Madurai</a></li> -->
                                            <!-- <li><a href="properties-details.html">Properties Details</a></li>
                                        <li><a href="add-property.html">Add Propertie</a></li> -->
                                        <!-- </ul>
                                    </li> -->
                                    <li><a href="{{ url('/about')}}">About Us</a></li>


                                    <li><a href="{{ url('/contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- <div id="search-overlay-trigger" class="search-icon">
                                <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            </div> -->
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="mobile-menu order-12 d-block d-lg-none col"></div>

                </div>
            </div>
        </div><!-- Header Section End -->
    </header>