@extends('layouts.frontend.app')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Job Alerts</h1>
                        <p>Business plan draws on a wide range of knowledge from different business<br> disciplines.
                            {{-- Business draws on a wide range of different business .</p> --}}
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Job Alert</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Main Content Start -->
    <div class="job-alerts section">
        <div class="container">
            <div class="alerts-inner">
                <div class="row">
                    <!-- Start Main Content -->
                    <div class="col-lg-4 col-12">
                        <div class="dashbord-sidebar">
                            <ul>
                                <li class="heading">Manage Account</li>
                                <li><a href="resume.html"><i class="lni lni-clipboard"></i> My Resume</a></li>
                                <li><a href="bookmarked.html"><i class="lni lni-bookmark"></i> Bookmarked Jobs</a></li>
                                <li><a href="notifications.html"><i class="lni lni-alarm"></i> Notifications <span
                                            class="notifi">5</span></a></li>
                                <li><a href="manage-applications.html"><i class="lni lni-envelope"></i> Manage
                                        Applications</a></li>
                                <li><a href="manage-resumes.html"><i class="lni lni-files"></i> Manage Resumes</a></li>
                                <li><a class="active" href="job-alerts.html"><i class="lni lni-briefcase"></i> Job
                                        Alerts</a></li>
                                <li><a href="change-password.html"><i class="lni lni-lock"></i> Change Password</a></li>
                                <li><a href="index.html"><i class="lni lni-upload"></i> Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Main Content -->
                    <div class="col-lg-8 col-12">
                        <div class="job-alerts-items">
                            <div class="alerts-list">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Name</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Keywords</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Contract Type</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Frequency</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alerts-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-3">
                                        <h3>Web Designer</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Web Designer</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><span class="full-time">Full-Time</span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Daily</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alerts-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-3">
                                        <h3>UI/UX designer</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p>UI/UX designer</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><span class="full-time">Full-Time</span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Daily</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alerts-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-3">
                                        <h3>Developer</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Developer</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><span class="part-time">Part-Time</span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Daily</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alerts-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-3">
                                        <h3>Senior UX Designer</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Senior UX Designer</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><span class="full-time">Full-Time</span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Daily</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alerts-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-3">
                                        <h3>Graphics Design</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Graphics Design</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><span class="full-time">Part-Time</span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Daily</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alerts-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-3">
                                        <h3>Sales Manager</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Sales Manager</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><span class="full-time">Full-Time</span></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Daily</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="pagination left pagination-md-center">
                            <ul class="pagination-list">
                                <li><a href="#"><i class="lni lni-arrow-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="lni lni-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
@endsection
