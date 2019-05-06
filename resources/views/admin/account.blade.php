@extends('layouts.admin.template')
@section('title','Social Account Setting')
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


                    <h2>Socail Account Setting</h2>



                </div>
            </div>

            <hr />
            <form action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Facebook</label>
                        <div class="input-group">
                            <input name="facebook" class="form-control" type="text" @if($data->facebook) value="{{$data->facebook}}" @else placeholder="Facebook Link" @endif/>
                            <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Twitter</label>
                        <div class="input-group">
                            <input name="twitter" class="form-control" type="text" @if($data->twitter) value="{{$data->twitter}}" @else placeholder="Twitter Link" @endif/>
                            <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Youtube</label>
                        <div class="input-group">
                            <input name="youtube" class="form-control" type="text" @if($data->youtube) value="{{$data->youtube}}" @else placeholder="Youtube Link" @endif/>
                            <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Pinterest</label>
                        <div class="input-group">
                            <input name="pinterest" class="form-control" type="text" @if($data->pinterest) value="{{$data->pinterest}}" @else placeholder="Pinterest Link" @endif/>
                            <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="">Google Plus</label>
                        <div class="input-group">
                            <input name="google_plus" class="form-control" type="text" @if($data->google_plus) value="{{$data->google_plus}}" @else placeholder="Google Plus Link" @endif/>
                            <span class="input-group-addon"><i class="fa fa-google-plus-official"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <div class="input-group">
                                <input name="instagram" class="form-control" type="text" @if($data->instagram) value="{{$data->instagram}}" @else placeholder="Instagram Link" @endif/>
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                            </div>
                        </div>
                </div>
            </div>
            <hr>
                <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-save"></i> Update </button>
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