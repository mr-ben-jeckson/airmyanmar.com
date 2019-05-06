<?php

namespace App\Http\Controllers\admin;

use App\airline;
use App\destination;
use App\tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = '4';
        $cities = destination::all();
        $airlines = airline::all();
        $tickets = DB::table('tickets')
                    ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                    ->select('tickets.*','airlines.logo','airlines.name')
                    ->orderBy('id', 'DESC')
                    ->paginate('5');
        return view('admin.flightManage',compact('a','cities','airlines','tickets'));

    }

    public function search()
    {
        $a = '4';
        $cities = destination::all();
        $airlines = airline::all();

        return view('admin.flightSearch',compact('a','cities','airlines'));
    }

    public function create()
    {
        $a = '4';
        $cities = destination::all();
        $airlines = airline::all();
        return view('admin.flightAdd',compact('a','cities','airlines'));
    }


    public function store(Request $request)
    {
        $ticket = new tickets;
        $ticket->from = $request->get('from');
        $ticket->to = $request->get('to');
        $ticket->flight = $request->get('flight');
        $ticket->flight_no = $request->get('flight_no');
        $ticket->route_type = $request->get('route_type');
        $ticket->via = $request->get('via');

        /** Make Available Dates Array and Save in Database */
        $dates = $request->get('adates');
        $dates = explode(',', $dates);
        $dateAry = array();
        foreach ($dates as $key=>$date) {
            array_push($dateAry, $date);
        }

        $ticket->adates = serialize($dateAry);
        /** End for Dates */

        $ticket->dep = $request->get('dep');
        $ticket->eta = $request->get('eta');
        $ticket->duration = $request->get('duration');
        $ticket->tm_cat = $request->get('tm_cat');
        $ticket->words = $request->get('words');
        $ticket->policy = $request->get('policy');

        /** Fares to Database */
        $ticket->saver_fare_usd = $request->get('saver_fare_usd');
        $ticket->saver_fare_child_usd = $request->get('saver_fare_child_usd');
        $ticket->saver_fare_infant_usd = $request->get('saver_fare_infant_usd');
        $ticket->saver_fare_mm = $request->get('saver_fare_mm');
        $ticket->saver_fare_child_mm = $request->get('saver_fare_child_mm');
        $ticket->saver_fare_infant_mm = $request->get('saver_fare_infant_mm');
        $ticket->plus_fare_usd = $request->get('plus_fare_usd');
        $ticket->plus_fare_child_usd = $request->get('plus_fare_child_usd');
        $ticket->plus_fare_infant_usd = $request->get('plus_fare_infant_usd');
        $ticket->plus_fare_mm = $request->get('plus_fare_mm');
        $ticket->plus_fare_child_mm = $request->get('plus_fare_child_mm');
        $ticket->plus_fare_infant_mm = $request->get('plus_fare_infant_mm');
        $ticket->save();

        return redirect(action('admin\TicketsController@index'))->with('status', $ticket->flight.' '. $ticket->flight_no. ' from '. $ticket->from. ' to '. $ticket->to. ' Flight Tickets were successfully added to our ticking database');
    }


    public function show(Request $request)
    {
        $a = '4';
        $cities = destination::all();
        $airlines = airline::all();
        $from = $request->get('from');
        $to = $request->get('to');
        if ($request->get('tm_cat') == null && $request->get('flight') == null){
            $tickets = DB::table('tickets')
                        ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                        ->where('from', '=', $from)->where('to', '=', $to)
                        ->select('tickets.*','airlines.logo','airlines.name')
                        ->orderBy('id', 'DESC')
                        ->paginate('5');
        }
        elseif ($request->get('tm_cat') == null){
            $flight = $request->get('flight');
            $tickets = DB::table('tickets')
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->where('from', '=', $from)->where('to', '=', $to)->where('flight', '=', $flight)
                ->select('tickets.*','airlines.logo','airlines.name')
                ->orderBy('id', 'DESC')
                ->paginate('5');
        }
        elseif ($request->get('flight') == null){
            $cat = $request->get('tm_cat');
            $tickets = DB::table('tickets')
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->where('from', '=', $from)->where('to', '=', $to)->where('tm_cat', '=', $cat)
                ->select('tickets.*','airlines.logo','airlines.name')
                ->orderBy('id', 'DESC')
                ->paginate('5');
        }
        else{
            $flight = $request->get('flight');
            $cat = $request->get('tm_cat');
            $tickets = DB::table('tickets')
                ->leftJoin('airlines','tickets.flight', '=', 'airlines.code')
                ->where('from', '=', $from)->where('to', '=', $to)->where('tm_cat', '=', $cat)->where('flight', $flight)
                ->select('tickets.*','airlines.logo','airlines.name')
                ->orderBy('id', 'DESC')
                ->paginate('5');
        }

        return view('admin.flightResults',compact('a','cities','airlines','tickets','request'));
    }

    public function edit($id)
    {
        $a = '4';
        $cities = destination::all();
        $airlines = airline::all();
        $ticket = tickets::find($id);
        return view('admin.flightEdit',compact('a','cities','airlines','ticket'));
    }


    public function update(Request $request, $id)
    {
        $ticket = tickets::find($id);
        $ticket->from = $request->get('from');
        $ticket->to = $request->get('to');
        $ticket->flight = $request->get('flight');
        $ticket->flight_no = $request->get('flight_no');
        $ticket->route_type = $request->get('route_type');
        $ticket->via = $request->get('via');

        /** Make Available Dates Array and Save in Database */
        $dates = $request->get('adates');
        $dates = explode(',', $dates);
        $dateAry = array();
        foreach ($dates as $key=>$date) {
            array_push($dateAry, $date);
        }

        $ticket->adates = serialize($dateAry);
        /** End for Dates */

        $ticket->dep = $request->get('dep');
        $ticket->eta = $request->get('eta');
        $ticket->duration = $request->get('duration');
        $ticket->tm_cat = $request->get('tm_cat');
        $ticket->words = $request->get('words');
        $ticket->policy = $request->get('policy');

        /** Fares to Database */
        $ticket->saver_fare_usd = $request->get('saver_fare_usd');
        $ticket->saver_fare_child_usd = $request->get('saver_fare_child_usd');
        $ticket->saver_fare_infant_usd = $request->get('saver_fare_infant_usd');
        $ticket->saver_fare_mm = $request->get('saver_fare_mm');
        $ticket->saver_fare_child_mm = $request->get('saver_fare_child_mm');
        $ticket->saver_fare_infant_mm = $request->get('saver_fare_infant_mm');
        $ticket->plus_fare_usd = $request->get('plus_fare_usd');
        $ticket->plus_fare_child_usd = $request->get('plus_fare_child_usd');
        $ticket->plus_fare_infant_usd = $request->get('plus_fare_infant_usd');
        $ticket->plus_fare_mm = $request->get('plus_fare_mm');
        $ticket->plus_fare_child_mm = $request->get('plus_fare_child_mm');
        $ticket->plus_fare_infant_mm = $request->get('plus_fare_infant_mm');
        $ticket->update();

        return redirect(url('/admin/tickets'))->with('status', $ticket->flight.' '. $ticket->flight_no. ' from '. $ticket->from. ' to '. $ticket->to. ' Flight Tickets were successfully edited in our ticking database');
    }


    public function destroy($id)
    {
        tickets::destroy($id);

        return back()->with('alert', 'Flight Tickets were successfully deleted');
    }
}
