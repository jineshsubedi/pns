@extends('layouts.frontend.app')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Certification</h1>
                        <p>Build your career with the chain of your network </p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Certification</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-12">
                    <div class="single-inner">
                        <div class="post-thumbnils">
                            <img src="{{$certification->banner_path}}" alt="#" style="width:100%">
                        </div>
                        <div class="post-details">
                            <div class="detail-inner">
                                <h2 class="post-title">
                                    <a href="{{route('front.certification.show', $certification->id)}}">{{$certification->title}}</a>
                                </h2>
                                <!-- post meta -->
                                <ul class="custom-flex post-meta">
                                    <li>
                                        <a href="#">
                                            <i class="lni lni-calendar"></i>
                                            {{$certification->created_at}}
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">
                                            <i class="lni lni-comments"></i>
                                            35 Comments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="lni lni-eye"></i>
                                            55 View
                                        </a>
                                    </li> --}}
                                </ul>
                                <p>{!! $certification->description !!}</p>
                                <!-- post image -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
@endsection
