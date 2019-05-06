<?php

namespace App\Http\Controllers\admin;

use App\notification;
use App\testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index()
    {
        $a = '15';
        $data = testimonial::orderBy('id', 'desc')->paginate('12');

        return view('admin.testimonial',compact('data','a'));
    }

    public function add()
    {
        $a = '15';

        return view('admin.testimonialAdd',compact('a'));
    }

    public function store(Request $request)
    {
        $data = new testimonial;
        $data->name = $request->get('name');
        $data->booking_id = $request->get('booking_id');
        $data->travel_date = $request->get('travel_date');
        $data->points = $request->get('points');
        $data->content = $request->get('content');
        $data->nation = $request->get('nation');
        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $filename = uniqid(). '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/testimonial/'.$data->img);
            $data->img = $filename;
        }
        $data->status = $request->get('status');
        $data->save();

        return redirect(action('admin\TestimonialController@index'))->with('status', 'You have successfully added a new testimonial');
    }

    public function hide($id)
    {
        $data = testimonial::find($id);
        $data->status = 0;
        $data->update();

        return back()->with('alert', 'Testimonial has been deactivated in visibility');
    }

    public function show($id)
    {
        $data = testimonial::find($id);
        $data->status = 1;
        $data->update();

        return back()->with('status', 'Testimonial has been activated in visibility');
    }

    public function delete($id)
    {
        $data = testimonial::find($id);
        if ($data->img)
        {
            unlink(public_path().'/images/testimonial/'.$data->img);
        }
        testimonial::destroy($id);

        return back()->with('alert', 'Testimonial has been deleted or removed');
    }

    public function detail($id)
    {
        $a = '15';
        $data = testimonial::find($id);

        $reminder = notification::where('name', '=', "testimonial")->where('app_id', '=', $id)->first();

        if ($reminder)
        {
        $reminder->status = 1;
        $reminder->update();
        }
        return view('admin.testimonialView',compact('a','data'));
    }

    public function edit($id)
    {
        $a = '15';
        $data = testimonial::find($id);

        return view('admin.testimonialEdit',compact('a','data'));

    }

    public function update(Request $request, $id)
    {
        $data = testimonial::find($id);
        $data->name = $request->get('name');
        $data->booking_id = $request->get('booking_id');
        $data->travel_date = $request->get('travel_date');
        $data->points = $request->get('points');
        $data->content = $request->get('content');
        $data->nation = $request->get('nation');
        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $filename = uniqid(). '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/testimonial/'.$data->img);
            $data->img = $filename;
        }
        $data->status = $request->get('status');
        $data->update();

        return redirect(action('admin\TestimonialController@index'))->with('status', 'A testimonial has been successfully updated');
    }
}
