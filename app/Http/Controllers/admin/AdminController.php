<?php

namespace App\Http\Controllers\admin;

use App\adsbanner;
use App\airline;
use App\announcement;
use App\booking;
use App\contact;
use App\coupon;
use App\destination;
use App\message;
use App\notification;
use App\page;
use App\story;
use App\testimonial;
use App\tickets;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $a = '1';
        $airlines = airline::all()->count();
        $users = User::all()->count();
        $cities = destination::all()->count();
        $tickets = tickets::all()->count();
        $bookings = booking::all()->count();
        $feedbacks = testimonial::all()->count();
        $messages = message::all()->count();
        $pages = page::all()->count();
        $incomeUSD = booking::where('currency', '=', 'USD')->whereIn('status', ['3','4'])->get()->sum('grand_amount');
        $incomeMMK = booking::where('currency', '=', 'MMK')->whereIn('status', ['3','4'])->get()->sum('grand_amount');
        $giveUSD = booking::where('currency', '=', 'USD')->whereIn('status', ['3','4'])->get()->sum('discount_off');
        $giveMMK = booking::where('currency', '=', 'MMK')->whereIn('status', ['3','4'])->get()->sum('discount_off');
        $checkMonth = date('m');
        $checkYear = date('Y');
        $jan = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['01'])->get()->count();
        $feb = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['02'])->get()->count();
        $mar = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['03'])->get()->count();
        $apr = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['04'])->get()->count();
        $may = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['05'])->get()->count();
        $jun = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['06'])->get()->count();
        $jul = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['07'])->get()->count();
        $aug = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['08'])->get()->count();
        $sep = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['09'])->get()->count();
        $oct = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['10'])->get()->count();
        $nov = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['11'])->get()->count();
        $dec = DB::table('bookings')->whereIn('status', ['3','4'])->whereRaw('MONTH(created_at) = ?', ['12'])->get()->count();
        $currentMonthSaleUSD = DB::table('bookings')->whereIn('status', ['3','4'])->where('currency', "USD")->whereRaw('MONTH(created_at) = ?', [$checkMonth])->whereRaw('YEAR(created_at) = ?', [$checkYear])->get()->sum('grand_amount');
        $currentMonthSaleMMK = DB::table('bookings')->whereIn('status', ['3','4'])->where('currency', "MMK")->whereRaw('MONTH(created_at) = ?', [$checkMonth])->whereRaw('YEAR(created_at) = ?', [$checkYear])->get()->sum('grand_amount');
        $currentMonthSaleF = DB::table('bookings')->whereIn('status', ['3','4'])->where('currency', "USD")->whereRaw('MONTH(created_at) = ?', [$checkMonth])->whereRaw('YEAR(created_at) = ?', [$checkYear])->get()->count();
        $currentMonthSaleL = DB::table('bookings')->whereIn('status', ['3','4'])->where('currency', "MMK")->whereRaw('MONTH(created_at) = ?', [$checkMonth])->whereRaw('YEAR(created_at) = ?', [$checkYear])->get()->count();
        $status1 = booking::where('status', '=', '1')->get()->count();
        $status2 = booking::where('status', '=', '2')->get()->count();
        $status3 = booking::where('status', '=', '3')->get()->count();
        $status4 = booking::where('status', '=', '4')->get()->count();
        $status5 = booking::where('status', '=', '5')->get()->count();
        $status6 = booking::where('status', '=', '6')->get()->count();
        $announcement = announcement::all()->count();
        $promo = coupon::all()->count();
        $banner = adsbanner::all()->count();
        $blog = story::all()->count();


        return view('admin.dashboard',compact('a','airlines','users','cities','tickets','bookings','feedbacks','messages','pages','incomeMMK','incomeUSD','giveUSD','giveMMK','currentMonthSaleUSD','currentMonthSaleMMK','currentMonthSaleF','currentMonthSaleL','status1','status2','status3','status4','status5','status6','announcement','promo','banner','blog','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'));
    }

    public function passengers()
    {
        $a = '20';
        $passenger = booking::all();
        return view('admin.passengers',compact('passenger','a'));
    }

    public function markReadAll()
    {
       DB::table('notifications')->where('status', 0)->update(['status'=>'1']);
       return back();
    }

    public function contact()
    {
        $a = '14';
        $data = contact::find('1');

        return view('admin.contact',compact('data','a'));
    }

    public function updateContact(Request $request)
    {
        $data = contact::find('1');
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $mobiles = $request->get('mobiles');
        $mobAry = array();
        foreach ($mobiles as $key=>$mobile) {
            array_push($mobAry, $mobile);
        }
        $data->mobiles = serialize($mobAry);
        $data->latitude = $request->get('latitude');
        $data->longitude = $request->get('longitude');
        $data->update();

        return back()->with('status', 'Contacts were successfully saved');
    }
}
