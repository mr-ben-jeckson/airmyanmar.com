<?php

namespace App\Http\Controllers\admin;

use App\airline;
use App\booking;
use App\contact;
use App\destination;
use App\e_tickets;
use App\notification;
use App\tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $active = '6';
        $booking = booking::orderBy('id','Desc')->paginate(9);
        $data = ['booking'=>$booking, 'a'=>$active];

        return view('admin.booking',$data);
    }

    public function filter(Request $request)
    {
        $a = '6';
        if ($request->bid == null && $request->dep_date == null && $request->booking_date ==  null && $request->pnr == null && $request->c_email == null && $request->status == null){

            return back()->with('status', 'Please fill at least one field to filter out the bookings');
        }
        else{
            if ($request->bid)
            {
                $bid = $request->bid;
                $booking = booking::where('booking_id', '=', $bid)->firstOrFail();
                $bookings = null;
            }
            else{

                if ($request->pnr)
                {
                    $pnr = $request->pnr;
                    $booking = booking::where('pnr', '=', $pnr)->firstOrFail();
                    $bookings = null;
                }
                elseif ($request->dep_date && $request->booking_date && $request->c_email && $request->status )
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('booking_date', $request->bookng_date)
                        ->where('c_email', $request->c_email)
                        ->where('status', $request->status)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date && $request->booking_date && $request->c_email)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('booking_date', $request->bookng_date)
                        ->where('c_email', $request->c_email)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date && $request->booking_date && $request->status)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('booking_date', $request->bookng_date)
                        ->where('status', $request->status)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date && $request->status && $request->c_email)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('c_email', $request->c_email)
                        ->where('status', $request->status)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->status && $request->booking_date && $request->c_email)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('status', $request->status)
                        ->where('booking_date', $request->bookng_date)
                        ->where('c_email', $request->c_email)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date && $request->booking_date)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('booking_date', $request->bookng_date)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->c_email && $request->status)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('c_email', $request->c_email)
                        ->where('status', $request->status)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date && $request->status)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('status', $request->status)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date && $request->c_email)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)
                        ->where('c_email', $request->c_email)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->booking_date && $request->status)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('booking_date', $request->booking_date)
                        ->where('status', $request->status)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->booking_date && $request->c_email)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('booking_date', $request->booking_date)
                        ->where('c_email', $request->c_email)
                        ->orderBy('id','Desc')
                        ->paginate('9');
                }
                elseif ($request->dep_date)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('dep_date', $request->dep_date)->orderBy('id','Desc')->paginate('9');
                }
                elseif ($request->booking_date)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('booking_date', $request->booking_date)->orderBy('id','Desc')->paginate('9');
                }
                elseif ($request->c_email)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('c_email', $request->c_email)->orderBy('id','Desc')->paginate('9');
                }
                elseif ($request->status)
                {
                    $booking = null;
                    $bookings = DB::table('bookings')->where('status', $request->status)->orderBy('id','Desc')->paginate('9');
                }
            }
        return view('admin.bookingfilter',compact('booking','bookings','a','request'));
        }
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

    public function detail($id)
    {
        $a = '6';
        $data = booking::find($id);

        $reminder = notification::where('name', '=', "booking")->where('app_id', '=', $id)->first();
        if ($reminder){
        $reminder->status = 1;
        $reminder->update();
        }

        if ($data->route == "oneway")
        {
            $ticket = tickets::find($data->ticket);
            $airline = airline::where('code', '=', $ticket->flight)->firstOrFail();

        }
        else{

            $ticket = tickets::find(unserialize($data->ticket)['0']);
            $airline = airline::where('code', '=', $ticket->flight)->firstOrFail();
            $ticket1 = tickets::find(unserialize($data->ticket)['1']);
            $airline1 = airline::where('code', '=', $ticket1->flight)->firstOrFail();
        }

        return view('admin.oneBooking',compact('ticket','airline','ticket1','airline1','data','a'));
    }

    public function changeFlight($id)
    {

    }

    public function saleAction(Request $request, $id)
    {
        $booking = booking::find($id);
        $booking->status = $request->status;
        $booking->pnr = $request->get('pnr');
        $booking->option = $request->get('option');
        $booking->update();

        $address = contact::find('1');
        $c_email = $booking->c_email;

        if ($request->hasFile('ticket'))
        {
            $file = $request->file('ticket');
            $filename = $booking->booking_id.'-Ticket.pdf';
            $file->move(public_path().'/booking/download/ticket/'.$booking->booking_id.'/',$filename);

            $e_ticket = new e_tickets;
            $e_ticket->file = $filename;
            $e_ticket->booking_id = $booking->booking_id;
            $e_ticket->save();

        }

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

        return back()->with('status', 'Booking ID '.$booking->booking_id.' was successfully changed in status');
    }

    public function changeDepDate(Request $request, $id)
    {
        $data = booking::find($id);
        $data->dep_date = $request->get('dep_date');
        $data->update();

        return back()->with('status', 'Booking ID '.$data->booking_id.' was successfully change in departure date to '.$data->dep_date);
    }

    public function changeReturnDate(Request $request, $id)
    {
        $data = booking::find($id);
        $data->return_date = $request->get('return_date');
        $data->update();

        return back()->with('status', 'Booking ID '.$data->booking_id.' was successfully change in return date to '.$data->return_date);
    }
}
