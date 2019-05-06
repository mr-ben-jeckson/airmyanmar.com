@extends('layouts.admin.template')
@section('title', $data->name)
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    <style>
        .airline-box{
            background: rgba(24,24,34,0.59);
            padding: 5px;
        }
    </style>
    @stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2> {{$data->name}}</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                    <h4>{{$data->code}}</h4>
                        <hr>
                    </div>
                    <div class="col-lg-6">
                        <a href="#" class="btn btn-default btn-sm btn-line pull-right"> <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    @foreach(unserialize($data->img) as $img)
                        <div class="col-lg-3 thumbnail">
                            <img src="{{url('/images/'.$img)}}" class="img-responsive" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <hr>
                    <p>
                        {!! $data->content !!}
                    </p>
                </div>
                <div class="col-lg-12 mb15">
                    <hr>
                    <div class="form-group">
                        @foreach($cities as $item)
                            @if(in_array($item->id, unserialize($data->routes)))
                        <a href="#" class="btn btn-default btn-line">{{$item->name}}</a>
                            @endif
                            @endforeach
                    </div>
                    <hr>
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