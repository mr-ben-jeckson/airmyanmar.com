
<div id="left" >
    <div class="media user-media well-small">
        <a class="user-link" href="#">
            <img class="media-object img-thumbnail user-img img-circle" alt="User Picture" src="{{url('/assets/img/admin-pro-pic.png')}}" style="width: 64px; height: 64px;" />
        </a>
        <br />
        <div class="media-body">
            <h5 class="media-heading"> {{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
            <ul class="list-unstyled user-info">

                <li>
                    <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online

                </li>

            </ul>
        </div>
        <br />
    </div>

    <ul id="menu" class="collapse">

        <li @if($a == '1') class="panel active" @else class="panel" @endif>
            <a href="{{url('/admin')}}" >
                <i class="icon-table"></i> Dashboard


            </a>
        </li>
        <li @if($a == '2') class="panel active" @else class="panel" @endif>
            <a href="{{url('/admin/airlines')}}" >
                <i class="fa fa-plane"></i> Airlines
            </a>
        </li>



        <li @if($a == '3') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                <i class="icon-tasks"> </i> Destination

                <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                &nbsp;
            </a>
            <ul class="collapse" id="component-nav">

                <li class=""><a href="{{url('/admin/destinations/add')}}"><i class="icon-angle-right"></i> Add New </a></li>
                <li class=""><a href="{{url('/admin/destinations')}}"><i class="icon-angle-right"></i> Manage </a></li>

            </ul>
        </li>
        <li @if($a == '4') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="fa fa-ticket"></i> Flight Tickets

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="form-nav">
                <li class=""><a href="{{url('/admin/flights/search')}}"><i class="icon-angle-right"></i> Search </a></li>
                <li class=""><a href="{{url('/admin/flight/add')}}"><i class="icon-angle-right"></i> Add Ticket </a></li>
                <li class=""><a href="{{url('/admin/tickets')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '5') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#promo-nav">
                <i class="fa fa-gift"></i> Flight Promo

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="promo-nav">
                <li class=""><a href="{{url('/admin/promo/add')}}"><i class="icon-angle-right"></i> Create </a></li>
                <li class=""><a href="{{url('/admin/promo')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '6') class="panel active" @else class="panel" @endif>
            <a href="{{url('/admin/booking')}}" >
                <i class="fa fa-suitcase"></i> Bookings
            </a>
        </li>
        <li @if($a == '7') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#user-nav">
                <i class="fa fa-users"></i> User Management

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="user-nav">
                <li class=""><a href="{{url('/admin/user')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '8') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#page-nav">
                <i class="fa fa-book"></i> Content Management

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="page-nav">
                <li class=""><a href="{{url('/admin/main-content')}}"><i class="icon-angle-right"></i> Edit Main Content </a></li>
                <li class=""><a href="{{url('/admin/page/add')}}"><i class="icon-angle-right"></i> Add Page </a></li>
                <li class=""><a href="{{url('/admin/pages')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '9') class="panel active" @else class="panel" @endif>
            <a href="{{url('/admin/message')}}">
                <i class="icon-comments"></i> Messages
            </a>
        </li>
        <li @if($a == '20') class="panel active" @else class="panel" @endif>
            <a href="{{url('/admin/passengers')}}">
                <i class="icon-user"></i> Passenger Records
            </a>
        </li>
        <li @if($a == '10') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#banner-nav">
                <i class="fa fa-file-photo-o"></i> Banner Offers

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="banner-nav">
                <li class=""><a href="{{url('/admin/banner/add')}}"><i class="icon-angle-right"></i> Add New </a></li>
                <li class=""><a href="{{url('/admin/banners')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '11') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#anmt-nav">
                <i class="fa fa-bullhorn"></i> Announcement

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="anmt-nav">
                <li class=""><a href="{{url('/admin/announcement/add')}}"><i class="icon-angle-right"></i> Add New </a></li>
                <li class=""><a href="{{url('/admin/announcements')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '12') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#com-nav">
                <i class="icon-sitemap"></i> Community

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="com-nav">
                <li class=""><a href="{{url('/admin/story/add')}}"><i class="icon-angle-right"></i> Add Stories </a></li>
                <li class=""><a href="{{url('/admin/stories')}}"><i class="icon-angle-right"></i> Story Manage </a></li>
            </ul>
        </li>
        <li @if($a == '15') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#itest-nav">
                <i class="fa fa-bell"></i> Testimonials

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="itest-nav">
                <li class=""><a href="{{url('/admin/testimonial-add')}}"><i class="icon-angle-right"></i> Add Testimonial </a></li>
                <li class=""><a href="{{url('/admin/testimonial')}}"><i class="icon-angle-right"></i> Manage </a></li>
            </ul>
        </li>
        <li @if($a == '14') class="panel active" @else class="panel" @endif>
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#iset-nav">
                <i class="fa fa-cogs"></i> Setting

                <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
            </a>
            <ul class="collapse" id="iset-nav">
                <li class=""><a href="{{url('/admin/setting/seo')}}"><i class="icon-angle-right"></i> SEO Setting </a></li>
                <li class=""><a href="{{url('/admin/setting/social')}}"><i class="icon-angle-right"></i> Social Acc Setting </a></li>
                <li class=""><a href="{{url('/admin/setting/contact')}}"><i class="icon-angle-right"></i> Contact Data </a></li>
                <li class=""><a href="{{url('/admin/setting/code')}}"><i class="icon-angle-right"></i> Insert Code</a></li>
            </ul>
        </li>

        <li><a href="{{url('/logout')}}"><i class="icon-signin"></i> Logout </a></li>

    </ul>

</div>
<!--END MENU SECTION -->