@extends('layouts.admin.template')
@section('title','Airline Management')
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


                    <h2><i class="fa fa-cogs"></i> Airlines Management</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                    <h4><i class="fa fa-plane"></i> Total Airlines - {{$data->count()}}</h4>
                        <hr>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{url('/admin/airline/add')}}" class="btn btn-default btn-sm btn-line pull-right"> <i class="fa fa-plus-circle"></i> Add New Airline</a>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach($data as $item)
                    <div class="col-lg-3 col-sm-6 airline-box">
                        <div class="thumbnail">
                            <img src="{{url('/images/airlines/'.$item->logo)}}" width="240px;" class="img-responsive" alt="">
                            <hr>
                            <p>
                            <strong><i class="icon-chevron-sign-right"></i> Name: </strong>{{$item->name}}<br>
                            <strong><i class="icon-chevron-sign-right"></i> Flight Code: </strong>{{$item->code}}
                            </p>
                            <hr>
                            <div class="col-xs-4 text-center">
                            <a href="{{url('/admin/airline/view/'.$item->id)}}" class="btn btn-success btn-sm btn-line"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-xs-4 text-center">
                            <a href="{{url('/admin/airline/edit/'.$item->id)}}" class="btn btn-warning btn-sm btn-line"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="col-xs-4 text-center">
                            <a href="#" data-toggle="modal" data-target="#deleteAlert{{$item->id}}" class="btn btn-danger btn-sm btn-line"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="row mb15"></div>
                            <div class="clearfix"></div>
                        </div>
                        <hr>
                    </div>
                        <div class="modal fade in" id="deleteAlert{{$item->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="H1"><i class="fa fa-warning"></i> Are you sure to delete </h4>
                                    </div>
                                    <div class="modal-body">
                                        If you would delete the airline ({{$item->name}}) , you couldn't add the tickets for that.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                        <a href="{{url('/admin/airline/delete/'.$item->id)}}" class="btn btn-primary pull-left">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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