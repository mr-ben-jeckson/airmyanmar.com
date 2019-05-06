@extends('layouts.global')
@section('title')Myanmar Flights Center: Airmyanmar.com - {{$data->title}}@stop
@section('keywords'){{$data->keywords}}@stop
@section('description'){{$data->description}}@stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{$data->title}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">{{$data->title}}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>
        <div id="hotel-details" style="padding-top: 20px;">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        @if($data->img)
                        <div class="detail-slider">
                            <div class="feature-slider">
                                @foreach(unserialize($data->img) as $img)
                                <div><img src="{{url('/images/pages/'.$img)}}" style="height: 675px;" class="img-responsive" alt="{{$data->slug}}"/></div>
                                @endforeach
                            </div><!-- end feature-slider -->

                            <div class="feature-slider-nav">
                                @foreach(unserialize($data->img) as $img)
                                <div><img src="{{url('/images/pages/'.$img)}}" style="height: 130px;" class="img-responsive" alt="{{$data->slug}}"/></div>
                                    @endforeach
                            </div><!-- end feature-slider-nav -->
                        </div>  <!-- end detail-slider -->
                        @endif
                        <div class="row" style="margin: 10px;">
                            <br>
                            <h2 title="{{$data->title}}">{{$data->title}}</h2>
                            <hr>
                            {!! $data->content !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar" style="padding-top: 0;">
                        <a href="#" data-toggle="modal" data-target="#flightFormEasy" class="btn btn-pink btn-block btn-lg" title="Book Cheap Flights">Book Flight</a>
                        <div class="side-bar-block support-block" style="margin-top: 10px; margin-bottom: 10px;">
                            <h3>Need Help</h3>
                            <p>We would be more than happy to help you. Our team are ready at your service to help you.</p>
                            <div class="support-contact">
                                <span><i class="fa fa-phone"></i> {{$phone}}</span>
                                <p style="color: #47b200;"></p>
                            </div><!-- end support-contact -->
                        </div><!-- end side-bar-block -->

                        <hr>
                        <h4 style="text-align: center;">Destinations</h4>
                        <hr>
                        @foreach($destinations as $item)
                            <a href="{{url('/destination/'.$item->slug)}}">
                        <div class="img-thumbnail">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <img src="{{url('/images/'.unserialize($item->img)[1])}}" class="img-responsive" title="{{$item->name}}" alt="{{$item->name}}">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <b>{{$item->name}}</b><br>
                                <small>{{$item->code}}</small>
                            </div>
                        </div>
                            </a>
                            <div class="clearfix"></div>
                        @endforeach
                        <hr>
                        <a href="{{url('/flights/destinations')}}" class="btn btn-pink btn-block btn-lg" title="Book Cheap Flights">Show More</a>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection