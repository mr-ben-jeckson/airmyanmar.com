@extends('layouts.admin.template')
@section('title','Destinations')
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
@stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>Destinations</h2>



                </div>
            </div>

            <hr />
            <div class="col-md-12">
                @foreach($data as $item)
                <div class="col-lg-3 well">
                    <h5>{{$item->name}} ({{$item->code}})</h5>
                    <div class="thumbnail">
                        <img src="{{url('/images/'.unserialize($item->img)[1])}}" class="img-responsive" style="height:125px;" alt="">
                    </div>
                    <hr>
                    <div class="col-xs-4">
                    <a href="{{url('admin/destinations/'.$item->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </div>
                    <div class="col-xs-4">
                    <a href="{{url('admin/destinations/show/'.$item->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                    </div>
                    <div class="col-xs-4">
                    <a href="{{url('admin/destinations/edit/'.$item->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{$data->links()}}
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