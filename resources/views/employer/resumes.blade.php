@extends('layouts.frontend.app')
@section('content')

    <!-- Main Content Start -->
    <div class="job-alerts section">
        <div class="container">
            <div class="alerts-inner">
                <div class="row">
                    <!-- Start Main Content -->
                    <div class="col-lg-4 col-12">
                        <div class="dashbord-sidebar">
                            @include('layouts.employer.sidebar')
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
                                        <p>Email</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Type</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Status</p>
                                    </div>
                                </div>
                            </div>
                            @foreach ($applies as $apply)
                                <div class="alerts-content">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-3">
                                            <a href="{{route('front.freelancer.show', $apply->employee_id)}}" target="_blank">
                                                <h3>{{$apply->employee->name ?? ''}}</h3>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <p>{{$apply->employee->email ?? ''}}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>{{$apply->employee->is_freelancer ? 'Freelancer' : 'Individual'}}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>{{$apply->employee->status_title}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
@endsection
