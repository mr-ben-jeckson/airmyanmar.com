@extends('layouts.admin.template')
@section('title','Admin Dashboard')
@section('style')
    <link href="{{url('/assets/plugins/flot/examples/examples.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{'/assets/plugins/timeline/timeline.css'}}" />
    <link href="{{url('/assets/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawMonthChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Percentage'],
                ['Processing List',     {{$status1}}],
                ['Awaiting Payment',      {{$status2}}],
                ['Complete List',  {{$status3}}],
                ['Final Completed', {{$status4}}],
                ['Cancelled as Fully Booked',    {{$status5}}],
                ['Cancelled List', {{$status6}}]
            ]);

            var options = {
                title: 'Total Bookings Status Percentage',
                colors: ['#ffe128', '#04ff39', '#0a510e', '#ca0072', '#7c7c7c', '#ff0003', '#a264e7'],
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
        function drawMonthChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Percentage'],
                ['Jan', {{$jan}}],
                ['Feb', {{$feb}}],
                ['Mar', {{$mar}}],
                ['Apr', {{$apr}}],
                ['May', {{$may}}],
                ['Jun', {{$jun}}],
                ['Jul', {{$jul}}],
                ['Aug', {{$aug}}],
                ['Sept', {{$sep}}],
                ['Oct', {{$oct}}],
                ['Nov', {{$nov}}],
                ['Dec', {{$dec}}]
            ]);

            var options = {
                title: 'Month Comparison in Year',
                colors: ['#0099c6', '#0099c8', '#0099c9', '#66aa00', '#66aa00', '#66aa01', '#66aa02', '#66aa03', '#66aa04', '#0099c6', '#0099c7', '#0099c6'],
            };

            var chart = new google.visualization.PieChart(document.getElementById('month_chart'));

            chart.draw(data, options);
        }


    </script>


@stop
@section('content')
    <div id="content">

        <div class="inner" style="min-height:1200px;">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Overall Statistics</h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div style="text-align: center;">

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/booking')}}">
                                        <i class="icon icon-shopping-cart icon-2x"></i>
                                        <span> Booking</span>
                                        <span class="label label-danger">{{$bookings}}</span>
                                    </a>

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/destinations')}}">
                                        <i class="icon icon-building icon-2x"></i>
                                        <span>Cities</span>
                                        <span class="label label-success">{{$cities}}</span>
                                    </a>

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/airlines')}}">
                                        <i class="icon icon-plane icon-2x"></i>
                                        <span>Airline</span>
                                        <span class="label btn-metis-4">{{$airlines}}</span>
                                    </a>

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/user')}}">
                                        <i class="icon icon-user icon-2x"></i>
                                        <span>Users</span>
                                        <span class="label label-success">{{$users}}</span>
                                    </a>
                                    <a class="quick-btn dashboard-box" href="{{url('/admin/flights/search')}}">
                                        <i class="icon icon-file icon-2x"></i>
                                        <span>Ticket</span>
                                        <span class="label label-default">{{$tickets}}</span>
                                    </a>
                                    <a class="quick-btn dashboard-box" href="{{url('/admin/testimonial')}}">
                                        <i class="icon icon-comment icon-2x"></i>
                                        <span>Feedback</span>
                                        <span class="label label-success">{{$feedbacks}}</span>
                                    </a>

                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div style="text-align: center;">

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/message')}}">
                                        <i class="icon-comment-alt icon-2x"></i>
                                        <span> Message</span>
                                        <span class="label btn-metis-2">{{$messages}}</span>
                                    </a>

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/destinations')}}">
                                        <i class="icon-globe icon-2x"></i>
                                        <span>Page</span>
                                        <span class="label label-success">{{$pages}}</span>
                                    </a>

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/announcements')}}">
                                        <i class="icon icon-bullhorn icon-2x"></i>
                                        <span>Ads</span>
                                        <span class="label btn-metis-4">{{$announcement}}</span>
                                    </a>

                                    <a class="quick-btn dashboard-box" href="{{url('/admin/promo')}}">
                                        <i class="icon icon-gift icon-2x"></i>
                                        <span>Coupon</span>
                                        <span class="label label-primary">{{$promo}}</span>
                                    </a>
                                    <a class="quick-btn dashboard-box" href="{{url('/admin/banners')}}">
                                        <i class="icon icon-picture icon-2x"></i>
                                        <span>Banner</span>
                                        <span class="label label-danger">{{$banner}}</span>
                                    </a>
                                    <a class="quick-btn dashboard-box" href="{{url('/admin/story/add')}}">
                                        <i class="icon icon-book icon-2x"></i>
                                        <span>Story</span>
                                        <span class="label label-success">{{$blog}}</span>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Booking Statistics</h2>
                            </div>
                            <div class="panel-body table-responsive">
                                <div id="piechart_3d" style="height: 400px;"></div>
                                <div id="month_chart" style="height: 400px;"></div>
                            </div>
                            <div class="col-lg-12">
                                <ul class="pricing-table" >
                                    <li class="col-lg-4">
                                        <h3>Total Incomes</h3>

                                        <div class="col-lg-12">
                                                <center><span class="price price-figure fare"><sup>USD</sup><small>{{$incomeUSD}}</small></span></center>
                                            <hr>
                                        </div>
                                        <div class="col-lg-12">
                                            <center><span class="price price-figure fare"><sup>MMK</sup><small>{{$incomeMMK}}</small></span></center>
                                            <hr>
                                        </div>
                                        <div class="features">
                                            <ul>
                                                <li>Calculate from <strong>Final Completed List</strong></li>
                                                <li>From <strong>{{$status4}}</strong> Avenue</li>
                                            </ul>
                                        </div>
                                        <div class="footer">
                                        </div>
                                    </li>
                                    <li class="col-lg-4">
                                        <h3>Gift Aways</h3>

                                        <div class="col-lg-12">
                                            <center><span class="price price-figure fare"><sup>USD</sup><small>{{$giveUSD}}</small></span></center>
                                            <hr>
                                        </div>
                                        <div class="col-lg-12">
                                            <center><span class="price price-figure fare"><sup>MMK</sup><small>{{$giveMMK}}</small></span></center>
                                            <hr>
                                        </div>
                                        <div class="features">
                                            <ul>
                                                <li>Calculate from <strong>Promo Activated Bookings</strong></li>
                                                <li>Total calculation we discounted off</li>
                                            </ul>
                                        </div>
                                        <div class="footer">
                                        </div>
                                    </li>
                                    <li class="col-lg-4">
                                        <h3>{{date('M')}} {{date('Y')}}</h3>

                                        <div class="col-lg-12">
                                            <center><span class="price price-figure fare"><sup>USD</sup><small>{{$currentMonthSaleUSD}}</small></span></center>
                                            <hr>
                                        </div>
                                        <div class="col-lg-12">
                                            <center><span class="price price-figure fare"><sup>MMK</sup><small>{{$currentMonthSaleMMK}}</small></span></center>
                                            <hr>
                                        </div>
                                        <div class="features">
                                            <ul>
                                                <li>Foreigner Booking <strong>{{$currentMonthSaleF}}</strong></li>
                                                <li>Local Booking <strong>{{$currentMonthSaleL}}</strong></li>
                                            </ul>
                                        </div>
                                        <div class="footer">
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!--<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Passenger</h2>
                        </div>
                        <div class="panel-body table-responsive">
                           <table class="table table-bordered">
                               <thead>
                               <th>Title</th>
                               <th>Given Name + Surname</th>
                               <th>Email</th>
                               <th>Mobile</th>
                               <th>Country</th>
                               <th>DOB</th>
                               </thead>
                               <tbody>

                               </tbody>
                           </table>
                        </div>
                    </div>
                </div>-->
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