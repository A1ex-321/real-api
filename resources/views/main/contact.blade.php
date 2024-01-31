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
<div class="breadcrumb-area section" style="background-image: url({{ asset('public/images/b1.png') }}); background-size: cover;">

    <div class="container">
        <div class="breadcrumb pt-75 pb-75 pt-sm-70 pb-sm-40 pt-xs-70 pb-xs-40">
            <div class="row">
                <div class="col">
                    <h2>Contact us</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--// Breadcrumb -->
 
   
<!-- Our Agents Section Start -->    
<div class="contact-section section pt-110 pt-md-90 pt-sm-70 pt-xs-60 pb-110 pb-md-90 pb-sm-70 pb-xs-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-us-wrap">
                    <div class="contact-title pb-30">
                        <h4>GET IN <span>TOUCH</span></h4>
                        <p>Thank you for considering RK Housing for your real estate needs. We look forward to assisting you on your property journey.  </p>
                    </div>
                    
                    <div class="contact-info">
                        <ul>
                            <li>
                                <div class="contact-text d-flex align-items-center">
                                    <i class="glyph-icon flaticon-placeholder"></i> 
                                    <p>No.7/3,School Street  <br>Irumbuliyur,West Tambaram<br>Chennai-600045</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-text d-flex align-items-center">
                                    <i class="glyph-icon flaticon-call"></i> 
                                    <p>
                                        <span>Call Us : <a href="#">+91 9840656503</a></span>
                                        <span>Call Us  : <a href="#">  +91 8148277828</a></span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-text d-flex align-items-center">
                                    <i class="glyph-icon flaticon-earth"></i>
                                    <p>
                                        <span>Email : <a href="#">admin@rkhousing.in</a></span>
                                        <span>Web : <a href="#">www.rkhousing.in</a></span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-us-wrap">
                    <h4>Leave a Message</h4>
                       
                     <div class="contact-form">
                        <form id="contact-form" action="assets/php/mail.php">
                            <div class="row row-10">
                                <div class="col-md-6 col-12 mb-30"><input  name="name" type="text" placeholder="Your Name"></div>
                                <div class="col-md-6 col-12 mb-30"><input  name="email" type="email" placeholder="Email"></div>
                                <div class="col-12 mb-30"><textarea name="message"  placeholder="Message"></textarea></div>
                                <div class="col-12"><button class="btn send-btn btn-circle">Send</button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div><!-- Our Agents Section End -->  

<div class="embed-responsive embed-responsive-21by9" style="margin-bottom: 100px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62218.14065095637!2d80.06974882354402!3d12.931242619226241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f73d5041965%3A0xc2b79571e3486e7f!2sChennai%2C%20Tamil%20Nadu%20600045!5e0!3m2!1sen!2sin!4v1704970077714!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
 
@include('includes.footer')
