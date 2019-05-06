@extends('layouts.admin.template')
@section('title') {{$data->name}}'s Message @stop
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    @stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>{{$data->subject}}</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <b>Message - </b>{{$data->message}}
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 col-md-12">
                <hr>
                </div>
                <div class="col-lg-4 col-md-4"><b>Name : </b>{{$data->name}}</div>
                <div class="col-lg-4 col-md-4"><b>Email : </b>{{$data->email}}</div>
                <div class="col-lg-4 col-md-4"><a href="mailto:{{$data->email}}" class="btn btn-sm btn-default"><i class="fa fa-mail-reply"></i></a></div>
            </div>




        </div>




    </div>
    @stop
@section('script')
    <script src="{{url('/assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{url('/assets/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{url('/assets/plugins/flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('/assets/plugins/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('/assets/js/for_index.js')}}"></script>
    @endsection