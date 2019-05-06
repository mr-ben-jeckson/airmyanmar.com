@extends('layouts.admin.template')
@section('title','Booking Room')
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


                    <h2>Bookings {{count($booking)}}</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <form action="{{url('admin/booking/filter')}}" method="get" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="col-lg-4 form-group">
                        <label>Find by Booking ID</label>
                        <input type="text" class="form-control" name="bid" placeholder="Booking ID">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Find by Booking Date</label>
                        <input type="text" class="form-control" name="booking_date" placeholder="MM/DD/YYYY" id="dp2" data-date-format="mm/dd/yyyy">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Find by Travel Date</label>
                        <input type="text" class="form-control" name="dep_date" placeholder="MM/DD/YYYY" id="dp3" data-date-format="mm/dd/yyyy">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Find by Customer Email</label>
                        <input type="email" class="form-control" name="c_email" placeholder="Email">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Find by Airline PNR</label>
                        <input type="text" class="form-control" name="pnr" placeholder="PNR">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label>Find by Status</label>
                        <select name="status" class="form-control" tabindex="2">
                            <option value="">All</option>
                            <option value="1">Processing List</option>
                            <option value="2">Awaiting Payment</option>
                            <option value="3">Completed List</option>
                            <option value="4">Final Completed</option>
                            <option value="5">Cancelled as Fully Booked</option>
                            <option value="6">Cancelled List</option>
                        </select>
                    </div>
                    <div class="col-lg-12 form-group">
                        <a href="{{url('/admin/booking')}}" class="btn btn-default pull-left">Show All</a>
                        <button type="submit" class="btn btn-success pull-right"> Find Now </button>
                    </div>
                </div>
                </form>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    @foreach($booking as $item)
                        <?php $time = strtotime($item->dep_date); $time1 = strtotime($item->return_date);
 $departure = date('l, M d, Y',$time); $arrival = date('l, M d, Y',$time1); if ($item->route == "oneway"){ $flight = \App\tickets::find($item->ticket);}else{( $flight = \App\tickets::find(unserialize($item->ticket)['0']));}?>
                    <div class="col-lg-4">
                        <div class="col-lg-12 booking-box">
                        @if($item->status == 1)
                        <i class="fa fa-bell" style="color: #ffe128;"></i> Processing List
                        @elseif($item->status == 2)
                        <i class="fa fa-bell" style="color: #04ff39;"></i> Awaiting Payment
                        @elseif($item->status == 3)
                        <i class="fa fa-bell" style="color: #0a510e;"></i> Completed
                        @elseif($item->status == 4)
                        <i class="fa fa-bell" style="color: #ac0072;"></i> Final Completed
                        @elseif($item->status == 5)
                        <i class="fa fa-bell" style="color: #7c7c7c;"></i> Cancelled as Fully Booked
                        @else
                        <i class="fa fa-bell" style="color: #ff0003;"></i> Cancelled
                        @endif
                            <hr>
                            <i class="fa fa-key"></i> ID : <b>{{$item->booking_id}}</b><br>
                            <i class="fa fa-user-secret"></i>Username : <b>{{$item->customer}}</b><br>
                            <i class="fa fa-plane"></i> Route : <b>@if($item->route == "oneway") One Way Flight @else Round Flights @endif</b> <br>
                            <i class="fa fa-users"></i> Passenger : <b>{{(unserialize($item->pax)['adult'])+(unserialize($item->pax)['child'])+(unserialize($item->pax)['infant'])}}</b> <br>
                            <i class="fa fa-calendar-check-o"></i> Travel Date : <b>{{$departure}}</b> <br>
                            <i class="fa fa-calendar-check-o"></i> Return Date : @if($item->route == "oneway") <b>None</b> @else <b>{{$arrival}}</b> @endif <br>
                            <i class="fa fa-map"></i> Sectors : @if($item->route == "oneway")<b>{{$flight->from}}</b> to <b>{{$flight->to}}</b> @else <b>{{$flight->from}}</b> to <b>{{$flight->to}}</b> to <b>{{$flight->from}}</b> @endif
                            <br>
                            <i class="icon-calendar"></i> Booking Date: <b>{{$item->booking_date}}</b>
                            <hr>
                            <a href="{{url('/admin/booking/detail/'.$item->id)}}" class="btn btn-primary btn-block"> <i class="fa fa-eye"></i> View Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    {{$booking->links()}}
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