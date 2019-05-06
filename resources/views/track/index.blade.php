@extends('layouts.global')
@section('title', 'Myanmar Flights Center, Airmyanmar.com : Track My Flight')
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Track Booking</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Booking</a></li>
                        <li class="active">Track</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>

    <div class="container-fluid">
        <div class="col-md-12 thankyou-box">
            <span style="font-size: large;">Please fill your booking ID and email below then find your booking</span>
            <hr>
            <div class="row">
                <form action="#" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Fill Booking ID</label>
                        <input type="text" name="bid" class="form-control" maxlength="9" placeholder="XXXXXXXXX" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Type Email</label>
                        <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                     <label for="">Make Tracking</label>
                    <button type="submit" class="btn btn-pink btn-block btn-lg">FIND MY BOOKING</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </section>

    @endsection