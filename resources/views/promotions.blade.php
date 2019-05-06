@extends('layouts.global')
@section('title')Myanmar Flight Center, Airmyanmar.com - Seasonal Promotions @stop
@section('keywords')Myanmar Flight Center, Airmyanmar.com, Flight Promotion for Myanmar @stop
@section('description')Myanmar Flight Center, Airmyanmar.com - Flight Booking Promotion, Coupon Codes @stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Promotions</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Promotions</li>
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
                        @foreach($data as $item)
                            <div class="col-md-6 col-sm-6" >
                            <div class="card-block" style="margin-top: 0; margin-bottom: 10px;">
                                <h3 class="card-expiry">{{$item->title}}</h3>
                                <div class="card-name">
                                    <img src="{{url('/images/'.$item->img)}}" class="img-responsive">
                                </div><!-- end card-name -->
                                @if($item->status == 1)
                                <div class="primary-tag">
                                    <h4>Active</h4>
                                </div><!-- end primary-tag -->
                                @else
                                    <div class="primary-tag" style="background: #ff0003;">
                                        <h4>Expired</h4>
                                    </div><!-- end primary-tag -->
                                @endif

                                <ul class="list-unstyled list-inline">
                                    <li class="card-img"><a href="{{url('/flights/seasonal-promotions/'.$item->slug)}}" class="btn btn-orange">Open</a></li>
                                    <li class="card-links"></li>
                                </ul>
                            </div>
                            </div>
                        @endforeach
                            <div class="col-md-12">
                                <div class="clearfix"></div>
                                <div class="row">
                                    {{$data->links()}}
                                </div>
                            </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar" style="padding-top: 0;">
                        <a href="#" data-toggle="modal" data-target="#flightFormEasy" class="btn btn-pink btn-block btn-lg" title="Book Cheap Flight to Myanmar">Book Flight</a>
                        <div class="side-bar-block support-block" style="margin-top: 10px; margin-bottom: 10px;">
                            <h3>Need Help</h3>
                            <p>We would be more than happy to help you. Our team are ready at your service to help you.</p>
                            <div class="support-contact">
                                <span><i class="fa fa-phone"></i></span>
                                <p style="color: #47b200;">{{$phone}}</p>
                            </div><!-- end support-contact -->
                        </div><!-- end side-bar-block -->
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection