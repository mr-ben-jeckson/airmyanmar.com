@extends('layouts.global')
@section('title') {{$customer->name}}'s Booking @stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{$customer->name}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Booking</a></li>
                        <li class="active">{{$customer->name}}'s Booking</li>
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
                        @foreach($bookings as $data)
                        <div class="col-md-4 col-sm-6">
                            <div class="row" style="margin: 3px;">
                        <div class="row passenger-detail-badge-2">
                            Booking ID - {{$data->booking_id}}
                        </div>
                        <div class="row booking-text-2">
                            <div class="col-xs-6"><i class="fa fa-info-circle"></i> Status</div>
                            <div class="col-xs-6">
                                @if($data->status == 1)<span class="fa fa-bell waiting-list-icon"></span>
                                @elseif($data->status == 2)<span class="fa fa-bell payment-list-icon"></span>
                                @elseif($data->status == 3)<span class="fa fa-bell complete-list-icon"></span>
                                @elseif($data->status == 4)<span class="fa fa-bell final-list-icon"></span>
                                @elseif($data->status == 5) <span class="fa fa-bell unavailable-list-icon"></span>
                                @else <span class="fa fa-bell cancel-list-icon"></span>
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
                            <div class="col-xs-6">{{count($data->pax)}} @if(unserialize($data->pax)['child'] > 0) ({{unserialize($data->pax)['child']}} Child) @endif @if(unserialize($data->pax)['infant'] > 0) ({{unserialize($data->pax)['infant']}} Infant) @endif </div>
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

                                    <form action="{{url('/track-booking')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="bid" value="{{$data->booking_id}}">
                                        <input type="hidden" name="email" value="{{$data->c_email}}">
                                        <button type="submit" class="btn btn-pink btn-block text-center"> More Detail <i class="fa fa-info-circle"></i></button>
                                    </form>
                            </div>
                            </div>
                    </div>
                            @endforeach
                        <div class="clearfix"></div>
                        <div class="col-md-12 text-center">
                            {!! $bookings->appends(request()->input())->links() !!}
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar" style="padding-top: 0;">
                        <div class="row passenger-detail-badge-2">
                            <center>MANAGE TOOLS</center>
                        </div>
                        <form action="{{url('/user/booking/filter')}}" method="get" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="row booking-text-2">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Search by Booking ID</label>
                                <input type="text" class="form-control" name="booking_id" placeholder="Enter Booking ID" @if(session('a')) value="{{session('a')}}" @endif>
                            </div>
                                <div class="form-group">
                                    <label for="">Search by Travel Date</label>
                                    <input type="text" class="form-control" id="date" name="dep_date" placeholder="Search by Departed Date"  autocomplete="off" @if(session('b')) value="{{session('b')}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="">Search by Booking Date</label>
                                    <input type="text" class="form-control" id="date1" name="booking_date" placeholder="Search by Booking Date" autocomplete="off" @if(session('c')) value="{{session('c')}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="">Search by Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="" @if(!session('d')) selected @endif>Select</option>
                                        <option value="1" @if(session('d') == 1) selected @endif>Processing List</option>
                                        <option value="2" @if(session('d') == 2) selected @endif>Awaiting Payment List</option>
                                        <option value="3" @if(session('d') == 3) selected @endif>Complete List</option>
                                        <option value="4" @if(session('d') == 4) selected @endif>Final Completed List</option>
                                        <option value="5" @if(session('d') == 5) selected @endif>Cancelled as Fully Booked</option>
                                        <option value="6" @if(session('d') == 6) selected @endif>Cancelled List</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row passenger-detail-badge-2">
                            <button type="submit" class="btn btn-orange center-block"> Search <i class="fa fa-search"></i> </button>
                        </div>
                        </form>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection