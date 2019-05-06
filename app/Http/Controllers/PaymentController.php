<?php

namespace App\Http\Controllers;

use App\booking;
use App\tickets;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($booking_id)
    {
        $url1 = "https://airmyanmar.com/payment/payment-thank.php";
        $url2 = "https://airmyanmar.com/payment/payment-thank.php";
        $data = booking::where('booking_id', '=', $booking_id)->where('status', '=', '2')->firstOrFail();
        $invoice = "AM-".$data->booking_id.date('mdY');
        function currencyFormat($price)
        {
            $price = sprintf('%.2f',$price);
            $price = str_replace(".", "", $price);
            $price = sprintf('%012d', $price);
            return $price;
        }
        $price = currencyFormat($data->grand_amount);

        if ($data->currency == "USD"){
            $currency = 840;
            $payment_option = "";
        }
        elseif ($data->currency == "MMK"){
            $currency = 104;
            $payment_option = "";
        }

        if ($data->route == "oneway"){
            $ticket = tickets::find($data->ticket);
            $description = "Flight (".$ticket->from.") - (".$ticket->to.") | Payment to Airmyanmar.com";
        }
        else{
            $ticket = tickets::find(unserialize($data->ticket)['0']);
            $description = "Flight (".$ticket->from.") - (".$ticket->to.") - (".$ticket->from.") | Payment to Airmyanmar.com";
        }

        return view('payment',compact('data','invoice','description','currency','payment_option','price','url1','url2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
