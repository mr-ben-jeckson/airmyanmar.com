@extends('layouts.admin.template')
@section('title','Contact')
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    @stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>Contact</h2>



                </div>
            </div>
            <hr />
            <form action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$data->email}}" class="form-control">
                        </div>
                    </div>
                    <?php $n=0; ?>
                    @foreach(unserialize($data->mobiles) as $mobile)
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="">Mobile {{++$n}}</label>
                                <input type="text" name="mobiles[]" value="{{$mobile}}" class="form-control">
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12">
                        <hr>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="2" class="form-control">{!! $data->address !!}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Latitude in Google Map</label>
                            <input type="text" name="latitude" value="{{$data->latitude}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Longitude in Google Map</label>
                            <input type="text" name="longitude" value="{{$data->longitude}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-save"></i> Save </button>
            </form>
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