@extends('layouts.frontend.app')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Job Details</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/jobs')}}">jobs</a></li>
                    <li>Job Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Job Details -->
<div class="job-details section">
    <div class="container">
        <div class="row mb-n5">
            <!-- Job List Details Start -->
            <div class="col-lg-8 col-12">
                <div class="job-details-inner">
                    <div class="job-details-head row mx-0">
                        <div class="company-logo col-auto">
                            <a href="#" style="border-radius: 4px; overflow: hidden;">
                                <img src="{{$job->employer->logo_path}}"
                                    alt="{{$job->employer->name}}">
                                </a>
                        </div>
                        <div class="salary-type col-auto order-sm-3">
                            <span class="salary-range">{{$job->negotiable == 1 ? 'Negotiable' : $job->salary}}</span>
                            <span class="badge badge-success">{{$job->type}}</span>
                        </div>
                        <div class="content col">
                            <h5 class="title">{{ucwords($job->title)}}</h5>
                            <ul class="meta">
                                <li><strong class="text-primary">{{$job->employer->name}}</strong>
                                </li>
                                <li><i class="lni lni-map-marker"></i> {{$job->employer->address ?? ''}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="job-details-body">
                        <h6 class="mb-3">Job Description</h6>
                        <p>{!! $job->description !!}</p>
                        <h6 class="mb-3 mt-4">Specification</h6>
                        {!! $job->specification !!}
                    </div>
                </div>
            </div>
            <!-- Job List Details End -->
            <!-- Job Sidebar Wrap Start -->
            <div class="col-lg-4 col-12">
                <div class="job-details-sidebar">
                    <!-- Sidebar (Apply Buttons) Start -->
                    <div class="sidebar-widget">
                        <div class="inner">
                            <div class="row m-n2 button">
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                                    <a href="bookmarked.html" class="d-block btn"><i class="fa fa-heart-o mr-1"></i> Save Job</a>
                                </div>
                                <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                                    <a href="{{route('front.job.detail', $job->id)}}" class="d-block btn btn-alt">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar (Apply Buttons) End -->
                    <!-- Sidebar (Job Overview) Start -->
                    <div class="sidebar-widget">
                        <div class="inner">
                            <h6 class="title">Job Overview</h6>
                            <ul class="job-overview list-unstyled">
                                <li><strong>Published on:</strong> {{$job->start_date}}</li>
                                <li><strong>Vacancy:</strong> {{$job->position}}</li>
                                <li><strong>Employment Status:</strong> {{$job->type}}</li>
                                {{-- <li><strong>Experience:</strong> 2 to 3 year(s)</li> --}}
                                <li><strong>Job Location:</strong> {{$job->employer->address ?? ''}}</li>
                                <li><strong>Salary:</strong>{{$job->negotiable == 1 ? 'Negotiable' : $job->salary}}</li>
                                {{-- <li><strong>Gender:</strong> Any</li> --}}
                                <li><strong>Application Deadline:</strong> {{$job->end_date}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Job Sidebar Wrap End -->

        </div>
    </div>
</div>
<!-- End Job Details -->
@endsection
