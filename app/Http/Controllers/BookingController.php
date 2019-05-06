<?php

namespace App\Http\Controllers;

use App\airline;
use App\booking;
use App\contact;
use App\e_tickets;
use App\notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    /** Show Passenger For Round Trip Booking*/
    public function indexRound(Request $request)
    {
        $bid = random_int('100','999').random_int('100','999').random_int('100','999');
        $Dflight = tickets::find($request->flight[0]);
        $Rflight = tickets::find($request->flight[1]);
        $Dairline = airline::where('code', $Dflight->flight)->firstOrFail();
        $Rairline = airline::where('code', $Rflight->flight)->firstOrFail();
        $passenger = session('adult') + session('child') + session('infant');
        Session::put('return_class', $request->class);
        $dep = session('dep_date');
        $return = session('return_date');
        if (session('nation') == 1)
        {
            $c = "USD";
        }
        else{
            $c = "MMK";
        }

        if (session('class') == 1)
        {
            if ($c == "USD"){
                $Dtotal =(session('adult') * $Dflight->saver_fare_usd) + (session('child') * $Dflight->saver_fare_child_usd) + (session('infant') * $Dflight->saver_fare_infant_usd);
            }
            else{
                $Dtotal =(session('adult') * $Dflight->saver_fare_mm) + (session('child') * $Dflight->saver_fare_child_mm) + (session('infant') * $Dflight->saver_fare_infant_mm);
            }
        }
        else{
            if ($c == "USD"){
                $Dtotal =(session('adult') * $Dflight->plus_fare_usd) + (session('child') * $Dflight->plus_fare_child_usd) + (session('infant') * $Dflight->plus_fare_infant_usd);
            }
            else{
                $Dtotal =(session('adult') * $Dflight->plus_fare_mm) + (session('child') * $Dflight->plus_fare_child_mm) + (session('infant') * $Dflight->plus_fare_infant_mm);
            }
        }

        if (session('return_class') == 1)
        {
            if ($c == "USD"){
                $Rtotal =(session('adult') * $Rflight->saver_fare_usd) + (session('child') * $Rflight->saver_fare_child_usd) + (session('infant') * $Rflight->saver_fare_infant_usd);
            }
            else{
                $Rtotal =(session('adult') * $Rflight->saver_fare_mm) + (session('child') * $Rflight->saver_fare_child_mm) + (session('infant') * $Rflight->saver_fare_infant_mm);
            }
        }
        else{
            if ($c == "USD"){
                $Rtotal =(session('adult') * $Rflight->plus_fare_usd) + (session('child') * $Rflight->plus_fare_child_usd) + (session('infant') * $Rflight->plus_fare_infant_usd);
            }
            else{
                $Rtotal =(session('adult') * $Rflight->plus_fare_mm) + (session('child') * $Rflight->plus_fare_child_mm) + (session('infant') * $Rflight->plus_fare_infant_mm);
            }
        }

        $total = $Dtotal + $Rtotal;

        if ($request->coupon)
        {
            $Ddiscount = DB::table('coupons')->where('keys', $request->coupon)->where('active_dates', 'like', "%{$dep}%")->where('flights', 'like', "%{$Dflight->id}%")->first();
            $Rdiscount = DB::table('coupons')->where('keys', $request->coupon)->where('active_dates', 'like', "%{$return}%")->where('flights', 'like', "%{$Rflight->id}%")->first();

            if ($Ddiscount){
                if ($c == "USD")
                {
                    $savebase = $Ddiscount->fare_off_usd;
                    $save = $savebase * session('adult');
                    $Dnewtotal = $Dtotal - $save;
                }
                else{
                    $savebase =$Ddiscount->fare_off_mm;
                    $save = $savebase * $request->adult;
                    $Dnewtotal = $Dtotal - $save;
                }
            }

            if ($Rdiscount){
                if ($c == "USD")
                {
                    $savebase = $Rdiscount->fare_off_usd;
                    $save = $savebase * session('adult');
                    $Rnewtotal = $Rtotal - $save;
                }
                else{
                    $savebase =$Rdiscount->fare_off_mm;
                    $save = $savebase * $request->adult;
                    $Rnewtotal = $Rtotal - $save;
                }
            }

            if ($Ddiscount && $Rdiscount){
                $discount = $Ddiscount;
                $newtotal = $Dnewtotal + $Rnewtotal;
            }
            elseif(!$Rdiscount && $Ddiscount){
                $discount = $Ddiscount;
                $newtotal = $Dnewtotal + $Rtotal;
            }
            elseif(!$Ddiscount && $Rdiscount){
                $discount = $Rdiscount;
                $newtotal = $Rnewtotal + $Dtotal;
            }
           else{
               $discount = null;
           }
        }
        else{
            $discount = null;
        }

        if ($discount){
            $grand = $newtotal + (0.05 * $newtotal);
        }
        else{
            $grand = $total + (0.05 * $total);
        }


    return view('roundbooking',compact('Dflight','Rflight','request','passenger','c','Dairline','Rairline','bid','discount','total','grand','newtotal','discount'));

    }


    /** Show Passenger For One Way Booking*/
    public function index(Request $request)
    {
        $bid = random_int('100','999').random_int('100','999').random_int('100','999');
        $flight = tickets::find($request->flight);
        $airline = airline::where('code', $flight->flight)->firstOrFail();
        $passenger = $request->adult+$request->child+$request->infant;

        if ($request->class == 1)
        {
            if ($request->nation == 1)
            {
                $total = ($request->adult*$flight->saver_fare_usd)+($request->child*$flight->saver_fare_child_usd)+($request->infant*$flight->saver_fare_infant_usd);
            }
            else{
                $total = ($request->adult*$flight->saver_fare_mm)+($request->child*$flight->saver_fare_child_mm)+($request->infant*$flight->saver_fare_infant_mm);
            }
        }
        else
        {
            if ($request->nation == 1)
            {
                $total = ($request->adult*$flight->plus_fare_usd)+($request->child*$flight->plus_fare_child_usd)+($request->infant*$flight->plus_fare_infant_usd);
            }
            else{
                $total = ($request->adult*$flight->plus_fare_mm)+($request->child*$flight->plus_fare_child_mm)+($request->infant*$flight->plus_fare_infant_mm);
            }

        }

        if ($request->nation == 1)
        {
            $c = "USD";
        }
        else{
            $c = "MMK";
        }

        if ($request->coupon)
        {
            $discount = DB::table('coupons')->where('keys', $request->coupon)->where('active_dates', 'like', "%{$request->date}%")->where('flights', 'like', "%{$request->flight}%")->first();

            if ($discount){

                if ($request->nation == 1)
                {
                    $savebase = $discount->fare_off_usd;
                    $save = $savebase * $request->adult;
                    $newtotal = $total - $save;
                }
                else{
                    $savebase =$discount->fare_off_mm;
                    $save = $savebase * $request->adult;
                    $newtotal = $total - $save;
                }
                $grand = $newtotal + ($newtotal * 0.05);
            }
            else{
                $grand = $total + ($total * 0.05);
            }
        }
        else{
            $discount = null;
            $grand = $total + ($total * 0.05);
        }

        return view('booking',compact('flight','request','bid','passenger','total','grand','c','newtotal','save','discount','airline'));
    }


    public function create(Request $request)
    {
        $booking_id = $request->get('bid');
        if (Auth::check()){
            $user = Auth::user()->id;
            $customer = Auth::user()->name;
        }else{
            $user = null;
            $customer = "Guest:".$booking_id;
        }
            $c_email = $request->get('c_email');
            $route = $request->get('route');
        if ($route == "oneway"){
            $ticket = $request->get('ticket');
            $return_date = null;
            $return_class = null;
        }
        else{
            $tickets = $request->get('ticket');
            $ticketAry = array();
            foreach ($tickets as $key=>$ticket){
                array_push($ticketAry, $ticket);
            }
            $return_class = session('return_class');
            $return_date = session('return_date');
        }

            $dep_date = $request->get('dep');
            $booking_date = Carbon::now()->format('m/d/Y');
            $status = '1';
            $pay_opt = $request->get('pay_opt');
            $class = $request->get('class');
            $adult = $request->get('adult');
            $child = $request->get('child');
            $infant = $request->get('infant');
            $pax = array("adult"=>$adult,"child"=>$child,"infant"=>$infant);
            $total = $request->get('total');
            $grand_amount = $request->get('grand');
            $coupon_code = $request->get('coupon_code');
            $discount_off = $request->get('discount_off');
            $currency = $request->get('currency');

            $titles = $request->get('title');
            $titleAry = array();
            foreach ($titles as $key=>$title) {
                array_push($titleAry, $title);
            }
            $fullnames = $request->get('fullname');
            $nameAry = array();
            foreach ($fullnames as $key=>$fullname) {
                array_push($nameAry, $fullname);
            }
            $emails = $request->get('email');
            $emailAry = array();
            foreach ($emails as $key=>$email){
                array_push($emailAry, $email);
            }
            $phs = $request->get('mobile');
            $phAry = array();
            foreach ($phs as $key=>$ph){
                array_push($phAry, $ph);
            }
            $passportids = $request->get('passport');
            $pidAry = array();
            foreach ($passportids as $key=>$passportid){
                array_push($pidAry, $passportid);
            }
            $passportexps = $request->get('passport_exp');
            $pidExpAry = array();
            foreach ($passportexps as $key=>$passportexp){
                array_push($pidExpAry, $passportexp);
            }
            $nations = $request->get('nationality');
            $nationAry = array();
            foreach ($nations as $key=>$nation){
                array_push($nationAry, $nation);
            }
            $dobs = $request->get('dob');
            $dobAry = array();
            foreach ($dobs as $key=>$dob){
                array_push($dobAry, $dob);
            }

            $check = booking::where('booking_id', $booking_id)->first();
            if ($check)
            {
                return redirect('/')->with('status', 'Booking ID '.$booking_id.' have already existed in our booking system. It means resubmitting. Please check your booking in the track booking');
            }
            else {
                $booking = new booking;
                $booking->user = $user;
                $booking->booking_id = $booking_id;
                $booking->customer = $customer;
                $booking->c_email = $c_email;
                $booking->route = $route;
                if ($route == "oneway")
                {
                $booking->ticket = $ticket;
                }
                else{
                $booking->ticket = serialize($ticketAry);
                }
                $booking->dep_date = $dep_date;
                $booking->return_date = $return_date;
                $booking->booking_date = $booking_date;
                $booking->status = $status;
                $booking->pay_opt = $pay_opt;
                $booking->class = $class;
                $booking->return_class = $return_class;
                $booking->currency = $currency;
                $booking->pax = serialize($pax);
                $booking->total = $total;
                $booking->grand_amount = $grand_amount;
                $booking->coupon_code = $coupon_code;
                $booking->discount_off = $discount_off;
                $booking->number = $request->get('number');
                $booking->passenger_titles = serialize($titleAry);
                $booking->passenger_names = serialize($nameAry);
                $booking->passenger_mobiles = serialize($phAry);
                $booking->passenger_passports = serialize($pidAry);
                $booking->passenger_passport_exps = serialize($pidExpAry);
                $booking->passenger_nationality = serialize($nationAry);
                $booking->passenger_emails = serialize($emailAry);
                $booking->passenger_dobs = serialize($dobAry);
                $booking->save();

                $status = new notification;
                $status->name = "booking";
                $status->app_id = $booking->id;
                $status->word = $customer.' booked a flight';
                $status->status = '0';
                $status->save();

                $address = contact::find(1);

                if ($booking->route == "oneway"){
                    $flight = tickets::find($booking->ticket);
                    $operator = airline::where('code', $flight->flight)->first();
                    $dataMessage = ['data'=>$booking,'flight'=>$flight, 'address'=>$address, 'operator'=>$operator];
                }
                else{
                    $flight = tickets::find(unserialize($booking->ticket)['0']);
                    $flight1 = tickets::find(unserialize($booking->ticket)['1']);
                    $operator = airline::where('code', $flight->flight)->first();
                    $operator1 = airline::where('code', $flight1->flight)->first();
                    $dataMessage = ['data'=>$booking,'flight'=>$flight, 'address'=>$address, 'operator'=>$operator, 'flight1'=>$flight1, 'operator1'=>$operator1];
                }

                Mail::send('email.mail',$dataMessage,function ($message) use ($c_email){
                $subject = "Flight Booking Notification";
                $email = $c_email;
                $username = "Dear Customer";
                $message->from('no-reply@airmyanmar.com', 'Air Myanmar | Myanmar Flights Center');
                $message->to($email,$username)->subject($subject);

                });

                return view('thankyou',$dataMessage);
            }






    }

    public function indexTrack()
    {
        return view('track.index');
    }

    public function showTrack(Request $request)
    {
       $bid = $request->get('bid');
       $email = $request->get('email');

       $data = booking::where('booking_id', '=', $bid)->first();

       if ($data){

           if ($data->c_email == $email){

               if ($data->route == "oneway")
               {
                   $flight = tickets::find($data->ticket);
                   $airline = airline::where('code', $flight->flight)->firstOrFail();
               }
               else{
                   $flight = tickets::find(unserialize($data->ticket)[0]);
                   $airline = airline::where('code', $flight->flight)->firstOrFail();
                   $flight1 = tickets::find(unserialize($data->ticket)[1]);
                   $airline1 = airline::where('code', $flight1->flight)->firstOrFail();
               }

               return view('track.result',compact('data','flight','flight1','airline','airline1'));

           }
           else{

               return back()->with('status', 'Your filled email address does not match with contact email address of booking. Please try again. Privacy is priority');
           }

       }
       else{

           return back()->with('status', 'Your filled booking ID does not exist in our booking record');

       }

    }

    public function showEletter($booking_id)
    {
        $data = booking::where('booking_id', '=', $booking_id)->where('status', '=', '3')->first();

        if ($data){
            if ($data->route == "oneway")
            {
                $ticket = tickets::find($data->ticket);
            }
            else{
                $ticket = tickets::find(unserialize($data->ticket)['0']);
            }
            $address = contact::find('1');
            return view('confirmation',compact('address','ticket','data'));
        }
        else{
            return back();
        }
    }

    public function downloadTicket($booking_id)
    {
        $data = e_tickets::where('booking_id', '=', $booking_id)->first();

        if ($data){
            return view('downloadTicket',compact('data'));
        }
        else{
            return back();
        }
    }

    public function myBooking()
    {
        if (Auth::check())
        {
            $check = Auth::user()->id;
            $user = User::find($check);
            $bookings = booking::where('user', '=', $check)->orderBy('id','desc')->paginate('9');

            return view('userBooking',compact('bookings','user'));
        }
        else{

            return back()->with('status', 'Please log in with your account to check your booking list.');
        }
    }

    public function filter(Request $request)
    {
        if (Auth::check())
        {
            $booking_id = $request->get('booking_id');
            $dep_date = $request->get('dep_date');
            $booking_date = $request->get('booking_date');
            $status = $request->get('status');
            $user = Auth::user()->id;
            $customer = User::find($user);
            Session::put('a', $booking_id);
            Session::put('b', $dep_date);
            Session::put('c', $booking_date);
            Session::put('d', $status);
            if ($booking_id)
            {
                $bookings = booking::where('user', '=', $user)->where('booking_id', '=', $booking_id)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date && $booking_date == null && $status == null && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('dep_date', '=', $dep_date)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date == null && $booking_date && $status == null && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('booking_date', '=', $booking_date)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date == null && $booking_date == null && $status && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('status', '=', $status)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date == null && $booking_date && $status && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('status', '=', $status)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date && $booking_date && $status == null && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('booking_date', '=', $booking_date)->where('dep_date', '=', $dep_date)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date == null && $booking_date && $status && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('booking_date', '=', $booking_date)->where('status', '=', $status)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date && $booking_date == null && $status && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('dep_date', '=', $dep_date)->where('status', '=', $status)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date && $booking_date && $status && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->where('dep_date', '=', $dep_date)->where('booking_date', '=', $booking_date)->where('status', '=', $status)->orderBy('id','desc')->paginate('9');
            }
            elseif ($dep_date == null && $booking_date == null && $status == null && $booking_id == null)
            {
                $bookings = booking::where('user', '=', $user)->orderBy('id','desc')->paginate('9');
            }

            return view('userBookingFilter',compact('bookings','customer'));
        }
        else{

            return back()->with('status', 'Please log in with your account to check your booking list.');
        }
    }

    public function rank()
    {
        if (Auth::check())
        {
            $user = Auth::user()->id;
            $customer = User::find($user);
            $data = booking::where('status', '=', '4')->where('currency', '=', "USD")->where('user', '=', $user)->get();
            $data1 = booking::where('status', '=', '4')->where('currency', '=', "MMK")->where('user', '=', $user)->get();

            $pointForUSD = $data->sum('grand_amount')*0.5;
            $pointForMM = $data1->sum('grand_amount')*0.0005;

            $point = round($pointForUSD + $pointForMM);


            return view('rank',compact('point','customer'));
        }
        else{

            return back()->with('status', 'Please log in with your account to check your member ranking');
        }
    }
}
