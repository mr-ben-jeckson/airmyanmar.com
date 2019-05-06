@extends('layouts.admin.template')
@section('title','Add Flight Ticket')
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


                    <h2>Add Flight Ticket</h2>



                </div>
            </div>

            <hr />
            <form action="#" method="post" enctype="multipart/form-data">
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
                            <select name="flight" data-placeholder="Select Airline" class="form-control chzn-select" tabindex="2" required>
                                <option value=""></option>
                                @foreach($airlines as $item)
                                    <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="margin-bottom: 15px;">
                    <div class="form-group">
                        <label class="control-label col-lg-3">No.</label>

                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="flight_no" class="form-control" type="text" data-mask="999" required/>
                                <span class="input-group-addon">No</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Route</label>

                        <div class="col-lg-9">
                            <select name="route_type" data-placeholder="Route Type" id="routeselector" class="form-control chzn-select" tabindex="2">
                                <option value=""></option>
                                <option value="0">Non Stop</option>
                                <option value="1">One Stop</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb15">
                    <div class="form-group stop" id="0">
                    </div>
                    <div class="form-group stop" id="1">
                        <label class="control-label col-lg-3">Stop</label>

                        <div class="col-lg-9">
                            <select name="via" data-placeholder="Select Airport" class="form-control chzn-select" tabindex="2">
                                <option value=""></option>
                                @foreach($cities as $item)
                                    <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-12">Available Dates</label>
                        <div class="col-lg-12">
                        <input type="text" name="adates" class="form-control date" id="date" required/>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-6 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Depart</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="dep" class="form-control" type="text" data-mask="99:99" required/>
                                <span class="input-group-addon">Time</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Arrival</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="eta" class="form-control" type="text" data-mask="99:99" required/>
                                <span class="input-group-addon">Time</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Schedule</label>

                        <div class="col-lg-9">
                            <select name="tm_cat" data-placeholder="Time Category" class="form-control chzn-select" tabindex="2" required>
                                <option value=""></option>
                                <option value="Morning">Morning Flight</option>
                                <option value="Afternoon">Afternoon Flight</option>
                                <option value="Evening">Evening Flight</option>
                                <option value="Night">Night Flight</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Duration</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="duration" class="form-control" type="text" data-mask="99 hr 99 min" required/>
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Seats</label>

                        <div class="col-lg-9">
                            <select name="words" data-placeholder="Available Seat" class="form-control chzn-select" tabindex="2" required>
                                <option value=""></option>
                                <option value="all">all</option>
                                @for($x=1;$x<7;$x++)
                                <option value="{{$x}} seat left">{{$x}} seat left</option>
                                    @endfor
                                <option value="promotion seat">promotion seat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 mb15">
                    <h4><i class="fa fa-info-circle"></i> Fare Section</h4>
                    <hr>
                </div>
                <div class="col-lg-12 mb15">
                    <label class="control-label col-lg-12"><i class="fa fa-suitcase"></i> Eco Saver Class</label>
                </div>
                <div class="clearfix"></div>
                    <div class="col-lg-4 mb15">
                        <div class="form-group">
                            <label class="control-label col-lg-3">Adult</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input name="saver_fare_usd" class="form-control" type="number" required/>
                                    <span class="input-group-addon">USD</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Child</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="saver_fare_child_usd" class="form-control" type="number" required/>
                                <span class="input-group-addon">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Infant</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="saver_fare_infant_usd" class="form-control" type="number" required/>
                                <span class="input-group-addon">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Adult</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="saver_fare_mm" class="form-control" type="number" required/>
                                <span class="input-group-addon">MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Child</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="saver_fare_child_mm" class="form-control" type="number" required/>
                                <span class="input-group-addon">MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Infant</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="saver_fare_infant_mm" class="form-control" type="number" required/>
                                <span class="input-group-addon">MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 mb15">
                    <label class="control-label col-lg-12"><i class="fa fa-suitcase"></i> Eco Plus Class</label>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Adult</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="plus_fare_usd" class="form-control" type="number" required/>
                                <span class="input-group-addon">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Child</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="plus_fare_child_usd" class="form-control" type="number" required/>
                                <span class="input-group-addon">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Infant</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="plus_fare_infant_usd" class="form-control" type="number" required/>
                                <span class="input-group-addon">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Adult</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="plus_fare_mm" class="form-control" type="number" required/>
                                <span class="input-group-addon">MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Child</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="plus_fare_child_mm" class="form-control" type="number" required/>
                                <span class="input-group-addon">MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb15">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Infant</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input name="plus_fare_infant_mm" class="form-control" type="number" required/>
                                <span class="input-group-addon">MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 mb15">
                    <h4><i class="fa fa-info-circle"></i> Policy Section</h4>
                    <hr>
                </div>
                <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <label class="control-label col-lg-12">Set Policy</label>
                                        <div class="box">
                                            <div id="cleditorDiv" class="body collapse in">
                                                <textarea name="policy" id="cleditor" class="form-control" required><ul><li>Ticket is not refundable</li><li>Allow 24 kg baggage and 7 kg hand carry</li><li>Cancellation is allowed as Airlines' policies</li><li>Name change allowed with fee&nbsp;</li><li>Fare include airport charge and tax<br></li></ul></textarea>
                                            </div>
                                        </div>
                    </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success col-lg-12">Add to Ticket Listings</button>
                    </div>
                </div>
            </div>

            </form>
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