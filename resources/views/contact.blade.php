@extends('layouts.global')
@section('title')Myanmar Flights Center, Airmyanmar.com - Contact Us @stop
@section('keywords')@stop
@section('description')@stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Contact us</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Contact us</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>
        <div id="contact-us" style="margin-top: 15px;">
            <div class="container-fluid">
                <div class="air-myanmar-google-map block">
                </div><!-- end map -->
                <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
                    <div class="col-sm-12 col-md-5 no-pd-r">
                        <div class="custom-form contact-form contact-bg">
                            <h3 style="color: #fff;">Contact Us</h3>
                            <p class="white">We would be more than happy to help you. Our team are ready at your service to help you. Leave a message to join or contact us</p>
                            <form method="post" action="{{url('/send-message')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" @if(\Illuminate\Support\Facades\Auth::check()) value="{{Auth::user()->name}}" readonly @endif  required/>
                                    <span><i class="fa fa-user"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" @if(\Illuminate\Support\Facades\Auth::check()) value="{{Auth::user()->email}}" readonly @endif  required/>
                                    <span><i class="fa fa-envelope"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"  required/>
                                    <span><i class="fa fa-info-circle"></i></span>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>

                                <button type="submit" class="btn btn-orange btn-block">Send</button>
                            </form>
                        </div><!-- end contact-form -->
                    </div><!-- end columns -->

                    <div class="col-sm-12 col-md-7 no-pd-l">
                        <center>
                        <img src="{{url('/images/big-x-logo.png')}}" title="Air Myanmar" style="margin: 10px;" class="img-responsive" alt="">
                        </center>
                        <hr>
                        <h3 style="text-align: center;" title="Air Myanmar - Myanmar Flights Center - Contact us">Air Myanmar - Myanmar Flights Center - Contact us</h3>
                        <hr>
                        <div class="col-md-12">
                            <p style="font-weight:bold;">Address</p>
                            <p style="color: #0a0909; font-size: medium;">{{$contact->address}}</p>
                            <p style="font-weight:bold;">Mobiles Number</p>
                            <p style="font-size: medium; color: #0a0909; font-weight: bolder;">@foreach(unserialize($contact->mobiles) as $no){{$no}}, @endforeach</p>
                            <p style="font-weight:bold;">Email</p>
                            <p style="color: #ac0072; font-size: medium; font-weight: bolder;">{{$contact->email}}</p>
                            <hr>
                        </div>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end contact-us -->
    </section>
    @stop
    @section('script')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9-pIaebSXW_x5wtHmpUyR9BmIWcBRUBA&callback=initMap">
        </script>
        <script type="text/javascript" src="{{asset('js/gmap3.min.js')}}"></script>
        <script>
            $(".air-myanmar-google-map").gmap3({
                map: {
                    options: {
                        center: [{{$contact->latitude}}, {{$contact->longitude}}],
                        zoom: 16
                    }
                },
                marker:{
                    values: [
                        {latLng:[{{$contact->latitude}}, {{$contact->longitude}}], data: "{{$contact->name}}"}
                    ],
                    options: {
                        draggable: false
                    },
                },
            });
        </script>
        @endsection