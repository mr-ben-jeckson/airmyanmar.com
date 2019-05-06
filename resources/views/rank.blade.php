@extends('layouts.global')
@section('title') {{$customer->name}}'s Member Ranking @stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{$customer->name}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Ranking</a></li>
                        <li class="active">{{$customer->name}}'s Rank</li>
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
                    <h3 class="text-center">My Points - {{$point}}</h3>
                        <hr>
                        <div class="col-md-12">Ranking - @if($point<1000) Bronze Member @elseif($point>999 && $point<1400)Silver Member @elseif($point>1399 && $point<1600)Gold Member @elseif($point>1599 && $point<1800)Platinum Member @elseif($point>1799 && $point<2000)Diamond Member @elseif($point>1999)Crown Member @endif</div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar" style="padding-top: 0;">
                        <div class="row passenger-detail-badge-2">
                            <center>Ranking</center>
                        </div>
                        <form action="{{url('/user/booking/filter')}}" method="get" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="row booking-text-2">
                            <div class="col-md-12">
                            <i class="fa fa-trophy" style="color: #ff7d2a;"></i> Crown Member - 2000 pts up <br>
                            <i class="fa fa-trophy" style="color: #c0c0c0;"></i> Diamond Member - 1800 pts up <br>
                            <i class="fa fa-trophy" style="color: #f2adb1;"></i> Platinum Member - 1600 pts up <br>
                            <i class="fa fa-trophy" style="color: #fffa0e;"></i> Gold Member - 1400 pts up <br>
                            <i class="fa fa-trophy" style="color: #7c7c7c;"></i> Silver Member - 1000 pts up <br>
                            <i class="fa fa-trophy" style="color: #5f5d5f;"></i> Bronze Member - 0 to 1000 pts
                            </div>
                        </div>
                        <div class="row passenger-detail-badge-2 text-center">
                            <a href="{{url('/page/coming-soon')}}" class="btn btn-orange"> My Reward <i class="fa fa-search"></i> </a>
                        </div>
                        </form>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection