@extends('layouts.frontend.app')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">About Us</h1>
                    <p>Build your career with the chain of your network </p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start About Area -->
<section class="about-us section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10 col-12">
                <div class="content-left wow fadeInLeft" data-wow-delay=".3s">
                    <div calss="row">
                        <div calss="col-lg-6 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <img class="single-img" src="{{asset('frontend/images/about/small1.jpg')}}" alt="#">
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <img class="single-img mt-50" src="{{asset('frontend/images/about/small2.jpg')}}" alt="#">
                                </div>
                            </div>
                        </div>
                        <div calss="col-lg-6 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <img class="single-img minus-margin" src="{{asset('frontend/images/about/small3.jpg')}}" alt="#">
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <!-- media body start -->
                                    <div class="media-body">
                                        <i class="lni lni-checkmark"></i>
                                        <h6 class="">Professional Networking Site </h6>
                                        <p class="">Build your career with the chain of your network
                                        </p>
                                    </div>
                                    <!-- media body start -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 col-12">
                <!-- content-1 start -->
                <div class="content-right wow fadeInRight" data-wow-delay=".5s">
                    <!-- Heading -->
                    <h2>Help you to get the <br>
                        best job that fits you</h2>
                    <!-- End Heading -->
                    <!-- Single List -->
                    <div class="single-list">
                        <i class="lni lni-grid-alt"></i>
                        <!-- List body start -->
                        <div class="list-bod">
                            <h5>#1 Jobs site </h5>
                            <p>Leverage agile frameworks to provide a
                                robust synopsis for high level overviews. Iterative</p>
                        </div>
                        <!-- List body start -->
                    </div>
                    <!-- End Single List -->
                    <!-- Single List -->
                    <div class="single-list">
                        <i class="lni lni-search"></i>
                        <!-- List body start -->
                        <div class="list-bod">
                            <h5>Seamless searching</h5>
                            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                test.</p>
                        </div>
                        <!-- List body start -->
                    </div>
                    <!-- End Single List -->
                    <!-- Single List -->
                    <div class="single-list">
                        <i class="lni lni-stats-up"></i>
                        <!-- List body start -->
                        <div class="list-bod">
                            <h5>Hired in top companies</h5>
                            <p>Podcasting operational change management inside of workflows to establish.</p>
                        </div>
                        <!-- List body start -->
                    </div>
                    <!-- End Single List -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->

<!-- Start Apply Process Area -->
<section class="apply-process section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="process-item">
                    <i class="lni lni-user"></i>
                    <h4>Register Your Account</h4>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="process-item">
                    <i class="lni lni-book"></i>
                    <h4>Upload Your Resume</h4>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="process-item">
                    <i class="lni lni-briefcase"></i>
                    <h4>Apply for Dream Job</h4>
                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Apply Process Area -->
@endsection
