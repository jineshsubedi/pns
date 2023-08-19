@extends('layouts.frontend.app')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{$employee->name}} Resume</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Resume</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<div class="resume section">
        <div class="container">
            <div class="resume-inner">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="inner-content">
                            <!-- Start Personal Top Content -->
                            <div class="personal-top-content">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12">
                                        <div class="name-head">
                                            <a class="mb-2" href="#"><img class="circle-54"
                                                    src="{{$employee->avatar_path}}" alt=""></a>
                                            <h4><a class="name" href="#">{{$employee->name}}</a></h4>
                                            <p><a class="deg" href="#">{{$employee->detail->designation ?? ''}}</a></p>
                                            <ul class="social">
                                                <li><a href="#"><i class="lni lni-facebook-original"></i></a></li>
                                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                                <li><a href="#"><i class="lni lni-dribbble"></i></a></li>
                                                <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12">
                                        <div class="content-right">
                                            <h5 class="title-main">Contact Info</h5>
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">Location</h5>
                                                <p>{{$employee->address ?? ''}}</p>
                                            </div>
                                            <!-- Single List -->
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">E-mail</h5>
                                                <p>{{$employee->email ?? ''}}</p>
                                            </div>
                                            <!-- Single List -->
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">Phone</h5>
                                                <p>{{$employee->phone ?? ''}}</p>
                                            </div>
                                            <!-- Single List -->
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">Marital Status</h5>
                                                <p><a href="#">{{$employee->detail->marital_status ?? ''}}</a></p>
                                            </div>
                                            <!-- Single List -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Personal Top Content -->
                            <!-- Start Single Section -->
                            <div class="single-section">
                                <h4>Bio</h4>
                                <p class="font-size-4 mb-8">{!! $employee->detail->bio ?? '' !!}</p>
                            </div>
                            <!-- End Single Section -->
                            <!-- Start Single Section -->
                            <div class="single-section skill">
                                <h4>Skills</h4>
                                <ul class="list-unstyled d-flex align-items-center flex-wrap">
                                    @foreach ($employee->detail->skill_set as $skill)
                                    <li>
                                        <a >{{$skill}}</a>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Section -->
                            <!-- Start Single Section -->
                            <div class="single-section exprerience">
                                <h4>Work Exprerience</h4>
                                @foreach ($employee->experience ?? [] as $exp)
                                    <div class="single-exp mb-30">
                                        <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                                            <div class="w-100 mt-n2">
                                                <h3 class="mb-0">

                                                    <a>{{$exp->position}}</a>
                                                </h3>
                                                <a>{{$exp->organization}}</a>
                                                <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                                                    <a>{{$exp->start}} - {{$exp->end}}</a>
                                                    <a class="font-size-3 text-gray">
                                                        <span class="mr-2" style="margin-top: -2px"><i
                                                                class="lni lni-map-marker"></i></span>{{$exp->address}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Single Section -->
                            <!-- Start Single Section -->
                            <div class="single-section education">
                                <h4>Education</h4>
                                @foreach ($employee->education as $edu)
                                    <div class="single-edu mb-30">
                                        <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                                            <div class="w-100 mt-n2">
                                                <h3 class="mb-0">
                                                    <a>{{$edu->level}}</a>
                                                </h3>
                                                <a>{{$edu->university}}</a>
                                                <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                                                    <a>{{$edu->start}} - {{$edu->end}}</a>
                                                    <a class="font-size-3 text-gray">
                                                        <span class="mr-2" style="margin-top: -2px"><i
                                                                class="lni lni-map-marker"></i></span>{{$edu->address}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Single Section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
