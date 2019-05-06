@extends('layouts.admin.template')
@section('title','Edit Coupon')
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


                    <h2>Edit Coupon</h2>



                </div>
            </div>

            <hr />
            <form action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="">Allow Flight Tickets</label>
                        <select name="flights[]" data-placeholder="Choose Flights"  class="form-control chzn-select" multiple="multiple" tabindex="4" style="height:25px;">
                            @foreach($data as $item)
                                <option value="{{$item->id}}" @if(in_array($item->id,unserialize($coupon->flights))) selected @endif>{{$item->flight}}-{{$item->flight_no}} {{$item->from}}-{{$item->to}} {{$item->dep}} - {{$item->eta}} @if($item->via) via ({{$item->via}})@endif</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="">Allow Travel Dates</label>
                        <input type="text" name="adates" class="form-control date" id="date" value="@foreach(unserialize($coupon->active_dates) as $date){{$date}}@if(!$loop->last),@endif @endforeach" required/>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Promo Code</label>
                        <input type="text" class="form-control" name="keys" value="{{$coupon->keys}}" placeholder="XXXXXXXX" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Save Per Person</label>
                        <div class="input-group">
                            <input name="fare_off_mm" value="{{$coupon->fare_off_mm}}" class="form-control" type="number" required/>
                            <span class="input-group-addon">MMK</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Save Per Person</label>
                        <div class="input-group">
                            <input name="fare_off_usd" value="{{$coupon->fare_off_usd}}" class="form-control" type="number" required/>
                            <span class="input-group-addon">USD</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 col-md-12">
                    <hr>
                    <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-save"></i> Save </button>
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