<?php

namespace App\Http\Controllers;

use App\airline;
use App\destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FlightsController extends Controller
{
    public function showFirstFlight(Request $request)
    {
        $nation = $request->get('nation');
        $class = $request->get('class');
        $adult = $request->get('adults');
        $child = $request->get('child');
        $infant = $request->get('infant');
        $pax = $adult + $child + $infant;
        $date = $request->get('dep_date');
        $newdate = strtotime($date);
        $airlines = airline::all();
        $checkdate = date('d M Y',$newdate);
        $sector = destination::all();
        $from = destination::where('code', $request->from)->first();
        $to = destination::where('code', $request->to)->first();
        Session::put('return_from', $request->to);
        Session::put('return_to', $request->from);
        Session::put('return_date', $request->return_date);

        if ($request->airline == null && $request->tm_cat == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('airlines.name','asc')->paginate('6');
        }
        elseif ($request->airline == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)->where('tm_cat', '=', $request->tm_cat)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }
        elseif ($request->tm_cat == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)->where('flight', '=', $request->airline)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }
        elseif (!$request->tm_cat == null && !$request->airline == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)->where('flight', '=', $request->airline)->where('tm_cat', '=', $request->tm_cat)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }

        return view('flightsRoundResult',compact('data','nation','class','pax','adult','child','infant','request','sector','from','to','checkdate','date','airlines'));
    }

    public function showSecondFlight(Request $request)
    {
        Session::put('dep_flight', $request->flight);
        Session::put('dep_date', $request->date);
        $nation = $request->get('nation');
        $class = $request->get('class');
        $adult = $request->get('adult');
        $child = $request->get('child');
        $infant = $request->get('infant');

        Session::put('nation', $nation);
        Session::put('class', $class);
        Session::put('adult', $adult);
        Session::put('child', $child);
        Session::put('infant', $infant);

        $pax = $adult + $child + $infant;
        if (!$request->return_date) {
            $date = \session('return_date');
        }
        else{
            $date = $request->return_date;
            Session::put('return_date', $date);
        }
        $newdate = strtotime($date);
        $airlines = airline::all();
        $checkdate = date('d M Y',$newdate);
        $sector = destination::all();
        $flight_from = \session('return_from');
        $flight_to = \session('return_to');
        $from = destination::where('code', $flight_from)->first();
        $to = destination::where('code', $flight_to)->first();

        if ($request->airline == null && $request->tm_cat == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $flight_from)->where('to', '=', $flight_to)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('airlines.name','asc')->paginate('6');
        }
        elseif ($request->airline == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $flight_from)->where('to', '=', $flight_to)->where('tm_cat', '=', $request->tm_cat)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }
        elseif ($request->tm_cat == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $flight_from)->where('to', '=', $flight_to)->where('flight', '=', $request->airline)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }
        elseif (!$request->tm_cat == null && !$request->airline == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $flight_from)->where('to', '=', $flight_to)->where('flight', '=', $request->airline)->where('tm_cat', '=', $request->tm_cat)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }

        return view('flightsReturnResult',compact('data','nation','class','pax','adult','child','infant','request','sector','from','to','checkdate','date','airlines'));
    }

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
    public function show(Request $request)
    {
        $nation = $request->get('nation');
        $class = $request->get('class');
        $adult = $request->get('adults');
        $child = $request->get('child');
        $infant = $request->get('infant');
        $pax = $adult + $child + $infant;
        $date = $request->get('date');
        $newdate = strtotime($date);
        $airlines = airline::all();
        $checkdate = date('d M Y',$newdate);
        $sector = destination::all();
        $from = destination::where('code', $request->from)->first();
        $to = destination::where('code', $request->to)->first();

        if ($request->airline == null && $request->tm_cat == null)
        {
        $data = DB::table('tickets')
                    ->where('from', '=', $request->from)->where('to', '=', $request->to)
                    ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                    ->select('tickets.*','airlines.logo','airlines.name')
                    ->where('adates', 'like', "%{$date}%")->orderBy('airlines.name','asc')->paginate('6');
        }
        elseif ($request->airline == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)->where('tm_cat', '=', $request->tm_cat)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }
        elseif ($request->tm_cat == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)->where('flight', '=', $request->airline)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }
        elseif (!$request->tm_cat == null && !$request->airline == null)
        {
            $data = DB::table('tickets')
                ->where('from', '=', $request->from)->where('to', '=', $request->to)->where('flight', '=', $request->airline)->where('tm_cat', '=', $request->tm_cat)
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->select('tickets.*','airlines.logo','airlines.name')
                ->where('adates', 'like', "%{$date}%")->orderBy('saver_fare_usd','asc')->paginate('6');
        }

        return view('flightsOneWayResult',compact('data','nation','class','pax','adult','child','infant','request','sector','from','to','checkdate','date','airlines'));
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
