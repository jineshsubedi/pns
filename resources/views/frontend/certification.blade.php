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
    <section class="section latest-news-area blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
                        @foreach ($certification as $cert)
                            <div class="col-lg-6 col-12">
                                <div class="single-news wow fadeInUp" data-wow-delay=".3s">
                                    <div class="image">
                                        <img class="thumb" src="{{$cert->banner_path}}" alt="#">
                                    </div>
                                    <div class="content-body">
                                        <h4 class="title"><a href="{{route('front.certification.show', $cert->id)}}">{{$cert->title}}</a></h4>
                                        <div class="meta-details">
                                            <ul>
                                                <li><a href="#"><i class="lni lni-tag"></i> Certificate</a></li>
                                                <li><a href="#"><i class="lni lni-calendar"></i> {{$cert->created_at}}</a></li>
                                                {{-- <li><a href="#"><i class="lni lni-eye"></i> 55</a></li> --}}
                                            </ul>
                                        </div>
                                        <p>{!! $cert->short_description !!}</p>
                                        <div class="button">
                                            <a href="{{route('front.certification.show', $cert->id)}}" class="btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="pagination center">
                        {{$certification->links()}}
                    </div>
                    <!--/ End Pagination -->
                </div>
                <aside class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar">
                        <div class="widget search-widget">
                            <h5 class="widget-title"><span>Search This Site</span></h5>
                            <form action="#">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <div class="widget popular-feeds">
                            <h5 class="widget-title"><span>Popular Certification</span></h5>
                            <div class="popular-feed-loop">
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <h6 class="post-title"><a href="#">Tips to write an impressive resume online
                                                for
                                                beginner</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 05th Nov 2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <h6 class="post-title"><a href="#">10 most important SEO focus areas for
                                                colleges
                                                and universities</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 24th March 2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <h6 class="post-title"><a href="#">7 things you should never say to your
                                                boss in
                                                your joblife</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 30th Jan 2023</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
@endsection
