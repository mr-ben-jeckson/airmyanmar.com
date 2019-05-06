<?php

namespace App\Http\Controllers;

use App\booking;
use App\contact;
use App\notification;
use App\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $data = testimonial::where('status', '=', '1')->orderBy('id', 'desc')->paginate('12');
        $check = contact::first();
        $phone = unserialize($check->mobiles)[0];

        return view('testimonials',compact('data','phone'));
    }

    public function create(Request $request)
    {
        $check = $request->get('booking_id');
        $task = booking::where('booking_id', '=', $check)->first();

        if ($task)
        {
            $data = new testimonial;
            $data->name = $request->get('name');
            $data->booking_id = $check;
            $data->content = $request->get('content');
            if ($request->hasFile('img')){
                $file = $request->file('img');
                $filename = uniqid() . '-' . $file->getClientOriginalName();
                $file->move(public_path(). '/images/testimonial/',$filename);
            $data->img = $filename;
            }
            $data->travel_date = $request->get('travel_date');
            $data->nation = $request->get('nation');
            $data->points = $request->get('points');
            $data->status = 0;
            $data->save();

            $status = new notification;
            $status->name = "testimonial";
            $status->app_id = $data->id;
            $status->word = $data->name.' writed a feedback';
            $status->status = '0';
            $status->save();

            return back()->with('status', 'You have successfully written a feedback. Our team will review your feedback to approve in testimonial list.');
        }
        else{
            return back()->with('status', 'Booking ID you filled does not exist in our system.');
        }
    }
}
