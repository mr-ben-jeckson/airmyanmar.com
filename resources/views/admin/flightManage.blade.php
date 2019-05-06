@extends('layouts.admin.template')
@section('title','Manage Flight Tickets')
@section('style')
    <link href="{{url('/assets/css/jquery-ui.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('/assets/plugins/uniform/themes/default/css/uniform.default.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/chosen/chosen.min.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/tagsinput/jquery.tagsinput.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/timepicker/css/bootstrap-timepicker.min.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/switch/static/stylesheets/bootstrap-switch.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/CLEditor1_4_3/jquery.cleditor.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/css/jquery.cleditor-hack.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-wysihtml5-hack.css')}}" />
    <style>
        ul.wysihtml5-toolbar > li {
            position: relative;
        }
        .flightbox{
            border: 1px solid #3c3c3c;
            border-radius: 25px;
            padding: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .flight-text{
            font-weight: bold;
        }
    </style>
    @stop
@section('content')
    <div id="content">
        <div class="inner" style="min-height:1200px;">
            <div class="row">

                <div class="col-lg-12">


                    <h2> <i class="fa fa-cogs" aria-hidden="true"></i> Manage Tickets</h2>
                    <hr>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach($tickets as $item)
                    <div class="col-md-12 flightbox">
                        <div class="col-lg-3">
                            <img src="{{url('/images/airlines/'.$item->logo)}}" class="img-responsive" alt="">
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <h2 style="text-align: center;">{{$item->from}}</h2>
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <h2 style="text-align: center;"><i class="fa fa-plane"></i></h2>
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <h2 style="text-align: center;">{{$item->to}}</h2>
                        </div>
                        <div class="col-lg-3">
                            <h2 style="text-align: center;">{{$item->flight}} {{$item->flight_no}}</h2>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="col-lg-4">
                            <span class="flight-text">Route Type:</span> @if($item->route_type == 0)Non Stop @else One Stop at ({{$item->via}})@endif
                            <br>
                            <span class="flight-text">Time Range:</span> {{$item->tm_cat}} flight <br>
                            <span class="flight-text">Dates:</span>
                            <hr>
                            <a href="#" class="btn btn-default btn-xs btn-line" data-toggle="modal" data-target="#Adate{{$item->id}}">Check Available Dates</a>
                        </div>
                        <div class="col-lg-4">
                            <span class="flight-text">DEP :</span> {{$item->dep}} <br>
                            <span class="flight-text">ETA :</span> {{$item->eta}} <br>
                            <span class="flight-text">Duration :</span> {{$item->duration}} <hr>
                            <a href="#" class="btn btn-default btn-xs btn-line" data-toggle="modal" data-target="#Fare{{$item->id}}">Check Fare Detail</a>
                        </div>
                        <div class="col-lg-4" style="margin-top: 20px;">
                            <div class="col-lg-6 "><a href="{{url('/admin/flight/edit/'.$item->id)}}" class="btn btn-default pull-left"><i class="fa fa-edit fa-2x"></i></a></div>
                            <div class="col-lg-6 "><a href="{{url('/admin/flight/delete/'.$item->id)}}" class="btn btn-default pull-right"><i class="fa fa-trash fa-2x"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Available Dates Tables -->
                        <div id="Adate{{$item->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Flight Availability</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            @foreach(unserialize($item->adates) as $dates)
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
                    <!-- fare table modal-->
                        <div id="Fare{{$item->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Flight Fare Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Eco Saver Class</h2>
                                        <hr>
                                        <table class="table table-responsive table-hover">
                                            <thead>
                                            <th>
                                                Adult
                                            </th>
                                            <th>
                                                Child
                                            </th>
                                            <th>
                                                Infant
                                            </th>
                                            </thead>
                                            <tr>
                                                <td><h4>USD {{$item->saver_fare_usd}}</h4></td>
                                                <td><h4>USD {{$item->saver_fare_child_usd}}</h4></td>
                                                <td><h4>USD {{$item->saver_fare_infant_usd}}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>MMK {{$item->saver_fare_mm}}</h4></td>
                                                <td><h4>MMK {{$item->saver_fare_child_mm}}</h4></td>
                                                <td><h4>MMK {{$item->saver_fare_infant_mm}}</h4></td>
                                            </tr>
                                        </table>
                                        <h2>
                                        Eco Plus Class
                                        </h2>
                                        <table class="table table-responsive table-hover">
                                            <thead>
                                            <th>
                                                Adult
                                            </th>
                                            <th>
                                                Child
                                            </th>
                                            <th>
                                                Infant
                                            </th>
                                            </thead>
                                            <tr>
                                                <td><h4>USD {{$item->plus_fare_usd}}</h4></td>
                                                <td><h4>USD {{$item->plus_fare_child_usd}}</h4></td>
                                                <td><h4>USD {{$item->plus_fare_infant_usd}}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>MMK {{$item->plus_fare_mm}}</h4></td>
                                                <td><h4>MMK {{$item->plus_fare_child_mm}}</h4></td>
                                                <td><h4>MMK {{$item->plus_fare_infant_mm}}</h4></td>
                                            </tr>
                                        </table>
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--fare table modal-->
                        @endforeach
                </div>
                <div class="col-lg-12 text-center">
                    {!! $tickets->links() !!}
                </div>
            </div>

        </div>
        </div>




    </div>
@stop
@section('script')
    <script src="{{url('/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{url('/assets/plugins/uniform/jquery.uniform.min.js')}}"></script>
    <script src="{{url('/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js')}}"></script>
    <script src="{{url('/assets/plugins/chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{url('/assets/plugins/colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{url('/assets/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
    <script src="{{url('/assets/plugins/validVal/js/jquery.validVal.min.js')}}"></script>
    <script src="{{url('/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('/assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{url('/assets/plugins/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('/assets/plugins/timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{url('/assets/plugins/switch/static/js/bootstrap-switch.min.js')}}"></script>
    <script src="{{url('/assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js')}}"></script>
    <script src="{{url('/assets/plugins/autosize/jquery.autosize.min.js')}}"></script>
    <script src="{{url('/assets/plugins/jasny/js/bootstrap-inputmask.js')}}"></script>
    <script src="{{url('/assets/js/calender.js')}}"></script>
    <script src="{{url('/assets/js/formsInit.js')}}"></script>
    <script src="{{url('/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js')}}"></script>
    <script>
        $(function () { formInit(); });
    </script>

    @endsection