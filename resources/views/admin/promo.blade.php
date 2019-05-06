@extends('layouts.admin.template')
@section('title','Promo Manage')
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    @stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>Promo Manage</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @foreach($data as $item)
                        <!-- Available Dates Tables -->
                            <div id="Adate{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Coupon Availability</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                @foreach(unserialize($item->active_dates) as $dates)
                                                    <?php $time = strtotime($dates);
                                                    $newformat = date('d M Y (D)',$time);
                                                    ?>
                                                    <div class="col-sm-6 col-xs-6 col-md-4 btn-primary btn-sm btn-rect">{{$newformat}}</div>
                                                @endforeach
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end dates tables-->
                        <!-- Available Flight -->
                            <div id="flight{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Allowed Flights</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                @foreach(unserialize($item->flights) as $flight)
                                                <?php $ticket = \App\tickets::find($flight);?>
                                                <div class="col-md-12 well">
                                                {{$ticket->flight}} {{$ticket->flight_no}} / {{$ticket->from}} to {{$ticket->to}} / ETD {{$ticket->dep}} - ETA {{$ticket->eta}} @if($ticket->via) (via {{$ticket->via}}) @endif
                                                </div>
                                                @endforeach
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <!-- end -->
                        <div class="col-lg-4 col-md-4">
                            <div class="col-lg-12 well">
                                <i class="fa fa-key"></i> Code : <b>{{$item->keys}}</b> <br>
                                <i class="fa fa-money"></i> Save : <b>MMK {{$item->fare_off_mm}}</b> <br>
                                <i class="fa fa-money"></i> Save : <b>USD {{$item->fare_off_usd}}</b>
                                <div class="clearfix"></div>
                                <br>
                                <a href="#" data-toggle="modal" data-target="#flight{{$item->id}}" class="btn btn-default btn-sm pull-left"> <i class="fa fa-plane"></i> Allow Flights</a>
                                <a href="#" data-toggle="modal" data-target="#Adate{{$item->id}}" class="btn btn-default btn-sm pull-right"> <i class="fa fa-calendar"></i> Allow Dates</a>
                                <div class="clearfix"></div>
                                <br>
                                <a href="{{url('/admin/promo/delete/'.$item->id)}}" class="btn btn-xs btn-danger pull-left"> <i class="fa fa-trash"></i> Delete </a>
                                <a href="{{url('/admin/promo/edit/'.$item->id)}}" class="btn btn-xs btn-warning pull-right"> <i class="fa fa-pencil"></i> Edit </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endforeach
                </div>
                <div class="col-lg-12 col-md-12">
                    {!! $data->links() !!}
                </div>
            </div>

        </div>




    </div>
    @stop
@section('script')
    <script src="{{url('/assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{url('/assets/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{url('/assets/plugins/flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('/assets/plugins/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('/assets/js/for_index.js')}}"></script>
    @endsection