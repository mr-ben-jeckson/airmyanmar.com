@extends('layouts.global')
@section('title')Myanmar Flights Center, Airmyanmar.com, Cheap Flights From {{$from->name}} to {{$to->name}} @stop
@section('keywords')Air Myanmar, Myanmar Flight Center, Cheap Flights From {{$from->name}} to {{$to->name}}, Myanmar Flights, Myanmar Domestic Flights @stop
@section('description')Myanmar Flights Center - Best Flight Deals and Get Cheap Flights From {{$from->name}} to {{$to->name}} @stop
@section('markup')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Flights",
            "item": "{{url('/')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "From {{$from->name}}",
            "item": "{{url('/destination/'.$from->name)}}"
          },{
            "@type": "ListItem",
            "position": 3,
            "name": "To {{$to->name}}",
            "item": "{{url('/destination/'.$from->to)}}"
          }]
        }
    </script>
    @stop
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title" title="flight from {{$from->name}} to {{$to->name}}"><i class="fa fa-plane"></i> Flights from {{$from->name}} to {{$to->name}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Results - {{$data->count()}} flight found</a></li>
                        <li class="active">({{$request->from}}) to ({{$request->to}})</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>
        <div id="hotel-details" style="padding-top: 20px;">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                        <div class="row">
                            @foreach($data as $flight)

                            <!-- Policy Modal Box-->
                                <div class="modal fade" id="Policy{{$flight->id}}" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header air-m-h">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">Myanmar Flights Center - Airmyanmar.com | Ticket Policy</h5>
                                            </div>
                                            <div class="modal-body">
                                                {!! $flight->policy !!}
                                            </div>
                                            <div class="modal-footer air-m-h">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- End Modal Box -->

                            <!-- Eco Fare Detailing to Book Modal-->
                                <div class="modal fade modal-fullscreen  footer-to-bottom" id="morefare{{$flight->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog animated zoomInLeft">
                                        <div class="modal-content">
                                            <div class="modal-header mtb air-m-h">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h5 class="modal-title">{{$flight->name}} - {{$flight->flight}} {{$flight->flight_no}} | Economy Saver Fare Details | Flight Total Calculation</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <p>
                                                        <span class="fare-list">Flight <span style="color: #ac0072;">Fares</span></span>
                                                    <hr>
                                                    </p>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table table-hover table-responsive text-left">
                                                            <thead>
                                                            <th class="text-left">Fare Based</th>
                                                            <th class="text-left">Adult</th>
                                                            <th class="text-left">Child</th>
                                                            <th class="text-left">Infant</th>
                                                            </thead>
                                                            @if($request->nation == 1)
                                                            <tr>
                                                                <td>Fare Per Person</td>
                                                                <td class="fare-list">USD {{$flight->saver_fare_usd}}</td>
                                                                <td class="fare-list">USD {{$flight->saver_fare_child_usd}}</td>
                                                                <td class="fare-list">USD {{$flight->saver_fare_infant_usd}}</td>
                                                            </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Fare Per Person</td>
                                                                    <td class="fare-list">MMK {{$flight->saver_fare_mm}}</td>
                                                                    <td class="fare-list">MMK {{$flight->saver_fare_child_mm}}</td>
                                                                    <td class="fare-list">MMK {{$flight->saver_fare_infant_mm}}</td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td>Passenger</td>
                                                                <td class="fare-list">&nbsp;&nbsp; {{$adult}}</td>
                                                                <td class="fare-list">&nbsp;&nbsp; {{$child}}</td>
                                                                <td class="fare-list">&nbsp;&nbsp; {{$infant}}</td>
                                                            </tr>
                                                            @if($request->nation == 1)
                                                            <tr>
                                                                <td>Total </td>
                                                                <td class="fare-list">USD {{$flight->saver_fare_usd*$adult}}</td>
                                                                <td class="fare-list">USD {{$flight->saver_fare_child_usd*$child}}</td>
                                                                <td class="fare-list">USD {{$flight->saver_fare_infant_usd*$infant}}</td>
                                                            </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Total </td>
                                                                    <td class="fare-list">MMK {{$flight->saver_fare_mm*$adult}}</td>
                                                                    <td class="fare-list">MMK {{$flight->saver_fare_child_mm*$child}}</td>
                                                                    <td class="fare-list">MMK {{$flight->saver_fare_infant_mm*$infant}}</td>
                                                                </tr>
                                                            @endif
                                                        </table>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <p>
                                                        <span class="fare-list">Total Ticket <span style="color: #ac0072;">Fares</span></span>
                                                    <hr>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="row well">
                                                                <div class="col-md-6 text-left"><span class="fare-list">Total Amount</span><br><span class="ninepx" style="color: #ac0072;">( Inclusive Air Port Charges & Taxes )</span></div>
                                                                <?php
                                                                    if ($request->nation == 1){
                                                                            $total = ($adult*$flight->saver_fare_usd)+($child*$flight->saver_fare_child_usd)+($infant*$flight->saver_fare_infant_usd);
                                                                    }
                                                                    else{
                                                                        $total = ($adult*$flight->saver_fare_mm)+($child*$flight->saver_fare_child_mm)+($infant*$flight->saver_fare_infant_mm);
                                                                    }
                                                                    ?>
                                                                <div class="col-md-6"><span class="price-list pull-right">@if($request->nation == 1)USD @else MMK @endif {{$total}}</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row well">
                                                            <div class="col-md-6 text-left"><span class="fare-list">Grand Total</span><br><span class="ninepx" style="color: #ac0072;">( With Payment Transaction & Total )</span></div>
                                                            <div class="col-md-6"><span class="price-list pull-right">@if($request->nation == 1)USD @else MMK @endif {{$total+($total*0.05)}}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer air-m-h" style="position: fixed; bottom: 0; width: 100%;">
                                                <form action="{{url('/selected/flight')}}" method="get" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="hidden" name="flight" value="{{$flight->id}}">
                                                <input type="hidden" name="adult" value="{{$adult}}">
                                                <input type="hidden" name="child" value="{{$child}}">
                                                <input type="hidden" name="infant" value="{{$infant}}">
                                                <input type="hidden" name="date" value="{{$date}}">
                                                <input type="hidden" name="class" value="1">
                                                <input type="hidden" name="nation" value="{{$request->nation}}">
                                                <button type="submit" class="btn btn-orange">Book Now</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <!-- End -->

                            <!-- Plus Fare Detailing to Book Modal-->
                                <div class="modal fade modal-fullscreen  footer-to-bottom" id="plusfare{{$flight->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog animated zoomInLeft">
                                        <div class="modal-content">
                                            <div class="modal-header mtb air-m-h">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h5 class="modal-title">{{$flight->name}} - {{$flight->flight}} {{$flight->flight_no}} | Economy Saver Fare Details | Flight Total Calculation</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <p>
                                                        <span class="fare-list">Flight <span style="color: #ac0072;">Fares</span></span>
                                                    <hr>
                                                    </p>
                                                    <div class="col-md-12 table-responsive">
                                                        <table class="table table-hover table-responsive text-left">
                                                            <thead>
                                                            <th class="text-left">Fare Based</th>
                                                            <th class="text-left">Adult</th>
                                                            <th class="text-left">Child</th>
                                                            <th class="text-left">Infant</th>
                                                            </thead>
                                                            @if($request->nation == 1)
                                                                <tr>
                                                                    <td>Fare Per Person</td>
                                                                    <td class="fare-list">USD {{$flight->plus_fare_usd}}</td>
                                                                    <td class="fare-list">USD {{$flight->plus_fare_child_usd}}</td>
                                                                    <td class="fare-list">USD {{$flight->plus_fare_infant_usd}}</td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Fare Per Person</td>
                                                                    <td class="fare-list">MMK {{$flight->plus_fare_mm}}</td>
                                                                    <td class="fare-list">MMK {{$flight->plus_fare_child_mm}}</td>
                                                                    <td class="fare-list">MMK {{$flight->plus_fare_infant_mm}}</td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td>Passenger</td>
                                                                <td class="fare-list">&nbsp;&nbsp; {{$adult}}</td>
                                                                <td class="fare-list">&nbsp;&nbsp; {{$child}}</td>
                                                                <td class="fare-list">&nbsp;&nbsp; {{$infant}}</td>
                                                            </tr>
                                                            @if($request->nation == 1)
                                                                <tr>
                                                                    <td>Total </td>
                                                                    <td class="fare-list">USD {{$flight->plus_fare_usd*$adult}}</td>
                                                                    <td class="fare-list">USD {{$flight->plus_fare_child_usd*$child}}</td>
                                                                    <td class="fare-list">USD {{$flight->plus_fare_infant_usd*$infant}}</td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Total </td>
                                                                    <td class="fare-list">MMK {{$flight->plus_fare_mm*$adult}}</td>
                                                                    <td class="fare-list">MMK {{$flight->plus_fare_child_mm*$child}}</td>
                                                                    <td class="fare-list">MMK {{$flight->plus_fare_infant_mm*$infant}}</td>
                                                                </tr>
                                                            @endif
                                                        </table>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <p>
                                                        <span class="fare-list">Total Ticket <span style="color: #ac0072;">Fares</span></span>
                                                    <hr>
                                                    </p>
                                                    <div class="col-md-12">
                                                        <div class="row well">
                                                            <div class="col-md-6 text-left"><span class="fare-list">Total Amount</span><br><span class="ninepx" style="color: #ac0072;">( Inclusive Air Port Charges & Taxes )</span></div>
                                                            <?php
                                                            if ($request->nation == 1){
                                                                $total = ($adult*$flight->plus_fare_usd)+($child*$flight->plus_fare_child_usd)+($infant*$flight->plus_fare_infant_usd);
                                                            }
                                                            else{
                                                                $total = ($adult*$flight->plus_fare_mm)+($child*$flight->plus_fare_child_mm)+($infant*$flight->plus_fare_infant_mm);
                                                            }
                                                            ?>
                                                            <div class="col-md-6"><span class="price-list pull-right">@if($request->nation == 1)USD @else MMK @endif {{$total}}</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row well">
                                                            <div class="col-md-6 text-left"><span class="fare-list">Grand Total</span><br><span class="ninepx" style="color: #ac0072;">( With Payment Transaction & Total )</span></div>
                                                            <div class="col-md-6"><span class="price-list pull-right">@if($request->nation == 1)USD @else MMK @endif {{$total+($total*0.05)}}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer air-m-h" style="position: fixed; bottom: 0; width: 100%;">
                                                <form action="{{url('/selected/flight/')}}" method="get" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input type="hidden" name="flight" value="{{$flight->id}}">
                                                    <input type="hidden" name="adult" value="{{$adult}}">
                                                    <input type="hidden" name="child" value="{{$child}}">
                                                    <input type="hidden" name="infant" value="{{$infant}}">
                                                    <input type="hidden" name="date" value="{{$date}}">
                                                    <input type="hidden" name="class" value="1">
                                                    <input type="hidden" name="nation" value="{{$request->nation}}">
                                                    <button type="submit" class="btn btn-orange">Book Now</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <!-- End -->

                                @if($class == null)

                                @if(!$flight->saver_fare_usd == 0 && !$flight->saver_fare_mm == 0)
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="grid-block main-block f-grid-block">
                                    <a href="#">
                                        <div class="main-img f-img">
                                            @if($flight->words != "all")
                                            <div class="offer-badge flash-text">
                                                {{$flight->words}}
                                            </div>
                                            @endif
                                            <img src="{{url('/images/airlines/'.$flight->logo)}}" class="img-responsive" alt="flight-img" />
                                        </div><!-- end f-img -->
                                    </a>
                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">@if($nation == '2') MMK {{$flight->saver_fare_mm}} <br>@else USD {{$flight->saver_fare_usd}}@endif<span class="divider">|</span><span class="pkg"><small>@if($flight->route_type == 0) non-stop @else 1 stop ({{$flight->via}}) @endif</small></span></li>
                                    </ul>

                                    <div class="block-info f-grid-info">
                                        <div class="f-grid-desc">
                                            <span class="f-grid-time"><i class="fa fa-plane"></i>{{$flight->flight}} - {{$flight->flight_no}}</span>
                                            <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight->duration}}</span>
                                            <h3 class="block-title"><a href="#">{{$flight->from}} to {{$flight->to}}</a></h3>
                                            <p class="block-minor"><span>Class : Saver</span> Economy</p>
                                            <div class="col-xs-12">
                                                <p class="small">{{$flight->name}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                            <p class="small">
                                                <i class="fa fa-info"></i><a href="#" data-target="#Policy{{$flight->id}}" data-toggle="modal"> Ticket Policy</a>
                                            </p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p class="small">
                                                    <i class="fa fa-info"></i><a href="#" data-toggle="modal" data-target="#morefare{{$flight->id}}"> More Fares </a>
                                                </p>
                                            </div>
                                        </div><!-- end f-grid-desc -->
                                        <div class="clearfix"></div>
                                        <div class="clearfix"></div>
                                        <div class="f-grid-timing">
                                            <ul class="list-unstyled">
                                                <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (DEP : {{$flight->dep}})</li>
                                                <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (ETA : {{$flight->eta}})</li>
                                            </ul>
                                        </div><!-- end flight-timing -->

                                        <div class="grid-btn">
                                            <p class="small text-center">Ticket Fare is based on per person</p>
                                            <a href="#" data-toggle="modal" data-target="#morefare{{$flight->id}}" class="btn btn-orange btn-block btn-lg">Select</a>
                                        </div><!-- end grid-btn -->
                                    </div><!-- end f-grid-info -->
                                </div><!-- end f-grid-block -->
                            </div><!-- end columns -->
                                @endif
                                    @if(!$flight->plus_fare_usd == 0 && !$flight->plus_fare_mm == 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="grid-block main-block f-grid-block">
                                                <a href="#">
                                                    <div class="main-img f-img">
                                                        @if($flight->words != "all")
                                                            <div class="offer-badge flash-text">
                                                                {{$flight->words}}
                                                            </div>
                                                        @endif
                                                        <img src="{{url('/images/airlines/'.$flight->logo)}}" class="img-responsive" alt="flight-img" />
                                                    </div><!-- end f-img -->
                                                </a>
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">@if($nation == '2') MMK {{$flight->plus_fare_mm}}
                                                        <br> @else USD {{$flight->plus_fare_usd}}@endif<span class="divider">|</span><span class="pkg"><small>@if($flight->route_type == 0) non-stop @else 1 stop ({{$flight->via}}) @endif</small></span></li>
                                                </ul>

                                                <div class="block-info f-grid-info">
                                                    <div class="f-grid-desc">
                                                        <span class="f-grid-time"><i class="fa fa-plane"></i>{{$flight->flight}} - {{$flight->flight_no}}</span>
                                                        <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight->duration}}</span>
                                                        <h3 class="block-title"><a href="#">{{$flight->from}} to {{$flight->to}}</a></h3>
                                                        <p class="block-minor"><span>Class : PLUS</span> Economy</p>
                                                        <div class="col-xs-12">
                                                            <p class="small">{{$flight->name}}</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p class="small">
                                                                <i class="fa fa-info"></i><a href="#" data-target="#Policy{{$flight->id}}" data-toggle="modal">Ticket Policy</a>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p class="small">
                                                                <i class="fa fa-info"></i><a href="#" data-toggle="modal" data-target="#plusfare{{$flight->id}}">More Fares</a>
                                                            </p>
                                                        </div>
                                                    </div><!-- end f-grid-desc -->
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <div class="f-grid-timing">
                                                        <ul class="list-unstyled">
                                                            <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (DEP : {{$flight->dep}})</li>
                                                            <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (ETA : {{$flight->eta}})</li>
                                                        </ul>
                                                    </div><!-- end flight-timing -->

                                                    <div class="grid-btn">
                                                        <p class="small text-center">Ticket Fare is based on per person</p>
                                                        <a href="#" data-toggle="modal" data-target="#plusfare{{$flight->id}}" class="btn btn-orange btn-block btn-lg">Select</a>
                                                    </div><!-- end grid-btn -->
                                                </div><!-- end f-grid-info -->
                                            </div><!-- end f-grid-block -->
                                        </div><!-- end columns -->
                                        @endif

                                @elseif($class == '1')
                                    @if(!$flight->saver_fare_usd == 0 && !$flight->saver_fare_mm == 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="grid-block main-block f-grid-block">
                                                <a href="#">
                                                    <div class="main-img f-img">
                                                        @if($flight->words != "all")
                                                            <div class="offer-badge flash-text">
                                                                {{$flight->words}}
                                                            </div>
                                                        @endif
                                                        <img src="{{url('/images/airlines/'.$flight->logo)}}" class="img-responsive" alt="flight-img" />
                                                    </div><!-- end f-img -->
                                                </a>
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">@if($nation == '2') MMK {{$flight->saver_fare_mm}} <br>@else USD {{$flight->saver_fare_usd}}@endif<span class="divider">|</span><span class="pkg"><small>@if($flight->route_type == 0) non-stop @else 1 stop ({{$flight->via}}) @endif</small></span></li>
                                                </ul>

                                                <div class="block-info f-grid-info">
                                                    <div class="f-grid-desc">
                                                        <span class="f-grid-time"><i class="fa fa-plane"></i>{{$flight->flight}} - {{$flight->flight_no}}</span>
                                                        <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight->duration}}</span>
                                                        <h3 class="block-title"><a href="#">{{$flight->from}} to {{$flight->to}}</a></h3>
                                                        <p class="block-minor"><span>Class : Saver</span> Economy</p>
                                                        <div class="col-xs-12">
                                                            <p class="small">{{$flight->name}}</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p class="small">
                                                                <i class="fa fa-info"></i><a href="#" data-target="#Policy{{$flight->id}}" data-toggle="modal"> Ticket Policy</a>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p class="small">
                                                                <i class="fa fa-info"></i><a href="#" data-toggle="modal" data-target="#morefare{{$flight->id}}"> More Fares</a>
                                                            </p>
                                                        </div>
                                                    </div><!-- end f-grid-desc -->
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <div class="f-grid-timing">
                                                        <ul class="list-unstyled">
                                                            <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (DEP : {{$flight->dep}})</li>
                                                            <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (ETA : {{$flight->eta}})</li>
                                                        </ul>
                                                    </div><!-- end flight-timing -->

                                                    <div class="grid-btn">
                                                        <p class="small text-center">Ticket Fare is based on per person</p>
                                                        <a href="#" data-toggle="modal" data-target="#morefare{{$flight->id}}" class="btn btn-orange btn-block btn-lg">Select</a>
                                                    </div><!-- end grid-btn -->
                                                </div><!-- end f-grid-info -->
                                            </div><!-- end f-grid-block -->
                                        </div><!-- end columns -->
                                    @endif
                                    @elseif($class == '2')
                                    @if(!$flight->plus_fare_usd == 0 && !$flight->plus_fare_mm == 0)
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="grid-block main-block f-grid-block">
                                                <a href="#">
                                                    <div class="main-img f-img">
                                                        @if($flight->words != "all")
                                                            <div class="offer-badge flash-text">
                                                                {{$flight->words}}
                                                            </div>
                                                        @endif
                                                        <img src="{{url('/images/airlines/'.$flight->logo)}}" class="img-responsive" alt="flight-img" />
                                                    </div><!-- end f-img -->
                                                </a>
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">@if($nation == '2') MMK {{$flight->plus_fare_mm}}
                                                        <br> @else USD {{$flight->plus_fare_usd}}@endif<span class="divider">|</span><span class="pkg"><small>@if($flight->route_type == 0) non-stop @else 1 stop ({{$flight->via}}) @endif</small></span></li>
                                                </ul>

                                                <div class="block-info f-grid-info">
                                                    <div class="f-grid-desc">
                                                        <span class="f-grid-time"><i class="fa fa-plane"></i>{{$flight->flight}} - {{$flight->flight_no}}</span>
                                                        <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight->duration}}</span>
                                                        <h3 class="block-title"><a href="#">{{$flight->from}} to {{$flight->to}}</a></h3>
                                                        <p class="block-minor"><span>Class : PLUS</span> Economy</p>
                                                        <div class="col-xs-12">
                                                            <p class="small">{{$flight->name}}</p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p class="small">
                                                                <i class="fa fa-info"></i> <a href="#" data-target="#Policy{{$flight->id}}" data-toggle="modal">Ticket Policy</a>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <p class="small">
                                                                <i class="fa fa-info"></i> <a href="#" data-toggle="modal" data-target="#plusfare{{$flight->id}}"> More Fares</a>
                                                            </p>
                                                        </div>
                                                    </div><!-- end f-grid-desc -->
                                                    <div class="clearfix"></div>
                                                    <div class="clearfix"></div>
                                                    <div class="f-grid-timing">
                                                        <ul class="list-unstyled">
                                                            <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (DEP : {{$flight->dep}})</li>
                                                            <li><span><i class="fa fa-plane"></i></span><span class="date">{{$checkdate}}</span> (ETA : {{$flight->eta}})</li>
                                                        </ul>
                                                    </div><!-- end flight-timing -->

                                                    <div class="grid-btn">
                                                        <p class="small text-center">Ticket Fare is based on per person</p>
                                                        <a href="#" data-toggle="modal" data-target="#plusfare{{$flight->id}}" class="btn btn-orange btn-block btn-lg">Select</a>
                                                    </div><!-- end grid-btn -->
                                                </div><!-- end f-grid-info -->
                                            </div><!-- end f-grid-block -->
                                        </div><!-- end columns -->
                                    @endif
                                    @endif
                                @endforeach

                        </div><!-- end row -->

                        <div class="row text-center">
                            {!! $data->appends(request()->input())->links() !!}
                        </div><!-- end pages -->
                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar filter-box">
                        <div class="row">
                            <form action="{{url('/search/flights/oneway')}}" method="get" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <span style="font-weight: bold; font-size: larger; color: #ac0072;" class="text-center"><hr> <i class="fa fa-search"></i> Filter Flight Search <hr></span>
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label for="airline">Select Airlines</label>
                                    <select name="airline" id="airline" class="form-control">
                                        <option value="" @if(!$request->airline) selected @endif>All Airlines</option>
                                        @foreach($airlines as $item)
                                        <option value="{{$item->code}}" @if($request->airline == $item->code) selected @endif>{{$item->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div><!-- end columns -->
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label for="time">Flight Time</label>
                                    <select name="tm_cat" id="time" class="form-control">
                                        <option value="" @if(!$request->tm_cat) selected @endif>All Time Flights</option>
                                        <option value="Morning" @if($request->tm_cat == "Morning") selected @endif>Morning Flight</option>
                                        <option value="Afternoon" @if($request->tm_cat == "Afternoon") selected @endif>Afternoon Flight</option>
                                        <option value="Evening" @if($request->tm_cat == "Evening") selected @endif>Evening Flight</option>
                                        <option value="Night" @if($request->tm_cat == "Night") selected @endif>Night Flight</option>
                                    </select>
                                </div>
                            </div><!-- end columns -->
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                <label for="class">Flight Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="" @if(!$request->class) selected @endif>All Classes</option>
                                    <option value="1" @if($request->class == 1) selected @endif>Eco Saver</option>
                                    <option value="2" @if($request->class == 2) selected @endif>Eco Plus</option>
                                </select>
                                </div>
                            </div>
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="form-group">
                                        <label for="origin">Origin</label>
                                        <select name="from" class="form-control" id="origin">
                                            @foreach($sector as $item)
                                                <option value="{{$item->code}}" @if($from->name == $item->name) selected @endif>{{$item->name}} ({{$item->code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="form-group">
                                        <label for="origin">Arrival</label>
                                        <select name="to" class="form-control" id="origin">
                                            @foreach($sector as $item)
                                                <option value="{{$item->code}}" @if($to->name == $item->name) selected @endif>{{$item->name}} ({{$item->code}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label for="checkdate">Flight Date</label>
                                    <input type="text" name="date" id="checkdate" class="form-control dpd1" value="{{$date}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label for="passenger">Passengers</label>
                                </div>
                                <div class="row" style="margin-bottom: 15px;">
                                <div class="col-xs-4 pull-left">
                                    <label for="" class="small">Adult</label>
                                    <input name="adults" type="number" class="form-control" value="{{$adult}}">
                                </div>
                                <div class="col-xs-4 pull-left">
                                    <label for="" class="small">Child</label>
                                    <input name="child" type="number" class="form-control"  value="{{$child}}">
                                </div>
                                <div class="col-xs-4 pull-left">
                                    <label for="" class="small">Infant</label>
                                    <input name="infant" type="number" class="form-control" value="{{$infant}}">
                                </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="form-group">
                                        <label for="nation">Nationality</label>
                                        <select name="nation" id="nation" class="form-control">
                                            <option value="1" @if($request->nation == 1) selected @endif>Foreigner</option>
                                            <option value="2" @if($request->nation == 2) selected @endif>Local</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
                                    <br>
                                <button type="submit" class="btn btn-black form-control">Search Again</button>
                                    <hr>
                                </div>
                            </div>
                            </form>
                        </div><!-- end row -->
                    </div><!-- end columns -->

                </div><!-- end row -->
                <div class="clearfix" style="height: 50px;"></div>
            </div><!-- end container -->
        </div><!-- end hotel-details -->
    </section>
    @endsection