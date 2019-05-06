@extends('layouts.global')
@section('title'){{$data->title}}@stop
@section('keywords'){{$data->keywords}}@stop
@section('description'){{$data->description}}@stop
@section('markup')
    <meta property="og:url"                content="{{url('/stories/'.$data->slug)}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$data->title}}" />
    <meta property="og:description"        content="{{$data->meta_description}}" />
    <meta property="og:image"              content="{{url('/images/'.$data->img)}}" />
@stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{$data->title}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/stories')}}">Stories</a></li>
                        <li class="active">{{$data->title}}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <section>
        <div id="hotel-details" style="padding-top: 20px;">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        <div class="space-right">

                            <div class="blog-post">
                                <div class="main-img blog-post-img">
                                    <img src="{{url('/images/stories/'.$data->img)}}" class="img-responsive" alt="blog-post-image">
                                </div><!-- end blog-post-img -->
                                <div class="blog-post-detail">
                                    <h2 class="blog-post-title">{{$data->title}}</h2>
                                    {!! $data->content !!}
                                </div><!-- end blog-post-detail -->
                                <div class="clearfix"></div>
                                <div class="blog-post-detail pk-bg">
                                    <b><i class="fa fa-globe"></i> Published - {{$data->created_at->diffforHumans()}}</b>
                                </div>
                            </div><!-- end blog-post -->

                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar" style="padding-top: 0;">
                        <a href="#" data-toggle="modal" data-target="#flightFormEasy" class="btn btn-pink btn-block btn-lg" title="Book Cheap Flight to {{$data->name}}">Book Flight</a>
                        <div class="side-bar-block support-block" style="margin-top: 10px; margin-bottom: 10px;">
                            <h3>Need Help</h3>
                            <p>We would be more than happy to help you. Our team are ready at your service to help you.</p>
                            <div class="support-contact">
                                <span><i class="fa fa-phone"></i></span>
                                <p style="color: #47b200;">{{$phone}}</p>
                            </div><!-- end support-contact -->
                        </div><!-- end side-bar-block -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//airmyanmar.com/stories/{{$data->slug}}" class="btn btn-block btn-pink"> Share on Facebook </a>
                        <br>
                        <a href="{{url('/stories')}}" class="btn btn-block btn-pink">View All Promotions </a>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection