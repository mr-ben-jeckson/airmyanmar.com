@extends('layouts.admin.template')
@section('title') {{$customer->name}}'s Detail @stop
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    @stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>{{$customer->name}}</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-6 col-md-6"><b>Username - </b> {{$customer->name}}</div>
                    <div class="col-lg-6 col-md-6"><b>Email - </b> {{$customer->email}}</div>
                    <div class="col-lg-6 col-md-6"><b>Points - </b> {{$point}}</div>
                    <div class="col-lg-6 col-md-6"><b>Joined at - </b> {{$customer->created_at->format('m d Y')}}</div>
                </div>
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