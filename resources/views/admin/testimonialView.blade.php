@extends('layouts.admin.template')
@section('title') {{$data->name}}'s Feedback @stop
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

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>{{$data->name}}'s Feedback</h2>



                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4 well">
                        @if($data->img)
                        <img src="{{url('/images/testimonial/'.$data->img)}}" class="img-circle center-block" style="width: 170px;" alt="">
                        @else
                        <img src="{{url('/images/testimonial/user.png')}}" class="img-circle center-block" style="width: 170px;" alt="">
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="col-xs-6"><b><i class="fa fa-user"></i> Name</b></div>
                        <div class="col-xs-6">{{$data->name}}</div>
                        <div class="col-xs-6"><b><i class="fa fa-sort-numeric-asc"></i> Booking ID</b></div>
                        <div class="col-xs-6">{{$data->booking_id}}</div>
                        <div class="col-xs-6"><b><i class="fa fa-globe"></i> Nationality</b></div>
                        <div class="col-xs-6">{{$data->nation}}</div>
                        <div class="col-xs-6"><b><i class="fa fa-calendar"></i> Travel Date</b></div>
                        <div class="col-xs-6">{{$data->travel_date}}</div>
                        <div class="col-xs-6"><b><i class="fa fa-trophy"></i> Rating</b></div>
                        <div class="col-xs-6">@foreach(range(1,$data->points) as $x) <i class="fa fa-star"></i> @endforeach</div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6">
                            <b><i class="fa fa-eye"></i> Visibility</b>
                        </div>
                        <div class="col-xs-6">
                            <div class="make-switch switch-mini">
                                <input type="checkbox" @if($data->status == 1)checked="checked" onchange="window.location.href='{{url('/admin/testimonial/hide/'.$data->id)}}'" @else onchange="window.location.href='{{url('/admin/testimonial/show/'.$data->id)}}'" @endif  />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-4 col-md-4 well">
                        <i class="fa fa-quote-left fa-2x"></i> {{$data->content}} <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="clearfix"></div>
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