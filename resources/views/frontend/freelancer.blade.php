@extends('layouts.frontend.app')
@section('content')
<!-- Start Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Freelancer Page</h1>
                    <p>Build your career with the chain of your network </p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Freelancer</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<div class="manage-resumes section">
        <div class="container">
            <div class="resume-inner">
                <div class="row">
                    @foreach ($employees as $employee)
                        <div class="col-lg-6 col-12 inner-content">
                            <div class="resume-item">
                                <img src="{{$employee->avatar_path}}" alt="Candidate">
                                <div class="right">
                                    <h3>
                                        <a href="{{route('front.freelancer.show', $employee->id)}}">{{$employee->name}}</a>
                                    </h3>
                                    <span class="deg">{{$employee->detaill->designation ?? ''}}</span>
                                    <ul class="experience">
                                        {{-- <li>Experience: <span>3-5 years</span></li>
                                        <li>Hour Rate: <span>$30</span></li> --}}
                                        <li>Bio: {{$employee->detail->short_bio ?? ''}}</li>
                                        <li>
                                            <i class="lni lni-map-marker"></i>
                                            {{$employee->address ?? ''}}
                                        </li>
                                    </ul>
                                    <ul class="skills">
                                        @foreach ($employee->detail->skill_set ?? [] as $skill)
                                        <li>{{$skill}}</li>
                                        @endforeach
                                    </ul>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Updated on:</strong> {{$employee->updated_at}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination left pagination-md-center">
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
