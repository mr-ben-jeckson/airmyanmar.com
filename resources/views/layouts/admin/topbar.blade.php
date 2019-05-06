<?php $n = \App\notification::where('status', '0')->orderBy('id', 'Desc')->get();?>
<div id="top" style="margin-bottom: 50px;">
    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 30px; padding-bottom: 30px;">
        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
            <i class="icon-align-justify"></i>
        </a>
        <!-- LOGO SECTION -->
        <header class="navbar-header">

            <a href="{{url('/admin')}}" class="navbar-brand">
                <img src="{{url('/assets/img/logo.png')}}" alt="" />
            </a>
        </header>
        <!-- END LOGO SECTION -->
        <ul class="nav navbar-top-links navbar-right">

            <!-- MESSAGES SECTION -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="label label-success">{{count($n)}}</span>    <i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-messages">
                    @foreach($n as $item)
                    <li>
                        <a @if($item->name == "booking") href="{{url('admin/booking/detail/'.$item->app_id)}}" @elseif($item->name == "testimonial") href="{{url('/admin/testimonial/'.$item->app_id)}}" @elseif($item->name == "message") href="{{url('/admin/messages/'.$item->app_id)}}" @endif>
                            <div>
                                <strong><i class="icon icon-bell"></i></strong>
                                <span class="pull-right text-muted">
                                            <em>{{$item->created_at->diffForHumans()}}</em>
                                        </span>
                            </div>
                            <div>{{$item->word}}
                                <br />
                                <span class="label label-primary">{{$item->name}}</span>

                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    @endforeach
                    @if(count($n) > 0)
                    <li>
                        <a class="text-center" href="{{url('/admin/mark-read-all/notifications')}}">
                            <strong>Mark read all</strong>
                            <i class="icon-angle-right"></i>
                        </a>
                    </li>
                        @endif
                </ul>

            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{url('/')}}" target="_blank"><i class="icon-arrow-right"></i> User Site </a>
                    </li>
                    <li><a href="#"><i class="icon-user"></i> User Profile </a>
                    </li>
                    <li><a href="#"><i class="icon-gear"></i> Settings </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{url('/logout')}}"><i class="icon-signout"></i> Logout </a>
                    </li>
                </ul>

            </li>
            <!--END ADMIN SETTINGS -->
        </ul>

    </nav>

</div>
@if(session('status'))
<div class="col-lg-12" style="margin: 0; padding: 0;">
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         {{session('status')}}
    </div>
</div>
@endif
@if(session('alert'))
    <div class="col-lg-12" style="margin: 0; padding: 0;">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session('alert')}}
        </div>
    </div>
@endif

<!-- END HEADER SECTION -->