@extends('layouts.admin.template')
@section('title','Booking Detail '.$data->booking_id)
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
    </style>
@stop
@section('content')
<div id="content">
    <div class="modal" id="changeDate" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-calendar-check-o"></i> Change Departure Date</h4>
                </div>
                <form action="{{url('/admin/booking/change/dep/date/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="modal-body">
                    <div class="input-group">
                        <input name="dep_date" value="{{$data->dep_date}}" class="form-control" type="text" data-mask="99/99/9999" required="">
                        <span class="input-group-addon">Date</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save change</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal" id="changeDate1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-calendar-check-o"></i> Change Return Date</h4>
                </div>
                <form action="{{url('/admin/booking/change/return/date/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="input-group">
                            <input name="return_date" value="{{$data->return_date}}" class="form-control" type="text" data-mask="99/99/9999" required="">
                            <span class="input-group-addon">Date</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save change</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h3>{{$data->customer}}</h3>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="booking-box">
                        <div class="col-lg-12">
                            <h4>Booking Detail</h4>
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            @if($data->status == 1)
                                <i class="fa fa-bell" style="color: #ffe128;"></i> Status  - <b>Processing List</b>
                            @elseif($data->status == 2)
                                <i class="fa fa-bell" style="color: #04ff39;"></i> Status - <b>Awaiting Payment</b>
                            @elseif($data->status == 3)
                                <i class="fa fa-bell" style="color: #0a510e;"></i> Status - <b>Completed</b>
                            @elseif($data->status == 4)
                                <i class="fa fa-bell" style="color: #ac0072;"></i> Status - <b>Final Completed</b>
                            @elseif($data->status == 5)
                                <i class="fa fa-bell" style="color: #7c7c7c;"></i> Status -  <b>Cancelled as Fully Booked</b>
                            @else
                                <i class="fa fa-bell" style="color: #ff0003;"></i> Status - <b>Cancelled</b>
                            @endif
                            <br>
                            <i class="fa fa-key"></i> Booking ID - <b>{{$data->booking_id}}</b> <br>
                            <i class="fa fa-calendar"></i> Booking Date - <b>{{$data->booking_date}}</b>
                        </div>
                        <div class="col-lg-4">
                            <i class="fa fa-user"></i> Customer Name -  <b>{{$data->customer}}</b><br>
                            <i class="fa fa-envelope"></i> Customer Mail - <b>{{$data->c_email}}</b><br>
                            <i class="fa fa-eye"></i> Airline PNR - <b>@if($data->pnr == null) XXXXXX @else{{$data->pnr}}@endif</b>
                        </div>
                        <div class="col-lg-4">
                            <i class="fa fa-user"></i> Adult/s -  <b>{{unserialize($data->pax)['adult']}}</b><br>
                            <i class="fa fa-user"></i> Child/s -  <b>{{unserialize($data->pax)['child']}}</b><br>
                            <i class="fa fa-user"></i> Infant/s -  <b>{{unserialize($data->pax)['infant']}}</b>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booking-box">
                        <div class="col-lg-12">
                            <h4>Flight Detail [@if($data->route == "oneway") One Way @else Round Trip @endif]</h4>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <i class="fa fa-calendar-check-o"></i> Depart Date - <b>{{$data->dep_date}} <a href="#" data-toggle="modal" data-target="#changeDate" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a></b>
                        </div>
                        <div class="col-lg-6">
                            <i class="fa fa-calendar-check-o"></i> Return Date - <b>@if($data->route == "oneway") None @else{{$data->return_date}} <a href="#" data-toggle="modal" data-target="#changeDate1" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>@endif</b>
                        </div>
                        <div class="col-lg-12">

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booking-box">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <img src="{{url('images/airlines/'.$airline->logo)}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-lg-3">
                                <i class="fa fa-plane"></i> From : <b>{{$ticket->from}}</b> <br>
                                <i class="fa fa-plane"></i> To : <b>{{$ticket->to}}</b> <br>
                                <li class="fa fa-steam"></li> Route Type : <b>@if($ticket->route_type == 0) Direct @else via {{$ticket->via}} @endif</b>
                            </div>
                            <div class="col-lg-3">
                                <i class="fa fa-clock-o"></i> DEP : <b>{{$ticket->dep}}</b> <br>
                                <i class="fa fa-clock-o"></i> ETA : <b>{{$ticket->eta}}</b> <br>
                                <li class="fa fa-calendar-minus-o"></li> DATE : <b>{{$data->dep_date}}</b>
                            </div>
                            <div class="col-lg-3">
                                <i class="fa fa-check-square"></i> No : <b>{{$ticket->flight}} {{$ticket->flight_no}}</b> <br>
                                <i class="fa fa-suitcase"></i> Class : <b>@if($data->class == 1) Eco Saver @else Eco Plus @endif</b> <br>
                                <i class="fa fa-clock-o"></i> Duration : <b>{{$ticket->duration}}</b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @if($data->route == "round")
                    <div class="col-lg-12">
                        <div class="booking-box">
                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <img src="{{url('images/airlines/'.$airline1->logo)}}" class="img-responsive" alt="">
                                </div>
                                <div class="col-lg-3">
                                    <i class="fa fa-plane"></i> From : <b>{{$ticket1->from}}</b> <br>
                                    <i class="fa fa-plane"></i> To : <b>{{$ticket1->to}}</b> <br>
                                    <li class="fa fa-steam"></li> Route Type : <b>@if($ticket1->route_type == 0) Direct @else via {{$ticket1->via}} @endif</b>
                                </div>
                                <div class="col-lg-3">
                                    <i class="fa fa-clock-o"></i> DEP : <b>{{$ticket1->dep}}</b> <br>
                                    <i class="fa fa-clock-o"></i> ETA : <b>{{$ticket1->eta}}</b> <br>
                                    <li class="fa fa-calendar-minus-o"></li> DATE : <b>{{$data->return_date}}</b>
                                </div>
                                <div class="col-lg-3">
                                    <i class="fa fa-check-square"></i> No : <b>{{$ticket1->flight}} {{$ticket1->flight_no}}</b> <br>
                                    <i class="fa fa-suitcase"></i> Class : <b>@if($data->return_class == 1) Eco Saver @else Eco Plus @endif</b> <br>
                                    <i class="fa fa-clock-o"></i> Duration : <b>{{$ticket1->duration}}</b>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="booking-box">
                        <div class="col-lg-12">
                            <h4>Fare Detail</h4>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <i class="fa fa-ticket"></i> Total - <span class="fare">{{$data->currency}} @if($data->coupon_code) {{$data->total+$data->discount_off}} @else {{$data->total}} @endif</span>
                        </div>
                        <div class="col-lg-6">
                            <i class="fa fa-credit-card-alt"></i> Grand Total - <span class="fare">{{$data->currency}} {{$data->grand_amount}}</span>
                        </div>
                        @if($data->coupon_code)
                            <div class="col-lg-6">
                                <i class="fa fa-dropbox"></i> Coupon - <span class="dis-fare">{{$data->coupon_code}}</span>
                            </div>
                            <div class="col-lg-6">
                                <i class="fa fa-credit-card-alt"></i> Discount - <span class="dis-fare">{{$data->currency}} {{$data->discount_off}}</span>
                            </div>
                        @endif
                        <div class="col-lg-12">

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booking-box">
                        <div class="col-lg-12">
                            <h4>Sale Control</h4>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <i class="fa fa-credit-card"></i> Payment Option - <b>@if($data->pay_opt == 1) 2C2P USD @elseif($data->pay_opt == 2) 2C2P MMK @else Local Mobile Banking @endif</b>
                            <hr>
                            <form action="#" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-lg-4">
                                    <input type="radio" name="status" value="1" @if($data->status == 1) checked @endif>
                                    <label for="">Processing List</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="status" value="2" @if($data->status == 2) checked @endif>
                                    <label for="">Awaiting Payment</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="status" value="3" @if($data->status == 3) checked @endif>
                                    <label for="">Complete</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="status" value="4" @if($data->status == 4) checked @endif>
                                    <label for="">Final Complete</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="status" value="5" @if($data->status == 5) checked @endif>
                                    <label for="">Cancelled as Fully Booked</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="status" value="6" @if($data->status == 6) checked @endif>
                                    <label for="">Cancelled</label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                                @if($data->status == 1 || $data->status == 5)
                                    <div class="col-lg-12 mb15">
                                        <input type="text" name="option" class="form-control" placeholder="Option Flight Link Only" @if($data->status == 5 || $data->status == 1) value="{{$data->option}}" @endif>
                                    </div>
                                @endif
                                <div class="col-lg-4">
                                    <input type="text" name="pnr" class="form-control" placeholder="Air Line PNR" @if($data->pnr) value="{{$data->pnr}}" @else value="" @endif>
                                </div>
                                @if($data->status == 3)
                                    <div class="col-lg-4">
                                        <input type="file" name="ticket" id="tkatt">
                                    </div>
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-default pull-right"> Change Status </button>
                                    </div>
                                @else
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-default pull-right"> Change Status </button>
                                </div>
                                @endif
                            </form>
                        </div>
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">

                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booking-box">
                        <div class="col-lg-12 table-responsive">
                            <h4>Passenger Information</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Given Name + Surname
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Passport
                                </th>
                                <th>
                                    Passport Exp
                                </th>
                                <th>
                                    Nation
                                </th>
                                <th>
                                    DOB
                                </th>
                                </thead>
                                @for($x=0;$x<(unserialize($data->pax)['adult']+unserialize($data->pax)['child']+unserialize($data->pax)['infant']);$x++)
                                <tr>
                                    <td>
                                        {{unserialize($data->passenger_titles)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_names)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_emails)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_mobiles)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_passports)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_passport_exps)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_nationality)[$x]}}
                                    </td>
                                    <td>
                                        {{unserialize($data->passenger_dobs)[$x]}}
                                    </td>
                                </tr>
                                @endfor
                            </table>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12">
                            <h4>Whats' App or Skype ID</h4>
                            <hr>
                            @if($data->number){{$data->number}}@else None @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">

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
