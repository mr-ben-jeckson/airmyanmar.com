@extends('layouts.admin.template')
@section('title','Edit Airline '. $data->name)
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


                    <h2>Edit Airline Detail</h2>

                    <hr>

                </div>

                <form action="#" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-lg-6 mb15">
                        <div class="form-group">
                            <label for="" class="control-label col-lg-3">Name</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$data->name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb15">
                        <div class="form-group">
                            <label for="" class="control-label col-lg-3">Code</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="code" type="text" value="{{$data->code}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 mb15">
                        <div class="form-group">
                            <label class="control-label col-lg-4">Available Routing Airports</label>

                            <div class="col-lg-8">
                                <select name="routes[]" data-placeholder="Choose Route Airports"  class="form-control chzn-select" multiple="multiple" tabindex="4" style="height:25px;">
                                    @foreach($cities as $item)
                                        <option value="{{$item->id}}" @if(in_array($item->id,unserialize($data->routes))) selected @endif>{{$item->name}} ({{$item->code}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 mb15">
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-lg-9">Selected Airline Logo <br> <span class="small"><a
                                            href="{{url('/images/airlines/'.$data->logo)}}" target="_blank"><i class="fa fa-image"></i> {{$data->logo}}</span></a> </label>
                            <div class="col-lg-3">
                                <input name="logo" type="file" accept="image/png">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 mb15">
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-lg-9">Selected Airline Gallery <br><span class="small">@foreach(unserialize($data->img) as $img)
                                        <a href="{{url('/images/'.$img)}}" target="_blank"><i class="fa fa-image"></i> {{$img}}</a>@if(!$loop->last),@endif @endforeach</span></label>
                            <div class="col-lg-3">
                                <input name="img[]" type="file" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <hr>
                        <label class="control-label col-lg-12">Content Description</label>
                        <div class="box">
                            <div id="cleditorDiv" class="body collapse in">
                                <textarea name="content" id="cleditor" class="form-control" required>{!! $data->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <hr>
                    <button type="submit" class="btn btn-success pull-left"> <i class="fa fa-save"></i> Save Airline</button>
                    </div>
                </form>
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