@extends('layouts.global')
@section('title'){{$keyword->title}}@stop
@section('description'){{$keyword->description}}@stop
@section('keywords'){{$keyword->keywords}}@stop
@section('markup')
    <meta property="og:url"                content="{{url('/')}}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$keyword->title}}" />
    <meta property="og:description"        content="{{$keyword->description}}" />
    <meta property="og:image"              content="{{url('/images/og.jpg')}}" />
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{url('/')}}",
      "logo": "{{url('/')}}/images/big-x-logo.png"
    }
    </script>
@stop
@section('content')
    <section class="flexslider-container" id="flexslider-container-1" style="margin-bottom: 130px;">
        <div class="flexslider slider" id="slider-1">
            <ul class="slides">
                @foreach($ads as $item)
                <li class="item-{{$item->id}}" style="background:			linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{url('images/'.$item->img)}}) 50% 0%;
                        background-size:cover;
                        height:100%;">
                    <div class=" meta">
                        <div class="container">
                            <h2>{{$item->first_word}}</h2>
                            <h1>{{$item->second_word}}</h1>
                            <a href="{{url('/read-more/'.$item->page_id)}}" class="btn btn-default">Read More</a>
                        </div><!-- end container -->
                    </div><!-- end meta -->
                </li><!-- end item-1 -->
                @endforeach
            </ul>
        </div><!-- end slider -->
        <div class="search-tabs" id="search-tabs-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs center-tabs">
                            <li><a href="#flights" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">One Way</span></a></li>
                            <li class="active"><a href="#flightsRound" data-toggle="tab"><span><i class="fa fa-plane"></i><i class="fa fa-plane"></i></span><span class="st-text">Return</span></a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="flights" class="tab-pane" style="border: 1px solid #000000;">
                                <form action="{{url('/search/flights/oneway')}}" method="get" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Select Origin</label>
                                                    <div class="form-group right-icon">
                                                        <select name="from" class="form-control" required>
                                                            <option value="" selected>From</option>
                                                            @foreach($sector as $item)
                                                                <option value="{{$item->code}}" style="text-transform: capitalize;">{{$item->name}} ({{$item->code}})</option>
                                                                @endforeach
                                                        </select>
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Select Destination</label>
                                                    <div class="form-group right-icon">
                                                        <select name="to" class="form-control" required>
                                                            <option value="" selected>To</option>
                                                            @foreach($sector as $item)
                                                                <option value="{{$item->code}}" style="text-transform: capitalize;">{{$item->name}} ({{$item->code}})</option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Depart Date</label>
                                                    <div class="form-group right-icon">
                                                        <input type="text" name="date" class="form-control dpd1" placeholder="MM/DD/YY" required>
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Select Flight Class</label>
                                                    <div class="form-group right-icon">
                                                        <select name="class" class="form-control">
                                                            <option value="" selected>Class</option>
                                                            <option value="1" style="text-transform: capitalize;">Eco Saver</option>
                                                            <option value="2" style="text-transform: capitalize;">Eco Plus</option>
                                                        </select>
                                                        <i class="fa fa-cog"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <label> Adults (12 over)</label>
                                            <div class="form-group right-icon">
                                                <select name="adults" class="form-control" required>
                                                @foreach(range(1,9) as $x)
                                                        <option value="{{$x}}" @if($x == '2') selected @endif>{{$x}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-6 col-sm-12 col-md-2">
                                            <label> Child (2 - 12) </label>
                                            <div class="form-group right-icon">
                                                <select name="child" class="form-control">
                                                    @foreach(range(0,5) as $x)
                                                        <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                        @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-6 col-sm-12 col-md-2">
                                            <label> Infant (2 under)</label>
                                            <div class="form-group right-icon">
                                                <select name="infant" class="form-control">
                                                    @foreach(range(0,5) as $x)
                                                        <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <label>Select Nationality</label>
                                                    <div class="form-group right-icon">
                                                        <select name="nation" class="form-control" required>
                                                            <option value="1" style="text-transform: capitalize;" selected>Foreigner</option>
                                                            <option value="2" style="text-transform: capitalize;">Local</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 search-btn">
                                                    <label>Go to Ticket Listing</label>
                                                    <button class="btn btn-orange" style="width: 100%;">Search</button>
                                                </div>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end flights -->

                            <div id="flightsRound" class="tab-pane in active" style="border: 1px solid #000000;">
                                <form action="{{url('/search/flights/round-trip/')}}" method="get" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Select Origin</label>
                                                    <div class="form-group right-icon">
                                                        <select name="from" class="form-control" required>
                                                            <option value="" selected>From</option>
                                                            @foreach($sector as $item)
                                                                <option value="{{$item->code}}" style="text-transform: capitalize;">{{$item->name}} ({{$item->code}})</option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Select Destination</label>
                                                    <div class="form-group right-icon">
                                                        <select name="to" class="form-control" required>
                                                            <option value="" selected>To</option>
                                                            @foreach($sector as $item)
                                                                <option value="{{$item->code}}" style="text-transform: capitalize;">{{$item->name}} ({{$item->code}})</option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-4">
                                                    <label>Depart Date</label>
                                                    <div class="form-group right-icon">
                                                        <input type="text" name="dep_date" class="form-control dpd1" placeholder="MM/DD/YY" required>
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-4">
                                                    <label>Return Date</label>
                                                    <div class="form-group right-icon">
                                                        <input type="text" name="return_date" class="form-control dpd1" placeholder="MM/DD/YY" required>
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-4">
                                                    <label>Select Flight Class</label>
                                                    <div class="form-group right-icon">
                                                        <select name="class" class="form-control">
                                                            <option value="" selected>Class</option>
                                                            <option value="1" style="text-transform: capitalize;">Eco Saver</option>
                                                            <option value="2" style="text-transform: capitalize;">Eco Plus</option>
                                                        </select>
                                                        <i class="fa fa-cog"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <label> Adults (12 over)</label>
                                            <div class="form-group right-icon">
                                                <select name="adults" class="form-control" required>
                                                    @foreach(range(1,9) as $x)
                                                        <option value="{{$x}}" @if($x == '2') selected @endif>{{$x}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-6 col-sm-12 col-md-2">
                                            <label> Child (2 - 12) </label>
                                            <div class="form-group right-icon">
                                                <select name="child" class="form-control">
                                                    @foreach(range(0,5) as $x)
                                                        <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-6 col-sm-12 col-md-2">
                                            <label> Infant (2 under)</label>
                                            <div class="form-group right-icon">
                                                <select name="infant" class="form-control">
                                                    @foreach(range(0,5) as $x)
                                                        <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <label>Select Nationality</label>
                                                    <div class="form-group right-icon">
                                                        <select name="nation" class="form-control" required>
                                                            <option value="1" style="text-transform: capitalize;" selected>Foreigner</option>
                                                            <option value="2" style="text-transform: capitalize;">Local</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 search-btn">
                                                    <label>Go to Ticket Listing</label>
                                                    <button type="submit" class="btn btn-orange" style="width: 100%;">Search</button>
                                                </div>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end flights -->

                        </div><!-- end tab-content -->

                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end search-tabs -->

    </section><!-- end flexslider-container -->
    <div class="row" style="margin-top: 300px;"></div>
    <div class="mobile-diver"></div>
    <div class="container">
        <div class="row mb50">
            <div class="page-heading text-pink">
                <h2>Best Flight Deals From Yangon (RGN)</h2>
                <hr class="heading-line">
            </div>
            <div class="col-md-12">
                @foreach($sectorFromRGN as $item)
                    <?php $flight = \App\tickets::where('from', '=', 'RGN')->where('to', '=', $item->code)->get();
                          $price = $flight->where('saver_fare_usd',$flight->min('saver_fare_usd'))->first();?>
                <div class="col-md-4 col-sm-6 am">
                    <div class="mg-image">
                        <img src="{{url('/images/'.unserialize($item->img)[1])}}" style="position: relative; width: 100%; height: 280px;" alt="">
                        <div class="text-am-h">{{$item->name}}</div>
                        @if(!session('Check'))
                        <div class="text-am"><small>from</small> USD @if($price){{$price->saver_fare_usd}}@else XX @endif</div>
                        <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=RGN&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}"><div class="overlay-am">Search Ticket <i class="fa fa-ticket"></i></div></a>
                        @else
                            <div class="text-am"><small>from</small> MMK @if($price){{$price->saver_fare_mm}}@else XX @endif</div>
                            <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=RGN&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=2')}}"><div class="overlay-am">Search Ticket <i class="fa fa-ticket"></i></div></a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <hr class="page-heading heading-line">
                <center>@if(!session('Check'))<a href="{{url('/local-check')}}" title="Myanmar Flight Fare For Local" class="btn btn-lg btn-pink">Show Fares for Local</a> @else <a href="{{url('/local-un-check')}}" title="Myanmar Flight Fare For Local" class="btn btn-lg btn-pink">Show Fares for Foreigner</a> @endif</center>
            </div>
        </div>
        <hr>
        <div class="row" style="margin-bottom: 50px;">
            <div class="page-heading text-pink">
                <h2>Best Flight Deals From Mandalay (MDL)</h2>
                <hr class="heading-line">
            </div>
            <div class="col-md-12">
                @foreach($sectorFromMDL as $item)
                    <?php $flight1 = \App\tickets::where('from', '=', 'MDL')->where('to', '=', $item->code)->get();
                    $price1 = $flight1->where('saver_fare_usd',$flight1->min('saver_fare_usd'))->first();?>
                    <div class="col-md-4 col-sm-6 am">
                        <div class="mg-image">
                            <img src="{{url('/images/'.unserialize($item->img)[2])}}" style="position: relative; width: 100%; height: 280px;" alt="">
                            <div class="text-am-h">{{$item->name}}</div>
                            @if(!session('Check'))
                                <div class="text-am"><small>from</small> USD @if($price1){{$price1->saver_fare_usd}}@else XX @endif</div>
                                <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=MDL&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}"><div class="overlay-am">Search Ticket <i class="fa fa-ticket"></i></div></a>
                            @else
                                <div class="text-am"><small>from</small> MMK @if($price1){{$price1->saver_fare_mm}}@else XX @endif</div>
                                <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=MDL&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=2')}}"><div class="overlay-am">Search Ticket <i class="fa fa-ticket"></i></div></a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="flex-content">
                    <div class="custom-form custom-form-fields">
                        <h3>Free Member Registration</h3>
                        <p>Register Now to get more updates and promotions. Get save up coupon with your member points</p>
                        <form method="POST" action="{{url('/user/register')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Full Name"  required/>
                                <span><i class="fa fa-user"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"  required/>
                                <span><i class="fa fa-envelope"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password"  required/>
                                <span><i class="fa fa-lock"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="password" id="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"  required/>
                                <span><i class="fa fa-lock"></i></span>
                            </div>

                            <button type="submit" class="btn btn-orange btn-block">Register</button>
                        </form>

                        <div class="other-links">
                            <p class="link-line">Already Have An Account ? <a href="#" data-dismiss="modal" data-target=".bd-login-modal-lg">Login Here</a></p>
                        </div><!-- end other-links -->
                    </div><!-- end custom-form -->

                    <div class="flex-content-img custom-form-img">
                        <img src="{{url('/images/registration.jpg')}}" class="img-responsive" alt="registration-img" />
                    </div><!-- end custom-form-img -->
                </div><!-- end form-content -->

            </div><!-- end columns -->
        </div>
        <section id="luxury-car">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 no-pd-l luxury-text">
                        <div class="luxury-car-text">
                            <h2>{{$content->heading}}</h2>
                            <p>{{$content->content}}</p>
                            <a href="{{url('/testimonials')}}" class="btn btn-black">Testimonials</a>
                            <a href="{{url('/page/about-us')}}" class="btn btn-o-border">About us</a>
                        </div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end luxury-car -->
        <div class="row" style="margin-top: 30px;">
            <hr>
            <div class="col-sm-12">
                <div class="page-heading text-pink">
                    <h2>{{count($sector)}} Destinations & {{count($airlines)}} Airlines</h2>
                    <hr class="heading-line">
                </div>
            </div>
            <hr>
        </div>
        <section id="holiday-trips">
        <div class="col-md-12">

                <div class="trip-block">
                    <div class="owl-carousel owl-theme owl-custom-arrow owl-holidays">
                        @foreach($sector as $item)
                        <div class="item">
                            <div class="main-block tour-block">
                                <div class="main-img">
                                    <a href="{{url('/destination/'.$item->name)}}" title="flight to {{$item->name}}">
                                        <img src="{{url('/images/'.unserialize($item->img)[1])}}" class="img-responsive" alt="{{$item->name}}" />
                                    </a>
                                </div><!-- end offer-img -->

                                <div class="offer-price-2">
                                    <ul class="list-unstyled">
                                        <li class="price">{{$item->code}}<a href="#" ><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                    </ul>
                                </div><!-- end offer-price-2 -->

                                <div class="main-info tour-info">
                                    <div class="main-title tour-title">
                                        <a href="#" class="{{url('/destination/'.$item->name)}}">{{$item->name}}</a>
                                        <p>Flight Destination</p>
                                    </div><!-- end tour-title -->
                                </div><!-- end tour-info -->
                            </div><!-- end tour-block -->
                        </div><!-- end item -->
                        @endforeach

                    </div><!-- end owl-holidays -->
                </div><!-- end trip-block -->
            @foreach($airlines as $item)
                <div class="col-md-3 col-xs-6 member-img">
                    <a href="{{url('/flights/'.$item->slug)}}" title="{{$item->name}}"><img src="{{url('/images/airlines/'.$item->logo)}}" class="img-responsive" title="{{$item->name}}" alt="{{$item->name}}"></a>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
        </section>
        <div class="row">
            <div class="clearfix"></div>
            <hr>
            <div class="col-md-12 col-sm-12" style="margin-top: 30px;">
                <div class="page-heading text-pink">
                    <h2>Myanmar Cheap Flight Routes</h2>
                    <hr class="heading-line">
                </div>
                <div class="col-md-12">
                @foreach($sectorFromRGN as $item)
                    <?php $flight = \App\tickets::where('from', '=', 'RGN')->where('to', '=', $item->code)->get();
                    $price = $flight->where('saver_fare_usd',$flight->min('saver_fare_usd'))->first();?>

                        <div class="col-md-6 pinklink"><strong><i class="fa fa-plane"></i> Myanmar Flight Center/ Cheap Flight Deals</strong>
                            <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=RGN&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}" title="Myanmar Flight Center/ Book Flights from Yangon to {{$item->name}}">from Yangon (RGN) to {{$item->name}} ({{$item->code}}) </a></div>
                @endforeach
                    @foreach($sectorFromMDL as $item)
                        <?php $flight1 = \App\tickets::where('from', '=', 'MDL')->where('to', '=', $item->code)->get();
                        $price1 = $flight1->where('saver_fare_usd',$flight1->min('saver_fare_usd'))->first();?>

                        <div class="col-md-6 pinklink"><strong><i class="fa fa-plane"></i> Myanmar Flight Center/ Cheap Flight Deals</strong>
                            <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=MDL&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}" title="Myanmar Flight Center/ Book Flights from Mandalay to {{$item->name}}">from Mandalay (MDL) to {{$item->name}} ({{$item->code}}) </a></div>
                    @endforeach

                </div>
            </div>
            <hr>
        </div>
    </div>
    @if($promo)
    <div class="modal fade" id="promo" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header air-m-h">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">{{$promo->title}}</h5>
                </div>
                <div class="modal-body">
                <div class="col-md-12">
                    <a href="{{url('/flights/seasonal-promotions/'.$promo->slug)}}">
                    <img src="{{url('/images/'.$promo->img)}}" class="img-responsive" alt="{{$promo->title}}" title="{{$promo->title}}">
                    </a>
                </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer air-m-h">
                    <button type="button" class="btn btn-default" onClick="document.location.href=MySession();" data-dismiss="modal">Close</button>
                    <a href="{{url('/flights/seasonal-promotions/'.$promo->slug)}}" class="btn btn-orange">Read More</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop
@section('script')
    @if(!session('hide'))
        <script type="text/javascript">
            $(window).load(function()
            {
                $('#promo').modal('show');
            });
        </script>
        <script type="text/javascript">
            function MySession()
            {
                return "{{url('/pop-up/hide')}}";
            }
        </script>
    @endif
    @endsection
