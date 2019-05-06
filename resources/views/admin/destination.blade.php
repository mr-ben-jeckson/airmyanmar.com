@extends('layouts.admin.template')
@section('title','Admin Dashboard')
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
@stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>{{$data->name}} ({{$data->code}})</h2>

                    <a href="{{url('/admin/destinations/edit/'.$data->id)}}" class="btn btn-default pull-right"> <i class="fa fa-pencil"></i> Edit </a>

                </div>
            </div>

            <hr />
            <div class="col-lg-12">
                @foreach(unserialize($data->img) as $img)
                    <div class="col-lg-3 thumbnail">
                        <img src="{{url('/images/'.$img)}}" class="img-responsive" alt="">
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-lg-12">
                <p>{!! $data->description !!}</p>
                <hr>
                <span style="font-weight: 800;">Air Port Map Links - </span> {{$data->airport_link}}
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