@extends('layouts.frontend.app')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Job List</h1>
                    <p>Build your career with the chain of your network </p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/jobs')}}">Jobs</a></li>
                    <li>Job List</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Find Job Area -->
<section class="find-job job-list section">
    <div class="container">
        <div class="single-head">
            <div class="row">
                @forelse ($jobs as $job)
                    <div class="col-lg-6 col-12 single-job">
                        <div class="job-image">
                            <img src="{{$job->image_path}}" alt="#" style="width:100%">
                        </div>
                        <div class="job-content">
                            <h4><a href="{{route('front.job.detail', $job->id)}}">{{$job->title}}</a></h4>
                            <p>{!! $job->short_description !!}</p>
                            <ul>
                                <li><i class="lni lni-website"></i><a href="#"> {{$job->employer->name ?? ''}}</a></li>
                                <li><i class="lni lni-dollar"></i> {{$job->negotiable == 1 ? 'Negotiable': '$'.$job->salary}}</li>
                                <li><i class="lni lni-map-marker"></i> {{$job->employer->address ?? ''}}</li>
                            </ul>
                        </div>
                        <div class="job-button">
                            <ul>
                                <li><a href="{{route('front.job.detail', $job->id)}}">View</a></li>
                                <li><span>full time</span></li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-6 col-12 single-job">
                        No Job Found!
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        {{$jobs->links()}}
                    </div>
                </div>
            </div>
            <!--/ End Pagination -->
        </div>
    </div>
</section>
@endsection
