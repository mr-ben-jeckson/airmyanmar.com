<?php $contact = App\contact::find('1');
      $destinations = App\destination::limit(12)->get();
      $destination = App\destination::get();
      $airlines = App\airline::all();
      $sector = \App\destination::all();
      $sectorFromRGN = DB::table('destinations')->whereIn('code', ['MDL', 'NYU', 'HEH', 'SNW', 'NYT', 'KAW'])->get();
      $sectorFromMDL = DB::table('destinations')->whereIn('code', ['RGN', 'NYU', 'HEH', 'SNW', 'THL', 'MYT'])->get();
?>
<div class="loader"></div>

@if (count($errors))
<!-- Error Modal -->
<div class="modal fade" id="error" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header air-m-h">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">AirMyanmar.com | Myanmar Flights Center says</h5>
            </div>
            <div class="modal-body">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>

            </div>
            <div class="modal-footer air-m-h">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@if (session('status'))
    <!-- Error Modal -->
    <div class="modal fade" id="status" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header air-m-h">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">AirMyanmar.com | Myanmar Flights Center says</h5>
                </div>
                <div class="modal-body">
                    <p>{{session('status')}}</p>
                </div>
                <div class="modal-footer air-m-h">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

<!--======== SEARCH-FlIGHT-FORM =========-->
<div class="modal fade modal-fullscreen  footer-to-bottom" id="flightFormEasy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog animated zoomInLeft">
        <div class="modal-content">
            <div class="modal-header mtb air-m-h">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" title="Myanmar Flight Center">Myanmar Flight Center | Search Myanmar Domestic Flights to Everywhere</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb50">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#oneway" aria-controls="home" role="tab" data-toggle="tab">One Way</a></li>
                                        <li role="presentation"><a href="#round" aria-controls="profile" role="tab" data-toggle="tab">Return</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="oneway">
                                        <div class="row" style="margin-top: 20px;">
                                            <form action="{{url('/search/flights/oneway')}}" method="get" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Select Origin</label>
                                                    <select name="from" id="" class="form-control" required>
                                                        <option value="" selected>From</option>
                                                        @foreach($sector as $item)
                                                            <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Select Destination</label>
                                                    <select name="to" id="" class="form-control" required>
                                                        <option value="" selected>To</option>
                                                        @foreach($sector as $item)
                                                            <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="date">Depart Date</label>
                                                    <input type="text" name="date" class="form-control dpd1" placeholder="MM/DD/YY" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Flight Class</label>
                                                    <select name="class" class="form-control">
                                                        <option value="" selected>Class</option>
                                                        <option value="1">Eco Saver</option>
                                                        <option value="2">Eco Plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Adults (12 over)</label>
                                                    <select name="adults" class="form-control" required>
                                                        @foreach(range(1,9) as $x)
                                                            <option value="{{$x}}" @if($x == '2') selected @endif>{{$x}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Child (2 - 12) </label>
                                                    <select name="child" class="form-control">
                                                        @foreach(range(0,5) as $x)
                                                            <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Infant (2 under)</label>
                                                    <select name="infant" class="form-control">
                                                        @foreach(range(0,5) as $x)
                                                            <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Select Nationality</label>
                                                    <select name="nation" class="form-control" required>
                                                        <option value="1" selected>Foreigner</option>
                                                        <option value="2" >Local</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-pink pull-right"> Search Now </button>
                                                </div>
                                                <div class="clearfix"></div>
                                            <div class="col-md-12">
                                                <br>
                                                <div class="clearfix"></div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="round">
                                            <div class="row" style="margin-top: 20px;">
                                                <form action="{{url('/search/flights/round-trip/')}}" method="get" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Select Origin</label>
                                                            <select name="from" id="" class="form-control" required>
                                                                <option value="" selected>From</option>
                                                                @foreach($sector as $item)
                                                                    <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Select Destination</label>
                                                            <select name="to" id="" class="form-control" required>
                                                                <option value="" selected>To</option>
                                                                @foreach($sector as $item)
                                                                    <option value="{{$item->code}}">{{$item->name}} ({{$item->code}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date">Depart Date</label>
                                                            <input type="text" name="dep_date" class="form-control dpd1" placeholder="MM/DD/YY" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date">Return Date</label>
                                                            <input type="text" name="return_date" class="form-control dpd1" placeholder="MM/DD/YY" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Flight Class</label>
                                                            <select name="class" class="form-control">
                                                                <option value="" selected>Class</option>
                                                                <option value="1">Eco Saver</option>
                                                                <option value="2">Eco Plus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label> Adults (12 over)</label>
                                                            <select name="adults" class="form-control" required>
                                                                @foreach(range(1,9) as $x)
                                                                    <option value="{{$x}}" @if($x == '2') selected @endif>{{$x}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label> Child (2 - 12) </label>
                                                            <select name="child" class="form-control">
                                                                @foreach(range(0,5) as $x)
                                                                    <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label> Infant (2 under)</label>
                                                            <select name="infant" class="form-control">
                                                                @foreach(range(0,5) as $x)
                                                                    <option value="{{$x}}" @if($x == '0') selected @endif>{{$x}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Select Nationality</label>
                                                            <select name="nation" class="form-control" required>
                                                                <option value="1" selected>Foreigner</option>
                                                                <option value="2" >Local</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-pink pull-right"> Search Now </button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-12">
                                                        <br>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-sm-12">
                            <div class="page-heading text-pink">
                                <h3>Book a cheap flight from Myanmar Flight Center</h3>
                                <hr class="heading-line">
                            </div>
                            @foreach($airlines as $item)
                                <div class="col-md-3 col-xs-6 member-img">
                                    <a href="{{url('/flights/'.$item->slug)}}" title="{{$item->name}}"><img src="{{url('/images/airlines/'.$item->logo)}}" class="img-responsive" title="{{$item->name}}" alt="{{$item->name}}"></a>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="col-sm-12" style="margin-top: 30px;">
                            <div class="page-heading text-pink">
                                <h3>Myanmar Cheap Flight Routes</h3>
                                <hr class="heading-line">
                            </div>
                            <div class="row well">
                                @foreach($sectorFromRGN as $item)
                                    <?php $flight = \App\tickets::where('from', '=', 'RGN')->where('to', '=', $item->code)->get();
                                    $price = $flight->where('saver_fare_usd',$flight->min('saver_fare_usd'))->first();?>

                                    <div class="col-md-6 pinklink"><strong><i class="fa fa-plane"></i> Myanmar Flight Center/ Cheap Flight Deals</strong>
                                        <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=RGN&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}" title="Myanmar Flight Center/ Book Flights from Yangon to {{$item->name}}">from Yangon (RGN) to {{$item->name}} ({{$item->code}}) </a></div>
                                @endforeach
                                @foreach($sectorFromMDL as $item)
                                    <?php $flight1 = \App\tickets::where('from', '=', 'MDL')->where('to', '=', $item->code)->get();
                                    $price1 = $flight1->where('saver_fare_usd',$flight1->min('saver_fare_usd'))->first();?>

                                    <div class="col-md-6 pinklink"><strong><i class="fa fa-plane"></i> Myanmar Flight Center/ Cheap Flight Deals</strong>
                                        <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=MDL&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}" title="Myanmar Flight Center/ Book Flights from Mandalay to {{$item->name}}">from Mandalay (MDL) to {{$item->name}} ({{$item->code}}) </a></div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer air-m-h" style="position: fixed; bottom: 0; width: 100%;">
                <button type="button" data-dismiss="modal" class="btn btn-orange">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--============= Sign In MODAL =========-->
<!-- Large modal -->

<div class="modal fade bd-SignIn-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header air-m-h">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Welcome to Airmyanmar.com</h5>
            </div>
            <div class="row">
                    <div class="col-sm-12">

                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Member Sign In</h3>
                                <p>If you have logged in, you can manage all your bookings and get rewards & cheap offer updates</p>
                                <form method="POST" action="{{url('/login')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"  required/>
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password"  required/>
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <br>Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-orange btn-block">Sign In</button>
                                </form>

                                <div class="other-links">
                                    <p class="link-line">Do not have an account? <a href="#" data-toggle="modal" data-target=".bd-register-modal-lg">Register Free Here</a></p>
                                    <p class="link-line">Forgot password? <a href="#">Click Here to Reset</a></p>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->

                            <div class="custom-form custom-form-fields">
                                <h3>Easy Sign In With</h3>
                                <p>If you have logged in with one of the following app account, you would be a registered member with one click</p>
                                <div class="col-md-12">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <a href="{{url('/login-facebook/')}}" class="air"><i class="fa fa-facebook-square air-logo"></i></a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <a href="{{url('/login-google-plus')}}" class="air"><i class="fa fa-google-plus-square air-logo"></i></a>
                                    </div>
                                </div>
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                    </div><!-- end columns -->
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer air-m-h">
                <span class="modal-title"></span>
            </div>
        </div>
    </div>
</div>
<!--============ END Sign In ==========-->

<!--============ REGISTER MODAL ============-->
<div class="modal fade bd-register-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header air-m-h">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Welcome to Airmyanmar.com</h5>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="flex-content">
                        <div class="custom-form custom-form-fields">
                            <h3>Free Member Registration</h3>
                            <p>Register Now to get more updates and promotions. Get save up coupon with your member points</p>
                            <form method="POST" action="{{url('/user/register')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name"  required/>
                                    <span><i class="fa fa-user"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"  required/>
                                    <span><i class="fa fa-envelope"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"  required/>
                                    <span><i class="fa fa-lock"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" id="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"  required/>
                                    <span><i class="fa fa-lock"></i></span>
                                </div>

                                <button type="submit" class="btn btn-orange btn-block">Register</button>
                            </form>

                            <div class="other-links">
                                <p class="link-line">Already Have An Account ? <a href="#" data-dismiss="modal" data-target=".bd-SignIn-modal-lg">Sign In Here</a></p>
                            </div><!-- end other-links -->
                        </div><!-- end custom-form -->

                        <div class="flex-content-img custom-form-img">
                            <img src="{{url('/images/registration.jpg')}}" class="img-responsive" alt="registration-img" />
                        </div><!-- end custom-form-img -->
                    </div><!-- end form-content -->

                </div><!-- end columns -->
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer air-m-h">
                <span class="modal-title"></span>
            </div>
        </div>
    </div>
</div>
<!--============ END =============-->

<!--============= TOP-BAR ===========-->
<div id="top-bar" class="tb-text-white hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="info">
                    <ul class="list-unstyled list-inline">
                        <li><span><i class="fa fa-envelope"></i></span><a href="mailto:{{$contact->email}}" style="text-decoration: none; color: #fff;">{{$contact->email}}</a></li>
                        <li><span><i class="fa fa-phone"></i></span><a href="tel:{{array_values(unserialize($contact->mobiles))['0']}}" style="text-decoration: none; color: #fff;">{{array_values(unserialize($contact->mobiles))['0']}}</a></li>
                    </ul>
                </div><!-- end info -->
            </div><!-- end columns -->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="links">
                    <ul class="list-unstyled list-inline">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <li><a href="{{url('/logout')}}"><span><i class="fa fa-unlock"></i></span> Logout</a></li>
                            <li><a href=""><span><i class="fa fa-user-circle"></i></span>{{Auth::user()->name}}</a></li>
                        @else
                        <li><a href="#" data-toggle="modal" data-target=".bd-SignIn-modal-lg"><span><i class="fa fa-lock"></i></span>Sign In</a></li>
                        <li><a href="#" data-toggle="modal" data-target=".bd-register-modal-lg"><span><i class="fa fa-plus"></i></span>Register</a></li>
                        @endif
                    </ul>
                </div><!-- end links -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end top-bar -->

<nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar-1" style="margin-bottom: 20px;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" id="menu-button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-search hidden-lg">
                <a href="#" data-toggle="modal" data-target="#flightFormEasy" class="search-button"><span><i class="fa fa-plane"></i></span></a>
            </div>
            <a href="{{url('/')}}" class="navbar-brand" style="margin-top: 0px;"><img src="{{url('images/logo.png')}}" style="height: 50px;" class="hidden-xs"><span class="hidden-lg hidden-sm hidden-md">Airmyanmar.com</span></a>
        </div><!-- end navbar-header -->

        <div class="collapse navbar-collapse" id="myNavbar1">
            <ul class="nav navbar-nav navbar-right navbar-search-link">
                <li class="dropdown"><a href="{{url('/')}}" title="Air Myanmar - Myanmar Flights Center">Home</a>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="@foreach($airlines as $item) {{$item->name}} @endforeach">Air Lines<span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        @foreach($airlines as $item)
                            <li><a href="{{url('/flights/'.$item->slug)}}" title="{{$item->name}}">{{$item->name}}</a></li>
                            @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Destinations<span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        @foreach($destinations as $item)
                        <li><a href="{{url('/destination/'.$item->slug)}}" title="flights to {{$item->name}}">{{$item->name}}</a></li>
                            @endforeach
                        <li><a href="{{url('/flights/destinations')}}">View All Destinations <i class="fa fa-arrow-circle-o-right" style="font-weight: bolder;"></i></a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">About us<span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/page/about-us')}}" title="Company">Company</a></li>
                        <li><a href="{{url('/page/faqs')}}" title="faqs">FAQs</a></li>
                        <li><a href="{{url('/testimonials')}}" title="Testimonials">Testimonials</a></li>
                        <li><a href="{{url('/page/terms-conditions')}}" title="Terms & Conditions">Terms&Conditions</a></li>
                        <li><a href="{{url('/page/privacy-policy')}}" title="Privacy Policy">Privacy Policy</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="{{url('/contact-us')}}" title="Air Myanmar - Myanmar Flights Center - Contact Us">Contact us</a>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li>
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header">Booking <span>Process</span></li>
                                        <li><a href="{{url('/page/how-to-book')}}">How to book</a></li>
                                        <li><a href="{{url('/track-booking')}}">Track My Bookings</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header">User <span>Dashboard</span></li>
                                        <li><a href="{{url('/user/bookings')}}">Manage My Bookings</a></li>
                                        <li><a href="{{url('/flights-seasonal-promotions')}}">Promotion Anouncements</a></li>
                                        <li><a href="{{url('/user/ranking')}}">Member Ranking</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header">Account <span>Settings</span></li>
                                        <li><a href="#" data-toggle="modal" data-target=".bd-SignIn-modal-lg">Sign In</a></li>
                                        <li><a href="#" data-toggle="modal" data-target=".bd-register-modal-lg">Registration</a></li>
                                        <li><a href="{{url('password/reset')}}">Forgot Password</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header">Travel <span>Tips</span></li>
                                        <li><a href="{{url('/page/before-you-fly')}}">Before You Fly</a></li>
                                        <li><a href="{{url('/page/things-to-do')}}">Things to do</a></li>
                                        <li><a href="{{url('/stories')}}">Stories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#flightFormEasy" class="search-button"><span><i class="fa fa-plane"></i></span></a></li>
            </ul>
        </div><!-- end navbar collapse -->
    </div><!-- end container -->
</nav><!-- end navbar -->

<div class="sidenav-content">
    <div id="mySidenav" class="sidenav" >
        <h2 id="web-name"><img src="{{url('/images/logo.png')}}" width="200px;"></h2>

        <div id="main-menu">
            <div class="closebtn">
                <button class="btn btn-default" id="closebtn">&times;</button>
            </div><!-- end close-btn -->

            <div class="list-group panel">

                <a href="#home-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-home link-icon"></i></span>Home</a>
                <a href="#flights-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-plane link-icon"></i></span>Air Lines<span><i class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="flights-links">
                    @foreach($airlines as $item)
                        <a href="{{url('/flights/'.$item->slug)}}" title="{{$item->name}}" class="list-group-item">{{$item->name}}</a></li>
                    @endforeach
                </div><!-- end sub-menu -->

                <a href="#hotels-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-building link-icon"></i></span>Destinations<span><i class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="hotels-links">
                    @foreach($destination as $item)
                    <a href="{{url('/destination/'.$item->slug)}}" class="list-group-item" title="flights to {{$item->name}}">{{$item->name}}</a>
                        @endforeach
                </div><!-- end sub-menu -->

                <a href="#tours-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-user link-icon"></i></span>About us<span><i class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="tours-links">
                    <a href="{{url('/page/about-us')}}" class="list-group-item" title="Myanmar Flights Center Company">Company</a>
                    <a href="{{url('/page/faqs')}}" class="list-group-item">FAQs</a>
                    <a href="{{url('/testimonials')}}" class="list-group-item">Testimonials</a>
                    <a href="{{url('/page/terms-conditions')}}" class="list-group-item">Terms & Conditions</a>
                    <a href="{{url('/page/privacy-policy')}}" class="list-group-item">Privacy Policy</a>
                </div><!-- end sub-menu -->

                <a href="{{url('/contact-us')}}" class="list-group-item" ><span><i class="fa fa-address-book link-icon"></i></span> Contact us </a>

                <a href="#pages-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-bookmark link-icon"></i></span>Menu<span><i class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="pages-links">
                    <div class="list-group-heading list-group-item">Booking <span>Process</span></div>
                    <a href="{{url('/page/how-to-book')}}"  class="list-group-item">How to book</a>
                    <a href="{{url('/track-booking')}}"  class="list-group-item">Track Booking</a>
                    <div class="list-group-heading list-group-item">User <span>Dashboard</span></div>
                    <a href="{{url('/user/bookings')}}"  class="list-group-item">Manage My Bookings</a>
                    <a href="{{url('/flight-seasonal-promotions')}}"  class="list-group-item">Promotion Announcements</a>
                    <a href="{{url('/user/ranking')}}"  class="list-group-item">Memeber Ranking</a>
                    <div class="list-group-heading list-group-item">Account <span>Setting</span></div>
                    <a href="#" data-toggle="modal" data-target=".bd-SignIn-modal-lg" class="list-group-item">Sign In</a>
                    <a href="#" data-toggle="modal" data-target=".bd-register-modal-lg"  class="list-group-item">Registration</a>
                    <a href="{{url('/password/reset')}}"  class="list-group-item">Forgot Password</a>
                    <div class="list-group-heading list-group-item">Travel <span>Tips</span></div>
                    <a href="{{url('/page/before-you-fly')}}" class="list-group-item">Before You Fly</a>
                    <a href="{{url('/page/things-to-do')}}" class="list-group-item">Things to do</a>
                    <a href="{{url('/stories')}}" class="list-group-item">Stories</a>
                </div><!-- end sub-menu -->
                <a href="#acc-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-key link-icon"></i></span>Account<span><i class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="acc-links">
                    <div class="list-group-heading list-group-item">@if(\Illuminate\Support\Facades\Auth::check()) {{Auth::user()->name}} @else Guest @endif</div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="{{url('/user/bookings')}}"  class="list-group-item">My Bookings</a>
                    <a href="{{url('/logout')}}"  class="list-group-item">Log Out</a>
                    @else
                        <a href="#" data-toggle="modal" data-target=".bd-SignIn-modal-lg" class="list-group-item">Sign In</a>
                        <a href="#" data-toggle="modal" data-target=".bd-register-modal-lg" class="list-group-item">Register</a>
                    @endif
                </div>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <a href="{{url('/login-facebook')}}" class="list-group-item" ><span><i class="fa fa-facebook-official link-icon"></i></span> Sign in with Facebook </a>
                    <a href="{{url('/login-google-plus')}}" class="list-group-item" ><span><i class="fa fa-google-plus-official link-icon"></i></span> Sign in with Google + </a>
                @endif
            </div><!-- end list-group -->
        </div><!-- end main-menu -->
    </div><!-- end mySidenav -->
</div><!-- end sidenav-content -->
<div class="clearfix"></div>