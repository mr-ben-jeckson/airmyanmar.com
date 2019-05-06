@extends('layouts.admin.template')
@section('title','Page Detail')
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
@stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>{{$data->title}}</h2>

                    <a href="{{url('/admin/page/edit/'.$data->id)}}" class="btn btn-default pull-right"> <i class="fa fa-pencil"></i> Edit </a>

                </div>
            </div>

            <hr />
            @if($data->img)
            <div class="col-lg-12">
                @foreach(unserialize($data->img) as $img)
                    <div class="col-lg-3 thumbnail">
                        <img src="{{url('/images/pages/'.$img)}}" class="img-responsive" style="height: 180px;" alt="">
                    </div>
                @endforeach
            </div>
            @endif
            <div class="clearfix"></div>
            <hr>
            <div class="col-lg-12 col-md-12">
                <p>{!! $data->content !!}</p>
            </div>
            <hr>
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-responsive">
                        <thead>
                        <th>Meta Description</th>
                        <th>Meta Keywords</th>
                        </thead>
                        <tr>
                            <td>
                                {{$data->description}}
                            </td>
                            <td>
                                {{$data->keywords}}
                            </td>
                        </tr>
                        <tr>
                            <td><b>Created on</b></td>
                            <td><b>Updated on</b></td>
                        </tr>
                        <tr>
                            <td>{{$data->created_at->format('d D, M, Y - G:i:s')}}</td>
                            <td>{{$data->updated_at->format('d D, M, Y - G:i:s')}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
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