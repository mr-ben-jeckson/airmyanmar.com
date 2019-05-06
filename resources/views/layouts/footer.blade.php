<?php $contact = App\contact::first();
$sectorFromRGN = DB::table('destinations')->whereIn('code', ['MDL', 'NYU', 'HEH', 'SNW', 'NYT', 'KAW'])->get();
$sectorFromMDL = DB::table('destinations')->whereIn('code', ['RGN', 'NYU', 'HEH', 'SNW', 'THL', 'MYT'])->get();
$social = App\account::first();
?>
<!--========================= BEST FEATURES =======================-->
<section id="best-features" class="banner-padding lightgrey-features">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-dollar"></i></span>
                    <h3>Best Fare Guarantee</h3>
                    <p>Be our guest. Myanmar Flights Center - always offer best fare and promo fare to our customer. Fly with our reliable service and explore anywhere from Myanmar </p>
                </div><!-- end b-feature-block -->
            </div><!-- end columns -->

            <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-lock"></i></span>
                    <h3>Safe and Secure</h3>
                    <p>Our online reservation website is verified and encrypted by Comodo SSL and 2C2P Payments gateway is safe and secure. All airlines with experience pilots</p>
                </div><!-- end b-feature-block -->
            </div><!-- end columns -->

            <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-thumbs-up"></i></span>
                    <h3>Best Travel Agency</h3>
                    <p>We are one of travel agencies that has over 20 year experience. Manage all accommodations, transportation and properties then the best deal to you</p>
                </div><!-- end b-feature-block -->
            </div><!-- end columns -->

            <div class="col-sm-6 col-md-3">
                <div class="b-feature-block">
                    <span><i class="fa fa-bars"></i></span>
                    <h3>Manage Easy Booking</h3>
                    <p>If you would make booking with us, you could manage or track your booking through our website with our booking preference at anytime from anyplace</p>
                </div><!-- end b-feature-block -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end best-features -->


<!--========================= NEWSLETTER-1 ==========================-->
<section id="newsletter-1" class="section-padding back-size newsletter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h2>Subscibe to get cheap flight deals<br>delivered to you</h2>
                <form method="post" action="{{url('/subscription')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" name="user_email" class="form-control input-lg" placeholder="Enter your email address" required/>
                            <span class="input-group-btn"><button type="submit" class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                        </div>
                    </div>
                </form>
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end newsletter-1 -->


<!--======================= FOOTER =======================-->
<section id="footer" class="ftr-heading-o ftr-heading-mgn-1">

    <div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-contact">
                    <h3 class="footer-heading">Contact us </h3>
                    <ul class="list-unstyled">
                        <li><span><i class="fa fa-map-marker"></i></span>{{$contact->address}}</li>
                        <li><span><i class="fa fa-phone"></i></span>{{array_values(unserialize($contact->mobiles))['0']}}</li>
                        <li><span><i class="fa fa-envelope"></i></span>{{$contact->email}}</li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-widget ftr-links">
                    <h3 class="footer-heading">Useful Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/user/booking')}}">My Bookings</a></li>
                        <li><a href="{{url('/track-booking')}}">Track Booking</a></li>
                        <li><a href="{{url('/page/faqs')}}">FAQs</a></li>
                        <li><a href="https://2c2p.com" target="_blank">2c2p payment</a></li>
                        <li><a href="{{url('/page/about-us')}}">About us</a></li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
                    <h3 class="footer-heading">Related Sites</h3>
                    <ul class="list-unstyled">
                        <li><a href="https://peacehousetravel.com" target="_blank" style="text-transform: none;">peacehousetravel.com</a></li>
                        <li><a href="https://myanmarballoon.com" target="_blank" style="text-transform: none;">myanmarballoon.com</a></li>
                        <li><a href="https://myanmarrivercruises.com" target="_blank" style="text-transform: none;">myanmarrivercruises.com</a></li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                    <h3 class="footer-heading">Domestic Flight Fares</h3>
                    @foreach($sectorFromRGN as $item)
                        <?php $flight = \App\tickets::where('from', '=', 'RGN')->where('to', '=', $item->code)->get();
                        $price = $flight->where('saver_fare_usd',$flight->min('saver_fare_usd'))->first();?>

                        <div class="col-md-12" style="font-size: 11px;"><strong><i class="fa fa-plane"></i> Flight Fares</strong>
                            <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=RGN&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}" style="font-size: 11px;" title="Myanmar Flight Center/ Book Flights from Yangon to {{$item->name}}">from Yangon to {{$item->name}} </a>
                        </div>
                    @endforeach
                    @foreach($sectorFromMDL as $item)
                        <?php $flight1 = \App\tickets::where('from', '=', 'MDL')->where('to', '=', $item->code)->get();
                        $price1 = $flight1->where('saver_fare_usd',$flight1->min('saver_fare_usd'))->first();?>

                        <div class="col-md-12" style="font-size: 11px;"><strong><i class="fa fa-plane"></i> Flight Fares</strong>
                            <a href="{{url('/search/flights/oneway?_token='.csrf_token().'&from=MDL&to='.$item->code.'&date='.\Carbon\Carbon::now()->addDay(5)->format('m/d/Y').'&class=&adults=1&child=0&infant=0&nation=1')}}" style="font-size: 11px;" title="Myanmar Flight Center/ Book Flights from Mandalay to {{$item->name}}">from Mandalay to {{$item->name}} </a>
                        </div>
                        @endforeach
                </div><!-- end columns -->
                <div class="col-md-12" style="height: 20px;">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                    <h3 class="footer-heading">Stalk us on</h3>
                    <ul class="social-links list-inline list-unstyled">
                        <li><a href="{{url($social->facebook)}}" title="Air Myanmar Facebook" target="_blank"><span><i class="fa fa-facebook"></i></span></a></li>
                        <li><a href="{{url($social->twitter)}}" title="Air Myanmar Twitter"><span><i class="fa fa-twitter"></i></span></a></li>
                        <li><a href="{{url($social->google_plus)}}" title="Air Myanmar Google Plus" target="_blank"><span><i class="fa fa-google-plus"></i></span></a></li>
                        <li><a href="{{url($social->pinterest)}}" title="Air Myanmar Pinterest" target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a></li>
                        <li><a href="{{url($social->instagram)}}" title="Air Myanmar Office"><span><i class="fa fa-instagram"></i></span></a></li>
                        <li><a href="{{url($social->youtube)}}" title="Air Myanmar You Tube" target="_blank"><span><i class="fa fa-youtube-play"></i></span></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                    <h3 class="footer-heading">Certifications</h3>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="thumbnail">
                                <img src="{{url('/images/crt-logo3.png')}}" class="img-responsive" title="Myanmar Toursim Marketing Member" alt="Myanmar Toursim Marketing Member">
                            </div>
                        </div>
                        <!--<div class="col-xs-4">
                            <div class="thumbnail">
                                <img src="{{url('/images/crt-logo2.png')}}" class="img-responsive" title="Travel Life UK Member" alt="Travel Life UK Member">
                            </div>
                        </div>-->
                        <div class="col-xs-4">
                            <div class="thumbnail">
                                <img src="{{url('/images/crt-logo1.png')}}" class="img-responsive" title="SSL Secure Logo" alt="SSL Secure Logo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                    <h3 class="footer-heading">We Accept</h3>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="thumbnail">
                                <img src="{{url('/images/2c2p-c-logo.png')}}" title="2c2p payment gateway" class="img-responsive" alt="2c2p">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="thumbnail">
                                <img src="{{url('/images/visa-c-logo.png')}}" title="visa credit or debit card" class="img-responsive" alt="visa card">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="thumbnail">
                                <img src="{{url('/images/master-c-logo.png')}}" title="master credit or debit card" class="img-responsive" alt="master card">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="thumbnail">
                                <img src="{{url('/images/mpu-c-logo.png')}}" title="E-commerce mpu card" class="img-responsive" alt="mpu card">
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end footer-top -->

    <div id="footer-bottom" class="ftr-bot-black">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="copyright">
                    <p class="white">© 2004 - <?php echo date("Y");?>  <a href="#">Air Myanmar - Myanmar Flights Center</a>. All rights reserved. Developed by Than Htike Xaw (PHT)</p>
                </div><!-- end columns -->

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="terms">
                    <ul class="list-unstyled list-inline">
                        <li><a href="{{url('/page/terms-conditions')}}">Terms & Condition</a></li>
                        <li><a href="{{url('/page/privacy-policy')}}">Privacy Policy</a></li>
                        <li><div id="google_translate_element"></div></li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end footer-bottom -->

</section><!-- end footer -->