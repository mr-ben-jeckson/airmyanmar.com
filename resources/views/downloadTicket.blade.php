@extends('layouts.global')
@section('title', 'Myanmar Flights Center, Airmyanmar.com : Download E Ticket')
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{$data->booking_id}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Booking</a></li>
                        <li class="active">Download E Ticket</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>
    <div class="container-fluid process-container">
        <div class="col-md-3 process-bar-active"> <i class="fa fa-plane"></i> Step 1 <br> <span class="small">Flight Selected</span></div>
        <div class="col-md-3 process-bar-active"> <i class="fa fa-pencil"></i> Step 2 <br> <span class="small">Fill Passenger Information</span></div>
        <div class="col-md-3 process-bar-active"> <i class="fa fa-credit-card-alt"></i> Step 3 <br> <span class="small">Wait booking status & Make Payment</span> </div>
        <div class="col-md-3 process-bar-active"> <i class="fa fa-ticket"></i> Step 4 <br> <span class="small">Complete & Confirmation Download</span></div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12 thankyou-box">
        <iframe src="{{url('/booking/download/ticket/'.$data->booking_id.'/'.$data->booking_id.'-Ticket.pdf')}}" width="100%" height="750" allowfullscreen></iframe>
        </div>
        <div class="col-md-12 pink-bg">
            <div class="col-md-3"><a href="{{url('/')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-home"></i> Go Back Home</a></div>
            <div class="col-md-3"><a href="{{url('/contact-us')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-phone-square"></i> Contact us </a></div>
            <div class="col-md-3"><a href="{{url('/how-to-book')}}" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-info-circle"></i> How to Book?</a></div>
            <div class="col-md-3"><a href="{{url('/booking/download/ticket/'.$data->booking_id.'/'.$data->booking_id.'-Ticket.pdf')}}" target="_blank" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-download"></i> Download</a></div>
        </div>
    </div>
    </section>

    @endsection