@extends('layouts.global')
@section('title', 'Myanmar Flights Center, Airmyanmar.com : Booking')
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Booking ID : {{$data->booking_id}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Track Booking</a></li>
                        <li class="active">Result</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>

    <div class="container-fluid">
        <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="col-md-4">
        <div class="row passenger-detail-badge-2">
            Booking Detail
        </div>
        <div class="row booking-text-2">
            <div class="col-xs-6"><i class="fa fa-info-circle"></i> Status</div>
            <div class="col-xs-6">
                @if($data->status == 1)<span class="fa fa-bell waiting-list-icon"></span>
                @elseif($data->status == 2)<span class="fa fa-bell payment-list-icon"></span>
                @elseif($data->status == 3)<span class="fa fa-bell complete-list-icon"></span>
                @elseif($data->status == 4)<span class="fa fa-bell final-list-icon"></span>
                @elseif($data->status == 5) <span class="fa fa-bell unavailable-list-icon"></span>
                @elseif($data->status == 6) <span class="fa fa-bell cancel-list-icon"></span>
                @endif
            </div>
            <div class="col-xs-6"><i class="fa fa-calendar"></i> Booking Date</div>
            <div class="col-xs-6">{{$data->booking_date}}</div>
            <div class="col-xs-6"><i class="fa fa-user"></i> Username</div>
            <div class="col-xs-6">{{$data->customer}}</div>
            <div class="col-xs-6"><i class="fa fa-plane"></i> AIRLINE PNR</div>
            <div class="col-xs-6">@if($data->pnr) {{$data->pnr}} @else - - - - @endif</div>
            @if($data->status == 5)
             <div class="col-xs-6"><i class="fa fa-plane"></i> OPTION FLIGHT</div>
            <div class="col-xs-6">@if($data->option) <a href="{{$data->option}}" target="_blank">Click Now</a> @else - - - - @endif</div>
            @endif
            <div class="col-xs-6"><i class="fa fa-user"></i> Passenger</div>
            <div class="col-xs-6">{{(unserialize($data->pax)['adult'])+(unserialize($data->pax)['child'])+(unserialize($data->pax)['infant'])}} @if(unserialize($data->pax)['child'] > 0) ({{unserialize($data->pax)['child']}} Child) @endif @if(unserialize($data->pax)['infant'] > 0) ({{unserialize($data->pax)['infant']}} Infant) @endif </div>
            <div class="col-xs-6"><i class="fa fa-plane"></i> Route</div>
            <div class="col-xs-6">
                @if($data->route == "oneway") One Way @else Round Trip @endif
            </div>
            <div class="col-xs-6"><i class="fa fa-credit-card"></i> Pay Option</div>
            <div class="col-xs-6">@if($data->pay_opt == 1) 2C2P (USD) @elseif($data->pay_opt == 2) 2C2P (MMK) @else Local Mobile Banking @endif</div>
        </div>
            <div class="row passenger-detail-badge-2">
                Fare Detail
            </div>
            <div class="row fare-box" style="padding-bottom: 0;">
                @if(!count($data->coupon_code) == 0)
                    <div class="col-xs-12"><span class="fare-box-text-fix pull-left">Used Promo</span> <span class="fare-box-text-fix pull-right">{{$data->coupon_code}}</span></div>
                    <div class="col-xs-12"><span class="fare-box-text-fix pull-left">Total Fare</span> <span class="fare-box-text pull-right">{{$data->currency}} {{$data->total+$data->discount_off}}</span></div>
                @else
                    <div class="col-xs-12"><span class="fare-box-text-fix pull-left">Total Fare</span> <span class="fare-box-text pull-right">{{$data->currency}} {{$data->total}}</span></div>
                @endif
                @if(!count($data->coupon_code) == 0)
                    <div class="col-xs-12"><span class="fare-box-text-fix pull-left">Discount Off</span> <span class="fare-red-text pull-right">{{$data->currency}} {{$data->discount_off}}</span></div>
                    <div class="col-xs-12"><span class="fare-box-text-fix pull-left">New Total Fare</span> <span class="fare-red-text pull-right">{{$data->currency}} {{$data->total}}</span></div>
                @endif
                <div class="col-xs-12"><span class="fare-box-text-fix pull-left">Transaction Fee & Tax</span> <span class="fare-box-text pull-right">{{$data->currency}} {{$data->total*0.05}}</span></div>
                <div class="col-xs-12"><span class="fare-box-text-fix pull-left">Grand Total</span> <span class="fare-box-text pull-right">{{$data->currency}} {{$data->grand_amount}}</span></div>
                <div class="col-xs-12 pk-bg" style="margin-bottom: 0;">
                    @if($data->status == 1)
                        <button type="submit" class="btn btn-orange btn-block" disabled>Pay Now</button>
                        <br>
                        You couldn't pay for booking while your booking is being in processing list.
                    @elseif($data->status == 2)
                        <a href="{{url('/booking/payment/checkout/'.$data->booking_id)}}" class="btn btn-orange btn-block"> Pay Now </a>
                        <br>
                        Now, our sale team is requesting payment for your booking. Please click above button to pay and download E-confirmation letter. Booking will be automatically cancelled at the out of deadline.
                    @elseif($data->status == 3)
                        <a href="{{url('/booking/download/e-confirmation/'.$data->booking_id)}}" class="btn btn-orange btn-block"> Download  </a>
                        <br>
                        Please click above button to download confirmation. Ticket will be sent and download again before you flight. E-confirmation provides airline PNR that you could take a seat even if you won't be show e-ticket.
                    @elseif($data->status == 4)
                        <a href="{{url('/booking/download/e-ticket/'.$data->booking_id)}}" class="btn btn-orange btn-block"> Get E-ticket  </a>
                        <br>
                        Please click above button to download E-tickets.
                    @elseif($data->status == 5)
                        <a href="{{url('/contact-us')}}" class="btn btn-orange btn-block"> Contact us  </a>
                        <br>
                        Sorry! a flight you booked is fully reservation and thought we've tried for your booking, there is no available seat in that flight. For more options, please contact us.
                    @elseif($data->status == 6)
                        <a href="{{url('/contact-us')}}" class="btn btn-orange btn-block"> Contact us  </a>
                        <br>
                        Your booking have been cancelled due to an issue.
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row passenger-detail-badge-2 text-center" style="margin-left: 2px; margin-right: 2px; margin-bottom: 20px;">
                Flight Detail
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="grid-block main-block f-grid-block">
                    <a href="#">
                        <div class="main-img f-img">
                            <img src="{{url('/images/airlines/'.$airline->logo)}}" class="img-responsive" alt="flight-img" />
                        </div><!-- end f-img -->
                    </a>
                    <ul class="list-unstyled list-inline offer-price-1">
                        <li class="price">@if($data->class = 1) {{$data->currency}} @if($data->currency == "$") {{$flight->saver_fare_usd}} @else {{$flight->saver_fare_mm}}
                        <br> @endif @else @if($data->currency == "$") {{$flight->plus_fare_usd}} @else {{$flight->plus_fare_mm}}
                        <br> @endif @endif<span class="divider">|</span><span class="pkg">@if($flight->route_type == 0) non-stop @else 1 stop ({{$flight->via}}) @endif</span></li>
                    </ul>

                    <div class="block-info f-grid-info">
                        <div class="f-grid-desc">
                            <span class="f-grid-time"><i class="fa fa-plane"></i>{{$flight->flight}} - {{$flight->flight_no}}</span>
                            <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight->duration}}</span>
                            <h3 class="block-title"><a href="#">{{$flight->from}} to {{$flight->to}}</a></h3>
                            <p class="block-minor"><span>Class :@if($data->class == 1) Saver</span> Economy @else Plus</span> Economy @endif</p>
                            <div class="col-xs-12">
                                <p class="small">{{$airline->name}}</p>
                            </div>
                        </div><!-- end f-grid-desc -->
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div class="f-grid-timing">
                            <ul class="list-unstyled">
                                <li><span><i class="fa fa-plane"></i></span><span class="date">{{$data->dep_date}}</span> (DEP : {{$flight->dep}})</li>
                                <li><span><i class="fa fa-plane"></i></span><span class="date">{{$data->dep_date}}</span> (ETA : {{$flight->eta}})</li>
                            </ul>
                        </div><!-- end flight-timing -->

                        <div class="grid-btn">
                            <p class="small text-center">Ticket Fare is based on per person</p>
                            <hr>
                        </div><!-- end grid-btn -->
                    </div><!-- end f-grid-info -->
                </div><!-- end f-grid-block -->
            </div><!-- end columns -->
            @if($data->route == "round")
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="grid-block main-block f-grid-block">
                        <a href="#">
                            <div class="main-img f-img">
                                <img src="{{url('/images/airlines/'.$airline1->logo)}}" class="img-responsive" alt="flight-img" />
                            </div><!-- end f-img -->
                        </a>
                        <ul class="list-unstyled list-inline offer-price-1">
                            <li class="price">@if($data->class = 1) {{$data->currency}} @if($data->currency == "$") {{$flight1->saver_fare_usd}} @else {{$flight1->saver_fare_mm}}
                                <br> @endif @else @if($data->currency == "$") {{$flight1->plus_fare_usd}} @else {{$flight1->plus_fare_mm}}
                                <br> @endif @endif<span class="divider">|</span><span class="pkg">@if($flight1->route_type == 0) non-stop @else 1 stop ({{$flight1->via}}) @endif</span></li>
                        </ul>

                        <div class="block-info f-grid-info">
                            <div class="f-grid-desc">
                                <span class="f-grid-time"><i class="fa fa-plane"></i>{{$flight1->flight}} - {{$flight1->flight_no}}</span>
                                <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight1->duration}}</span>
                                <h3 class="block-title"><a href="#">{{$flight1->from}} to {{$flight1->to}}</a></h3>
                                <p class="block-minor"><span>Class :@if($data->return_class == 1) Saver</span> Economy @else Plus</span> Economy @endif</p>
                                <div class="col-xs-12">
                                    <p class="small">{{$airline1->name}}</p>
                                </div>
                            </div><!-- end f-grid-desc -->
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <div class="f-grid-timing">
                                <ul class="list-unstyled">
                                    <li><span><i class="fa fa-plane"></i></span><span class="date">{{$data->return_date}}</span> (DEP : {{$flight1->dep}})</li>
                                    <li><span><i class="fa fa-plane"></i></span><span class="date">{{$data->return_date}}</span> (ETA : {{$flight1->eta}})</li>
                                </ul>
                            </div><!-- end flight-timing -->

                            <div class="grid-btn">
                                <p class="small text-center">Ticket Fare is based on per person</p>
                                <hr>
                            </div><!-- end grid-btn -->
                        </div><!-- end f-grid-info -->
                    </div><!-- end f-grid-block -->
                </div><!-- end columns -->
            @endif
        </div>
        </div>
    </div>
    </section>

    @endsection