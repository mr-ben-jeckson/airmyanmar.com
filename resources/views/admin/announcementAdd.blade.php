@extends('layouts.admin.template')
@section('title','Add Announcement')
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


                    <h2>Add Announcement</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <form action="#" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Announcement" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="">Validate</label>
                            <input type="text" name="validate" class="form-control" id="reportrange" required>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Keywords</label>
                            <input name="keywords" id="tags" value="myanmar flight center, airmyanmar, promotions, seasonal promotions" class="form-control" required/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <input type="text" name="meta_description" value="Myanmar Flight Center - Promotion -" class="form-control" required>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12">
                        <label for="">Content</label>
                        <div class="box">
                            <div id="cleditorDiv" class="body collapse in">
                                <textarea name="content" id="cleditor" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="">Visibility</label>
                            <select name="status" data-placeholder="Select Status" class="form-control chzn-select" tabindex="2" required>
                                <option value=""></option>
                                <option value="1">Visible</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="">Photo (820*440 MIN)</label>
                            <input type="file" name="img" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control"> <i class="fa fa-save"></i> Add New Now </button>
                        </div>
                    </div>
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