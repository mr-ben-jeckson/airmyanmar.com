<?php

namespace App\Http\Controllers\admin;

use App\coupon;
use App\tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function create()
    {
        $a = '5';
        $data = tickets::all();

        return view('admin.createPromo',compact('a','data'));
    }

    public function index()
    {
        $a = '5';
        $data = coupon::paginate('9');

        return view('admin.promo',compact('a','data'));
    }

    public function save(Request $request)
    {
        $data = new coupon;
        $data->keys = $request->get('keys');
        $flights = $request->get('flights');
        $tkAry = array();
        foreach ($flights as $key=>$flight){
            array_push($tkAry, $flight);
        }
        $data->flights = serialize($tkAry);
        $dates = $request->get('adates');
        $dates = explode(',', $dates);
        $dateAry = array();
        foreach ($dates as $key=>$date) {
            array_push($dateAry, $date);
        }

        $data->active_dates = serialize($dateAry);
        $data->fare_off_mm = $request->get('fare_off_mm');
        $data->fare_off_usd = $request->get('fare_off_usd');
        $data->save();

        return redirect(action('admin\CouponController@index'))->with('status', 'Promo Coupon was successfully added');
    }

    public function update(Request $request, $id)
    {
        $data = coupon::find($id);
        $data->keys = $request->get('keys');
        $flights = $request->get('flights');
        $tkAry = array();
        foreach ($flights as $key=>$flight){
            array_push($tkAry, $flight);
        }
        $data->flights = serialize($tkAry);
        $dates = $request->get('adates');
        $dates = explode(',', $dates);
        $dateAry = array();
        foreach ($dates as $key=>$date) {
            array_push($dateAry, $date);
        }

        $data->active_dates = serialize($dateAry);
        $data->fare_off_mm = $request->get('fare_off_mm');
        $data->fare_off_usd = $request->get('fare_off_usd');
        $data->update();

        return redirect(action('admin\CouponController@index'))->with('status', 'Promo Coupon was successfully updated');
    }

    public function edit($id)
    {
        $a = '5';
        $coupon = coupon::find($id);
        $data = tickets::all();

        return view('admin.promoEdit',compact('a','coupon','data'));

    }

    public function delete($id)
    {
        coupon::destroy($id);

        return back()->with('alert', 'Coupon was successfully deleted');
    }
}
