@extends('layouts.global')
@section('title')Myanmar Flights Center, Airmyanmar.com, Flight Destination - {{$data->name}}@stop
@section('keywords')Air Myanmar, Myanmar Flight Center, Cheap Flight to {{$data->name}}, Airline Reservation {{$data->name}}@stop
@section('description')Myanmar Flights Center - Best Flight Deals for {{$data->name}}, Cheap Flight Tickets and Airline Reservation to {{$data->name}}@stop
@section('markup')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{url('/')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "Destination",
            "item": "{{url('/flights/destination/')}}"
          },{
            "@type": "ListItem",
            "position": 3,
            "name": "{{$data->name}}",
            "item": "{{url('/destination/'.$data->slug)}}"
          }]
        }
    </script>
@stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{$data->name}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="{{url('/flights/destinations')}}">Destination</a></li>
                        <li class="active">{{$data->name}} ({{$data->code}})</li>
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

                        <div class="detail-slider">
                            <div class="feature-slider">
                                @foreach(unserialize($data->img) as $img)
                                <div><img src="{{url('/images/'.$img)}}" class="img-responsive" alt="{{$data->name}}"/></div>
                                @endforeach
                            </div><!-- end feature-slider -->

                            <div class="feature-slider-nav">
                                @foreach(unserialize($data->img) as $img)
                                <div><img src="{{url('/images/'.$img)}}" class="img-responsive" alt="{{$data->name}}"/></div>
                                    @endforeach
                            </div><!-- end feature-slider-nav -->
                        </div>  <!-- end detail-slider -->
                        <div class="row" style="margin: 10px;">
                            <br>
                            <h2 title="flight to {{$data->name}}">{{$data->name}} ({{$data->code}})</h2>
                            <hr>
                            {!! $data->description !!}
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
                        <a href="{{$data->airport_link}}" target="_blank" class="btn btn-pink btn-block btn-lg" title="Airport Map for {{$data->name}}">Get Airport Map</a>
                        <hr>
                        <h4 style="text-align: center;">Airport Cities</h4>
                        <hr>
                        @foreach($cities as $city)
                        <div class="col-xs-6"><a href="{{url('/destination/'.$city->slug)}}" @if($data->id == $city->id) class="btn btn-pink btn-xs" @else class="btn btn-green btn-xs" @endif style="border-radius: 15px; margin: 5px; font-size: small; text-decoration: none; text-transform: none;">{{$city->name}}</a></div>
                            @endforeach
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection