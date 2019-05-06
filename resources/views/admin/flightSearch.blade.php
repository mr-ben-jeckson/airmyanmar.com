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


                    <h2> <i class="fa fa-search" aria-hidden="true"></i> Search Flight Tickets</h2>
                    <hr>


                </div>
            </div>
            <div class="row">
                <form action="{{url('/admin/flights/filter')}}" method="get" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="col-lg-12 mb15">
                        <h4><i class="fa fa-plane"></i> Flight Section</h4>
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6 mb15">
                        <div class="form-group">
                            <label class="control-label col-lg-3">From</label>

                            <div class="col-lg-9">
                                <select name="from" data-placeholder="Select Origin" class="form-control chzn-select" tabindex="2" required>
                                    <option value=""></option>
                                    @foreach($cities as $item)
                                        <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb15">
                        <div class="form-group">
                            <label class="control-label col-lg-3">To</label>

                            <div class="col-lg-9">
                                <select name="to" data-placeholder="Select Arrival" class="form-control chzn-select" tabindex="2" required>
                                    <option value=""></option>
                                    @foreach($cities as $item)
                                        <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb15">
                        <div class="form-group">
                            <label class="control-label col-lg-3">Flight</label>

                            <div class="col-lg-9">
                                <select name="flight" data-placeholder="Select Airline" class="form-control chzn-select" tabindex="2">
                                    <option value=""></option>
                                    @foreach($airlines as $item)
                                        <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb15">
                        <div class="form-group">
                            <label class="control-label col-lg-3">Schedule</label>

                            <div class="col-lg-9">
                                <select name="tm_cat" data-placeholder="Time Category" class="form-control chzn-select" tabindex="2">
                                    <option value=""></option>
                                    <option value="Morning">Morning Flight</option>
                                    <option value="Afternoon">Afternoon Flight</option>
                                    <option value="Evening">Evening Flight</option>
                                    <option value="Night">Night Flight</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <hr>
                        <button type="submit" class="btn btn-default btn-line pull-left">Search Tickets</button>
                    </div>
                </div>
                </form>
                <div class="col-lg-12 text-center">

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