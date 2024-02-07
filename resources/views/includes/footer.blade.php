<footer class="footer-section section ">

<div class="footer-top footer-bg pt-70 pt-md-50 pt-sm-30 pt-xs-20 pb-100 pb-md-90 pb-sm-70 pb-xs-60">
    <div class="container">
        
        <div class="row">
            <div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
                <!-- Footer-widget Start -->
                <div class="footer-widget">
                    <div class="footer-title">
                        <h3>About</h3>
                    </div>
                    <div class="footer-info">
                        <p>Emphasize your commitment to providing personalized services tailored to each
                            client's unique needs.</p>
                        <div class="newsletter-box">

                            <form id="mc-form" class="mc-form footer-newsletter">
                                <div class="header-buttons" style="margin-right: 100px;">
                                    <a class="header-btn btn" href="{{ url('/contact') }}" >Contact Us</a>
            
                                </div>
                            </form>
                        </div>
                        <div class="" style="position: fixed; left: 0px; bottom: 7%; z-index: 999;">
                            <div class="text-center">
                                <div style="display: flex; flex-direction: column;  ">
                                    <a href="whatsapp://send?phone=7845158684" target="_blank"  >
                                    <img src="{{ asset('public/images/w1-removebg-preview.png') }}" alt="Image Not Found" style="height: 60px; width: 60px;">

                                    </a>
                                   
                                    <a href="tel:7845158684" >
                                    <img src="{{ asset('public/images/w2-removebg-preview.png') }}" alt="Image Not Found" style="height: 45px; width: 45px;">

                                    </a>
                                </div>
                                
                            </div>
                          </div>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div><!-- Footer-widget End -->
            </div>
            <div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
                <!-- Footer-widget Start -->
                <div class="footer-widget">
                    <div class="footer-title">
                        <h3>Popular Location</h3>
                    </div>
                    <div class="footer-info">
                        <div class="single-list">
                           <ul>
                            <li style="color: aliceblue;">Tambaram</li>
                            <li style="color: aliceblue;">Velachery</li>
                            <li style="color: aliceblue;">T.Nagar</li>
                            <li style="color: aliceblue;">Guindy</li>
                           </ul>
                        </div>
                       
                    </div>
                </div><!-- Footer-widget End -->
            </div>
            <div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
                <!-- Footer-widget Start -->
                <div class="footer-widget">
                    <div class="footer-title">
                        <h3>Quick Link</h3>
                    </div>
                    <div class="footer-info">
                        <ul class="footer-list">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/contact') }}">location</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>

                        </ul>
                    </div>
                </div><!-- Footer-widget End -->
            </div>
            <div class="col-coustom-3 col-md-6 col-lg-3 col-12 mt-40">
                <!-- Footer-widget Start -->
                <div class="footer-widget">
                    <div class="footer-title">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="footer-info">
                        <ul class="footer-list">
                            <li>
                                <div class="contact-text">
                                    <i class="glyph-icon flaticon-placeholder"></i>
                                    <p>No.7/3,School Street <br>Irumbuliyur,West Tambaram<br>Chennai-600045</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-text">
                                    <i class="glyph-icon flaticon-call"></i>
                                    <p>
                                        <span>Call Us : <a href="tel:1234566789">+91 8148277828</a></span>
                                        <span>Call Us : <a href="tel:1234566789">+91 8148277828</a></span>
                                    </p>

                                </div>
                            </li>
                            <li>
                                <div class="contact-text">
                                    <i class="glyph-icon flaticon-earth"></i>
                                    <p>
                                       
                                        <span>Email : <a
                                                href="mailto:info@example.com">admin@rkhousing.in</a></span>
                                        <span>Web : <a href="https://hasthemes.com/">www.rkhousing.in</a></span>
                                    </p>
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- Footer-widget End -->
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; RK Housing. <a href="https://hasthemes.com/">All rights reserved.</a> </p>
            </div>
        </div>
    </div>
</div>


</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">    <!-- Map js code here -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('public/js/plugins.js') }}"></script>
    <!-- Map Active JS -->
    <script src="{{ asset('public/js/maplace-active.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <!-- <script src="{{ asset('js/script.js') }}"></script> -->


</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Then include your other scripts -->
<script>
    $(document).ready(function() {
        // Check if logo image URL is in local storage
        var storedLogoImage = localStorage.getItem('logoImage');

        if (storedLogoImage) {
            // Use the stored image URL
            $('#logo-img').attr('src', storedLogoImage);
        }

        // Function to fetch and update the logo image URL
        function fetchAndUpdateLogo() {
            $.ajax({
                url: '/header', // Your route URL
                type: 'GET',
                success: function(response) {
                    if (response.image) {
                        // Update the logo on the page
                        $('#logo-img').attr('src', response.image);

                        // Store the updated image URL in local storage
                        localStorage.setItem('logoImage', response.image);
                    } else {
                        console.error('No image found');
                    }
                },
                error: function(error) {
                    console.error('Error fetching logo:', error.responseText);
                }
            });
        }

        // Fetch and update the logo every 1 hour (you can adjust this interval)
        setInterval(fetchAndUpdateLogo, 3600000); // 1 hour in milliseconds
    });
</script>
<!-- Add this script at the end of your HTML body -->

<script>
    $(document).ready(function() {
        // Display the preloader
        $('#preloader').show();

        // Wait for the page to fully load
        $(window).on('load', function() {
            // Hide the preloader
            $('#preloader').fadeOut('slow');
        });
    });
</script>







</html>