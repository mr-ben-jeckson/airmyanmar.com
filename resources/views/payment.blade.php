@extends('layouts.global')
@section('title', 'Myanmar Flights Center, Airmyanmar.com : Payment Checkout')
@section('content')
    <section class="page-cover" style="background-image: url({{url('/images/airlinebanner.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Payment</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Booking</a></li>
                        <li class="active">Payment</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section>
    <div class="container-fluid process-container">
        <div class="col-md-3 process-bar-active"> <i class="fa fa-plane"></i> Step 1 <br> <span class="small">Flight Selected</span></div>
        <div class="col-md-3 process-bar-active"> <i class="fa fa-pencil"></i> Step 2 <br> <span class="small">Fill Passenger Information</span></div>
        <div class="col-md-3 process-bar-active"> <i class="fa fa-credit-card-alt"></i> Step 3 <br> <span class="small">Wait booking status & Make Payment</span> </div>
        <div class="col-md-3 process-bar"> <i class="fa fa-ticket"></i> Step 4 <br> <span class="small">Complete & Confirmation Download</span></div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12 thankyou-box">
            <div class="col-md-6">
                <b><i class="fa fa-sort-numeric-asc"></i> Booking ID :</b> {{$data->booking_id}}
                <hr>
            </div>
            <div class="col-md-6">
                <b><i class="fa fa-file-excel-o"></i> Invoice No :</b> {{$invoice}}
                <hr>
            </div>
            <div class="col-md-6">
                <b><i class="fa fa-bookmark"></i> Description :</b> {{$description}}
                <hr>
            </div>
            <div class="col-md-6">
                <b><i class="fa fa-credit-card"></i> Grand Total :</b> <span class="fare-box-text">{{$data->currency}} {{$data->grand_amount}}</span>
                <hr>
            </div>
            <div class="col-md-12">
                <b><i class="fa fa-bullhorn"></i> Notice :</b> Airmyanmar.com manged by Peace House Travel & Event Management Co.,Ltd. Payment Gateway from 2C2P Pte.,Ltd had securely integrated. To secure payment, our payment process is controlled by OTP to your mobile. You could
                <a href="https://www.2c2p.com/privacy.html" target="_blank" style="text-decoration: none;">learn more</a> for your data privacy & policy.
            </div>

        </div>
        <div class="col-md-12 pink-bg">
            <form action="{{url('/payment/payment.php')}}" method="post" onsubmit="return myFunction()" target="_blank">
                <input type="hidden" id="payment_description" name="payment_description" value="{{$description}}">
                <input type="hidden" name="invoice_no" id="invoice_no">
                <input type="hidden" name="order_id" id="order_id">
                <input type="hidden" name="currency" id="currency">
                <input type="hidden" name="amount" id="amount">
                <input type="hidden" name="customer_email" id="customer_email">
                <input type="hidden" name="pay_category_id" id="pay_category_id" value="">
                <input type="hidden" name="promotion" id="promotion" value="">
                <input type="hidden" name=" user_defined_1" id="user_defined_1" value="">
                <input type="hidden" name=" user_defined_2" id="user_defined_2" value="">
                <input type="hidden" name=" user_defined_3" id="user_defined_3" value="">
                <input type="hidden" name=" user_defined_4" id="user_defined_4" value="">
                <input type="hidden" name=" user_defined_5" id="user_defined_5" value="">
                <input type="hidden" name="result_url_1" id="result_url_1">
                <input type="hidden" name="result_url_2" id="result_url_2">
                <input type="hidden" name="hash_value" id="hash_value" value="">
                <input type="hidden" name="payment_option" id="payment_option">
            <div class="col-md-3 pull-right"><button type="submit" class="btn btn-orange btn-block" style="color: #fff;"><i class="fa fa-credit-card-alt"></i> Continue To Pay</button></div>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
    </section>
    @stop
    @section('script')
        <script type="text/javascript">
            function myFunction() {
                document.getElementById("invoice_no").value = "{{$invoice}}";
                document.getElementById("order_id").value = "{{$data->booking_id}}";
                document.getElementById("currency").value = "{{$currency}}";
                document.getElementById("amount").value = "{{$price}}";
                document.getElementById("customer_email").value = "{{$data->c_email}}";
                document.getElementById("result_url_1").value = "{{$url1}}";
                document.getElementById("result_url_2").value = "{{$url2}}";
                document.getElementById("payment_option").value = "{{$payment_option}}";
            }
        </script>
        @endsection