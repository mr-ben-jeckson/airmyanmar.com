@extends('layouts.global')
@section('title', 'Myanmar Flights Center, Airmyanmar.com : Flight Booked')
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Thank You</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Booking</a></li>
                        <li class="active">Processing List</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>
    <div class="container-fluid process-container">
        <div class="col-md-3 process-bar-active"> <i class="fa fa-plane"></i> Step 1 <br> <span class="small">Flight Selected</span></div>
        <div class="col-md-3 process-bar-active"> <i class="fa fa-pencil"></i> Step 2 <br> <span class="small">Fill Passenger Information</span></div>
        <div class="col-md-3 process-bar"> <i class="fa fa-credit-card-alt"></i> Step 3 <br> <span class="small">Wait booking status & Make Payment</span> </div>
        <div class="col-md-3 process-bar"> <i class="fa fa-ticket"></i> Step 4 <br> <span class="small">Complete & Confirmation Download</span></div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12 thankyou-box">
            Your booking was successfully saved in our booking system. We will take action on your booking during <strong>office hours (UTC 6:30 Yangon/Rangoon)</strong> and then remind to {{$data->c_email}} with automation <strong>within hours</strong>.
            <hr>
            Please do not forget Booking ID <span style="color: #ac0072; font-weight: bolder;">{{$data->booking_id}}</span>. If you have any further question, please
            <a href="" class="strong-link">contact us</a>. For more booking instruction,
            <a href="" class="strong-link">click here</a>.
            <hr>
            Registered members or users can manage your booking at anytime and guest (without registration) can also track the booking with booking ID.
            <hr>
        </div>
        <div class="col-md-12 pink-bg">
            <div class="col-md-3"><a href="{{url('/')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-home"></i> Go Back Home</a></div>
            <div class="col-md-3"><a href="{{url('/contact-us')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-phone-square"></i> Contact us </a></div>
            <div class="col-md-3"><a href="{{url('/how-to-book')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-info-circle"></i> How to Book?</a></div>
            <div class="col-md-3"><a href="{{url('/track-booking')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-search"></i> Track</a></div>
        </div>
    </div>
    </section>

    @endsection