@extends('layouts.frontend.app')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Contact Us</h1>
                    <p>Business plan draws on a wide range of knowledge from different business<br> disciplines.
                        Business draws on a wide range of different business .</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <div class="form-main">
                        <form class="form" method="post" action="https://demo.graygrids.com/themes/Joblink/assets/mail/mail.php">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="name" type="text" placeholder="Your Name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="subject" type="text" placeholder="Your Subject"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="email" type="email" placeholder="Your Email"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="phone" type="text" placeholder="Your Phone"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Submit Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="single-head">
                        <div class="contant-inner-title">
                            <h4>Contact Information</h4>
                            <p>Business consulting excepteur sint occaecat cupidatat consulting non proident.</p>
                        </div>
                        <div class="single-info">
                            <i class="lni lni-phone"></i>
                            <ul>
                                <li>+522 672-452-1120</li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="lni lni-envelope"></i>
                            <ul>
                                <li><a href="mailto:info@yourwebsite.com">example@yourwebsite.com</a></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="lni lni-map"></i>
                            <ul>
                                <li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
                            </ul>
                        </div>
                        <div class="contact-social">
                            <h5>Follow Us on</h5>
                            <ul>
                                <li><a href="#"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Google-map Area -->
    <div class="map-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-container">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                    href="https://123movies-to.com/">123movies old site</a>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 400px;
                                        width: 100%;
                                    }

                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 400px;
                                        width: 100%;
                                    }
                                </style><a href="https://maps-google.github.io/embed-google-map/">embed google
                                    map</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google-map Area -->
</section>
<!--/ End Contact Area -->
@endsection
