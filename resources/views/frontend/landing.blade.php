@extends('layouts.frontend.app')
@section('content')
<style>
    .find-job .single-job .job-image {
position: absolute;
left: 20px;
top: 50%;
height: 100px;
width: 100px;
line-height: 50px;
margin-top: -25px;
}
</style>
    <!-- Start Hero Area -->
    <section class="hero-area style4">
        <!-- Single Slider -->
        <div class="hero-inner">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-10 offset-lg-1 co-12">
                        <div class="inner-content">
                            <div class="hero-text">
                                <h1 >Professional Networking Site </h1>
                                <p >Build your career with the chain of your network </p>
                                <div class="button wow fadeInUp" data-wow-delay=".7s">
                                    <a href="javacript:" data-toggle="modal" data-target="#login" class="btn">Post a Job</a>
                                    <a href="{{url('/jobs')}}" class="btn btn-alt">See Our Jobs</a>
                                </div>
                                <br>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--/ End Hero Area -->

    <!-- Start Apply Process Area -->
    <section class="apply-process style4 section" style="padding-top: 100px; background-color: #081828;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="process-item">
                        <i class="lni lni-user"></i>
                        <h4>Register</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="process-item">
                        <i class="lni lni-book"></i>
                        <h4>Upload Profile</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="process-item">
                        <i class="lni lni-briefcase"></i>
                        <h4>Apply</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Apply Process Area -->

    @if(count($categories) > 0)
    <!-- Start Job Category Area -->
    <section class="job-category style2 section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow fadeInDown" data-wow-delay=".2s">Job Category</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse by Catagories</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="cat-head">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-6 col-12">
                            <a href="#" class="single-cat wow fadeInUp" data-wow-delay=".2s">
                                <div class="bottom-side">
                                    <h3>{{$category->title}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /End Job Category Area -->
    @endif

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

    <!-- Start Find Job Area -->
    <section class="find-job section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow fadeInDown" data-wow-delay=".2s">Hot Jobs</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse Recent Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    @forelse ($jobs as $job)
                        <!-- Single Job -->
                        <div class="col-md-6 single-job wow fadeInUp" data-wow-delay=".3s">
                            <div class="job-image">
                                @if ($job->employer->logo_thumb)
                                    <img src="{{$job->employer->logo_thumb}}" alt="#">
                                @else
                                    <img src="{{config('app.settings.logo_path')}}" alt="#">
                                @endif
                            </div>
                            <div class="job-content">
                                <h4><a href="job-details.html">{{$job->title}}</a></h4>
                                <p>{{$job->short_description}}</p>
                                <ul>
                                    <li><i class="lni lni-website"></i><a href="#"> {{$job->category->title ?? ''}}</a></li>
                                    <li><i class="lni lni-dollar"></i> {{$job->negotiable == 1 ? 'Negotiable' : $job->salary}}</li>
                                    <li><i class="lni lni-map-marker"></i> {{$job->employer->name ?? ''}}</li>
                                    <li><i class="lni lni-map-marker"></i> {{$job->employer->address ?? ''}}</li>
                                </ul>
                            </div>
                            <div class="job-button">
                                <ul>
                                    <li><a href="{{route('front.job.detail', $job->id)}}">Apply</a></li>
                                    <li><span>{{$job->type}}</span></li>
                                </ul>
                            </div>
                        </div>
                    @empty
                    <div class="single-job wow fadeInUp" data-wow-delay=".3s">
                        <div class="job-image">
                            @if(config('app.settings.logo') != null)
                            <img class="logo1" src="{{config('app.settings.logo_path')}}" alt="Logo" />
                            @else
                            {{config('app.settings.name')}}
                            @endif
                        </div>
                        <div class="job-content">
                            <h4><a href="job-details.html">Job Not Found!</a></h4>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- /End Find Job Area -->

    <!-- Start Call Action Area -->
    <section class="call-action overlay section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="section-title">
                            <span class="wow fadeInDown" data-wow-delay=".2s">GETTING STARTED TO WORK</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Build your career with the chain of your network</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s"> Don’t just find. Be found. Put your
                                CV in front of great employers</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                @if(auth()->guard('employee')->check())
                                    <a href="{{route('employee.dashboard')}}" class="btn"><i class="lni lni-upload"></i> Upload Your Resume</a>
                                @else
                                    <a href="javacript:" data-toggle="modal" data-target="#login" class="btn"><i class="lni lni-upload"></i> Employee Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Call Action Area -->
@endsection


