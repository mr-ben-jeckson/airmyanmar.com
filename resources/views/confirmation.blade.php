<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset(url('/images/favicon.png'))}}" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Download Confirmation| ID {{$data->booking_id}}</title>
</head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<style type="text/css">
    .list{font-weight: bolder;}
</style>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-6 col-sm-6">
            <div id="HTMLtoPDF" style="align-content: center;">
                <h6><img src="{{url('/images/big-x-logo.png')}}" alt="Myanmar River Cruises" width="280px;" class="img-responsive"></h6>
                <h4>Booking Confirmation by Airmyanmar.com</h4>
                <p>
                <ul class="list">
                    <li>
                        Booking ID : {{$data->booking_id}}
                    </li>
                    <li>
                        Booking Username : {{$data->customer}}
                    </li>
                    <li>
                        Contact Email : {{$data->c_email}}
                    </li>
                    <li>
                        Booking Date : {{$data->booking_date}}
                    </li>
                    <li>
                        Travel Date : {{$data->dep_date}}
                    </li>
                    <li>
                        Booking Status : Completed
                    </li>
                    <li>
                        Airline PNR : {{$data->pnr}}
                    </li>
                    <li>
                        Flight : @if($data->route == "oneway") {{$ticket->from}} - {{$ticket->to}} (One Way) @else {{$ticket->from}} - {{$ticket->to}} - {{$ticket->from}} (Round Trip) @endif
                    </li>
                    <li>
                        No of Passenger : {{unserialize($data->pax)['adult']+unserialize($data->pax)['child']+unserialize($data->pax)['infant']}}
                    </li>
                    <li>
                        Total Amount : {{$data->currency}} {{$data->total}}
                    </li>
                    <li>
                        Grand Total : {{$data->currency}} {{$data->grand_amount}} (<span style="font-size: 8px;">Included Tax & Online Payment Fee</span>)
                    </li>
                    <li>
                        Received Payment From: @if($data->pay_opt == 1 || $data->pay_opt == 2) 2C2P Payment Gateway @else Local Mobile Banking (MM) @endif
                    </li>
                    <li>
                        Payment : Paid
                    </li>
                </ul>
                </p>
                <p style="font-size: 12px; margin-right: 20px; text-align: justify;">
                    This is the guarantee letter for your booking. If you have got the confirmation letter, there is no matter to worry for your booking. It is not e-ticket. E tickets will be sent 2 week prior to your flight date. If you couldn't receive your ticket till the day before your flight date, you would be able to complain customer service of airmyanmar.com with this confirmation. For refund as well as term & conditions, please visit https://airmyanmar.com/privacy-policy. For more detail of your booking, you can check anytime in our website with your booking ID.
                </p>
                <p>
                </p>
                <p>
                <h4>{{$address->name}}</h4>
                <p>Address : {{$address->address}} </p>
                <p>Hotlines : @foreach(unserialize($address->mobiles) as $mobile) {{$mobile}} @endforeach </p>
                <p>Email : {{$address->email}}</p>
                </p>
            </div>
            <hr>
            <center><a href="#" onclick="HTMLtoPDF()" class="button1" style="text-decoration: none; background: #000; color: #fff; padding: 10px 5px 10px 5px;"> Download PDF </a></center>
            <hr>
            <center><a href="{{url('/')}}" class="button1" style="text-decoration: none; background: #000; color: #fff; padding: 10px 5px 10px 5px;"> Go Back Home </a></center>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6 hidden-xs" style="padding: 0; margin: 0; border-left: 1px solid #ccc; background: #fff; height: 100vh;">

        </div>
    </div>
</div>
<script src="{{asset('pdf/jspdf.js')}}"></script>
<script src="{{asset('pdf/jquery-2.1.3.js')}}"></script>
<script src="{{asset('pdf/pdfFromHTML.js')}}"></script>
</body>
</html>