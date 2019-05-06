<?php

namespace App\Http\Controllers\admin;

use App\adsbanner;
use App\page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function view()
    {
        $a ='10';
        $data = adsbanner::all();

        return view('admin.banners',compact('a','data'));
    }

    public function show($id)
    {
        $data = adsbanner::find($id);
        $data->status = "1";
        $data->update();

        return back()->with('status', 'A banner was successfully activated in visibility');
    }

    public function hide($id)
    {
        $data = adsbanner::find($id);
        $data->status = "0";
        $data->update();

        return back()->with('alert', 'A banner was successfully deactivated in visibility');
    }

    public function add()
    {
        $a = '0';
        $page = page::where('status', '=', '1')->get();

        return view('admin.bannerAdd',compact('a','page'));
    }

    public function create(Request $request)
    {
        $file = $request->file('img');
        $fliename = uniqid().'-'.$file->getClientOriginalName();
        $file->move(public_path().'/images/',$fliename);

        $data = new adsbanner;
        $data->name = $request->get('name');
        $data->first_word = $request->get('first_word');
        $data->second_word = $request->get('second_word');
        $data->page_id = $request->get('page_id');
        $data->img = $fliename;
        $data->status = $request->get('status');
        $data->save();

        return redirect(action('admin\BannerController@view'))->with('status', 'New banner was successfully added');

    }

    public function edit($id)
    {
        $a = '0';
        $banner = adsbanner::find($id);
        $page = page::all();

        return view('admin.bannerEdit',compact('a','banner','page'));
    }

    public function update(Request $request, $id)
    {
        $data = adsbanner::find($id);
        $data->name = $request->get('name');
        $data->first_word = $request->get('first_word');
        $data->second_word = $request->get('second_word');
        $data->page_id = $request->get('page_id');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fliename = uniqid() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $fliename);
            $data->img = $fliename;
        }
        $data->status = $request->get('status');
        $data->update();

        return redirect(action('admin\BannerController@view'))->with('status', $data->name.' banner was successfully updated');
    }

    public function delete($id)
    {
        $data = adsbanner::find($id);
        unlink(public_path().'/images/'.$data->img);
        adsbanner::destroy($id);

        return back()->with('alert','A banner was successfully deleted');
    }
}
