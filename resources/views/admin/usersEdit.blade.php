@extends('layouts.admin.template')
@section('title') {{$user->name}} Edit @stop
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    @stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">


                    <h2>{{$user->name}}</h2>



                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-md-8 col-md-offset-2 well">
                    <form action="#" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Username | Name :</label>
                            <input type="text" id="name" value="{{$user->name}}" name="name" class="form-control" style="background: #FFFFFF;" disabled>
                        </div>
                        <div class="form-group">
                            <label for="select">Assign Permission Role</label>
                            <select class="form-control" name="role[]" id="select" style="color: #0e1319;" multiple="">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}"
                                            @if(in_array($role->name,$selectedRoles))
                                            selected="selected"
                                            @endif

                                    >
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Update User's Role</button>
                        </div>
                    </form>
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