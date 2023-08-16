@extends('layouts.frontend.app')
@section('content')

    <!-- Main Content Start -->
    <div class="resume section">
        <div class="container">
            <div class="resume-inner">
                <div class="row">
                    <!-- Start Main Content -->
                    <div class="col-lg-4 col-12">
                        <div class="dashbord-sidebar">
                            @include('layouts.employee.sidebar')
                        </div>
                    </div>
                    <!-- End Main Content -->
                    <div class="col-lg-8 col-12">
                        <div class="inner-content">
                            <!-- Start Personal Top Content -->
                            <div class="personal-top-content">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12">
                                        <div class="name-head">
                                            <a class="mb-2" href="#"><img class="circle-54"
                                                    src="assets/images/resume/avater.png" alt=""></a>
                                            <h4><a class="name" href="#">{{$me->name}}</a></h4>
                                            <p><a class="deg" href="#">{{$me->detail->designation ?? ''}}</a></p>
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
                                                <p>{{$me->address ?? ''}}</p>
                                            </div>
                                            <!-- Single List -->
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">E-mail</h5>
                                                <p>{{$me->email ?? ''}}</p>
                                            </div>
                                            <!-- Single List -->
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">Phone</h5>
                                                <p>{{$me->phone ?? ''}}</p>
                                            </div>
                                            <!-- Single List -->
                                            <!-- Single List -->
                                            <div class="single-list">
                                                <h5 class="title">Marital Status</h5>
                                                <p><a href="#">{{$me->detail->marital_status ?? ''}}</a></p>
                                            </div>
                                            <!-- Single List -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Personal Top Content -->
                            <!-- Start Single Section -->
                            <div class="single-section">
                                <h4>About</h4>
                                <p class="font-size-4 mb-8">{!! $me->detail->bio ?? '' !!}</p>
                            </div>
                            <!-- End Single Section -->
                            <!-- Start Single Section -->
                            <div class="single-section skill">
                                <h4>Skills</h4>
                                <ul class="list-unstyled d-flex align-items-center flex-wrap">
                                    @foreach ($skills as $skill)
                                    <li>
                                        <a >{{$skill}}</a>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Section -->
                            <!-- Start Single Section -->
                            <div class="single-section exprerience">
                                <span class="btn" style="float:right;" data-toggle="modal" data-target="#experience-modal"><i class="lni lni-pencil"></i></span>
                                <h4>Work Exprerience</h4>
                                @foreach ($me->experience ?? [] as $exp)
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
                                <span class="btn" style="float:right;" data-toggle="modal" data-target="#education-modal"><i class="lni lni-pencil"></i></span>
                                <h4>Education</h4>
                                @foreach ($me->education as $edu)
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
    <!-- Main Content end -->
    <div class="modal fade form-modal" id="education-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog max-width-px-840 position-relative">
            <button type="button"
                class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
                data-dismiss="modal"><i class="lni lni-close"></i></button>
            <div class="login-modal-main">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="row">
                            <div class="heading">
                                <h3>Education Form</h3>
                                {{-- <p>Log in to continue your account and explore new jobs.</p> --}}
                            </div>
                            <form action="{{ route('v_login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="label">E-mail</label>
                                    <input name="email" type="email" class="form-control" placeholder="example@gmail.com"
                                        id="email" required>
                                    @if ($errors->has('email'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password" class="label">Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter password" required>
                                        @if ($errors->has('password'))
                                            <span class="error invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between">
                                    <!-- Default checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Remember password</label>
                                    </div>
                                    <a href="#" class="font-size-3 text-dodger line-height-reset">Forget Password</a>
                                </div>
                                <div class="form-group mb-8 button">
                                    <button class="btn ">Log in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade form-modal" id="experience-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog max-width-px-840 position-relative">
            <button type="button"
                class="circle-32 btn-reset bg-white pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper"
                data-dismiss="modal"><i class="lni lni-close"></i></button>
            <div class="login-modal-main">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="row">
                            <div class="heading">
                                <h3>Experience Form</h3>
                                {{-- <p>Log in to continue your account and explore new jobs.</p> --}}
                            </div>
                            <form action="{{ route('v_login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="label">E-mail</label>
                                    <input name="email" type="email" class="form-control" placeholder="example@gmail.com"
                                        id="email" required>
                                    @if ($errors->has('email'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password" class="label">Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter password" required>
                                        @if ($errors->has('password'))
                                            <span class="error invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between">
                                    <!-- Default checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Remember password</label>
                                    </div>
                                    <a href="#" class="font-size-3 text-dodger line-height-reset">Forget Password</a>
                                </div>
                                <div class="form-group mb-8 button">
                                    <button class="btn ">Log in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
