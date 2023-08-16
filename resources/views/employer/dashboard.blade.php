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
                                        <p>Title</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Contract Type</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Deadline</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Status</p>
                                    </div>
                                </div>
                            </div>
                            @foreach ($myjobs as $job)
                                <div class="alerts-content">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-3">
                                            <h3><a href="{{route('front.job.detail', $job->vacancy_id)}}" target="_blank">{{$job->vacancy->title ?? ''}}</a></h3>
                                        </div>
                                        <div class="col-md-3">
                                            <p><span class="full-time">{{$job->vacancy->type ?? ''}}</span></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>{{$job->vacancy->end_date}}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>{{$job->status}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="pagination left pagination-md-center">
                            {{$myjobs->links()}}
                        </div>
                        <!-- End Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
@endsection
