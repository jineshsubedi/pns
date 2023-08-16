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
                                <h4>Bio</h4>
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
                                                <span class="btn" style="float:right;color:Red;"><a href="{{route('employee.deleteExperience', $exp->id)}}" onclick="return confirm('Are You Sure?')"><i class="lni lni-remove-file"></i></a></span>
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
                                                <span class="btn" style="float:right;color:Red;"><a href="{{route('employee.deleteEducation', $edu->id)}}" onclick="return confirm('Are You Sure?')"><i class="lni lni-remove-file"></i></a></span>
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
                            <form action="{{ route('employee.saveEducation') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="level" class="label">Level*</label>
                                    <input name="level" type="text" class="form-control" placeholder="level"
                                        id="level" required>
                                    @if ($errors->has('level'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('level') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="faculty" class="label">Faculty</label>
                                    <div class="position-relative">
                                        <input type="text" name="faculty" class="form-control" id="faculty"
                                            placeholder="Enter faculty">
                                        @if ($errors->has('faculty'))
                                            <span class="error invalid-feedback">
                                                {{ $errors->first('faculty') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="university" class="label">University*</label>
                                    <div class="position-relative">
                                        <input type="text" name="university" class="form-control" id="university"
                                            placeholder="Enter university" required>
                                        @if ($errors->has('university'))
                                            <span class="error invalid-feedback">
                                                {{ $errors->first('university') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="label">Address</label>
                                    <input name="address" type="text" class="form-control"
                                        id="address">
                                    @if ($errors->has('address'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="start" class="label">From*</label>
                                    <input name="start" type="date" class="form-control"
                                        id="start" required>
                                    @if ($errors->has('start'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('start') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="end" class="label">To</label>
                                    <input name="end" type="date" class="form-control"
                                        id="end">
                                    @if ($errors->has('end'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('end') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-8 button">
                                    <button class="btn ">SAVE
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
                            <form action="{{ route('employee.saveExperience') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="organization" class="label">Organization*</label>
                                    <input name="organization" type="text" class="form-control" placeholder=""
                                        id="organization" required>
                                    @if ($errors->has('organization'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('organization') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="position" class="label">Designation*</label>
                                    <div class="position-relative">
                                        <input type="text" name="position" class="form-control" id="position"
                                            placeholder="Enter position" required>
                                        @if ($errors->has('position'))
                                            <span class="error invalid-feedback">
                                                {{ $errors->first('position') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="label">Address</label>
                                    <input name="address" type="text" class="form-control"
                                        id="address">
                                    @if ($errors->has('address'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="start" class="label">From*</label>
                                    <input name="start" type="date" class="form-control"
                                        id="start" required>
                                    @if ($errors->has('start'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('start') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="end" class="label">To</label>
                                    <input name="end" type="date" class="form-control"
                                        id="end">
                                    @if ($errors->has('end'))
                                        <span class="error invalid-feedback">
                                            {{ $errors->first('end') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-8 button">
                                    <button class="btn ">SAVE
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
