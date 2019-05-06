<?php

namespace App\Http\Controllers;

use App\adsbanner;
use App\airline;
use App\announcement;
use App\booking;
use App\contact;
use App\destination;
use App\keyword;
use App\main_content;
use App\message;
use App\notification;
use App\page;
use App\story;
use App\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /** Home & Welcome */
    public function welcome()
    {
        $ads = adsbanner::where('status','=', 1)->get();
        $sector = destination::all();
        $airlines = airline::all();
        $sectorFromRGN = DB::table('destinations')->whereIn('code', ['MDL', 'NYU', 'HEH', 'SNW', 'NYT', 'KAW'])->get();
        $sectorFromMDL = DB::table('destinations')->whereIn('code', ['RGN', 'NYU', 'HEH', 'SNW', 'THL', 'MYT'])->get();
        $ticket = tickets::all();
        $keyword = keyword::first();
        $content = main_content::first();
        $promo = announcement::where('status','=', '1')->orderBy('id', 'desc')->first();


        return view('welcome',compact('ads','sector','airlines','sectorFromMDL','sectorFromRGN','ticket','keyword','promo','content'));
    }

    /** Destinations or Sectors */
    public function places()
    {
        $data = destination::all();

        return view('destinations',compact('data'));
    }

    /** One Destination or Airport City Detail */
    public function city($slug)
    {
        $cities = destination::all();
        $data = destination::where('slug', $slug)->first();
        $contact = contact::find('1');
        $phone = array_values(unserialize($contact->mobiles))['0'];
        return view('destination',compact('data','phone','cities'));
    }

    /** Airline Profile */
    public function airline($slug)
    {
        $airlines = airline::all();
        $data = airline::where('slug', $slug)->first();
        $destinations = destination::all();
        $contact = contact::find('1');
        $phone = array_values(unserialize($contact->mobiles))['0'];
        $routeAry = unserialize($data->routes);
        return view('airline',compact('data','phone','airlines','destinations','routeAry'));

    }

    /** Contact Us Page */
    public function contact()
    {
        $contact = contact::find('1');
        return view('contact',compact('contact'));
    }

    /** Send Message to Database */
    public function sendMessage(Request $request)
    {
        $data = new message;
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->subject = $request->get('subject');
        $data->message = $request->get('message');
        $data->save();

        $noti = new notification;
        $noti->name = "message";
        $noti->app_id = $data->id;
        $noti->word = $data->name." send a message";
        $noti->status = "0";
        $noti->save();

        return back()->with('status','Thanks for contacting us. We will reply your message as soon as possible');
    }

    /** Test Mode */
    public function test()
    {
        //
    }

    /** Web Page View */
    public function show($slug)
    {
        $data = DB::table('pages')->where('slug', '=', $slug)->where('status', '=', '1')->first();

        if ($data)
        {

            $destinations = destination::take(10)->get();
            $check = contact::first();
            $phone = unserialize($check->mobiles)[0];

            return view('page',compact('data','destinations','phone'));
        }
        else{
            return back()->with('status', 'Requested page was not valid or something went wrong!');
        }
    }

    /** Banner Ads Page Detail */
    public function redirect($page_id)
    {
        $data = page::find($page_id);

        return redirect(url('/page/'.$data->slug));
    }

    /** Close Promo */
    public function popUp()
    {
        Session::put('hide', 'true');

        return back();
    }

    /** Promo View */
    public function promoView($slug)
    {
        $data = announcement::where('slug', '=', $slug)->first();
        $check = contact::first();
        $phone = unserialize($check->mobiles)[0];

        return view('promotion',compact('data','phone'));
    }

    /** Promo */
    public function promo()
    {
        $data = announcement::orderBy('id','desc')->paginate('6');
        $check = contact::first();
        $phone = unserialize($check->mobiles)[0];

        return view('promotions',compact('data','phone'));
    }

    /** Stories */
    public function stories()
    {
        $data = story::paginate('10');
        return view('stories',compact('data'));
    }

    /** Story Detail */
    public function storyDetail($slug)
    {
        $data = story::where('slug', '=', $slug)->first();
        $check = contact::first();
        $phone = unserialize($check->mobiles)[0];

        return view('story',compact('data','phone'));
    }

    /** How to Book */
    public function pageRedirect()
    {
        $slug = "how-to-book";

        return redirect(action('PageController@show', $slug));
    }

    /** Local Check */
    public function localCheck()
    {
        Session::put('Check','1');

        return back();
    }

    /**  */
    public function localUnCheck()
    {
       Session::forget('Check');

        return back();
    }
}
