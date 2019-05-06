<?php

namespace App\Http\Controllers\admin;

use App\announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AncController extends Controller
{
    public function add()
    {
        $a = '11';

        return view('admin.announcementAdd',compact('a'));
    }

    public function index()
    {
        $a = '11';
        $data = announcement::paginate('12');

        return view('admin.announcement',compact('data','a'));
    }

    public function create(Request $request)
    {
        $file = $request->file('img');
        $filename = uniqid(). '-' .$file->getClientOriginalName();
        $file->move(public_path().'/images/',$filename);

        $data = new announcement;
        $data->name = $request->get('name');
        $data->title = $request->get('title');
        $data->slug = str_slug($data->title);
        $data->img = $filename;
        $data->content = $request->get('content');
        $data->status = $request->get('status');
        $data->validate = $request->get('validate');
        $data->keywords = $request->get('keywords');
        $data->meta_description = $request->get('meta_description');
        $data->save();

        return redirect(action('admin\AncController@index'))->with('status', 'Announcement Post was successfully added');
    }

    public function hide($id)
    {
        $data = announcement::find($id);
        $data->status = 0;
        $data->update();
        return back()->with('alert', 'Your promo announcement was successfully deactivated');
    }

    public function show($id)
    {
        $data = announcement::find($id);
        $data->status = 1;
        $data->update();
        return back()->with('status', 'Your promo announcement was successfully activated');
    }

    public function delete($id)
    {
        $data = announcement::find($id);
        unlink(public_path().'/images/'.$data->img);
        announcement::destroy($id);

        return back()->with('alert', 'Your promo announcement was successfully deleted');
    }

    public function edit($id)
    {
        $a = '11';
        $data = announcement::find($id);

        return view('admin.announcementEdit',compact('a','data'));
    }

    public function update(Request $request, $id)
    {
        $data = announcement::find($id);
        $data->name = $request->get('name');
        $data->title = $request->get('title');
        $data->slug = str_slug($data->title);
        if ($request->hasFile('img')){
            $file = $request->file('img');
            $filename = uniqid(). '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/',$filename);
            $data->img = $filename;
        }
        $data->content = $request->get('content');
        $data->status = $request->get('status');
        $data->validate = $request->get('validate');
        $data->keywords = $request->get('keywords');
        $data->meta_description = $request->get('meta_description');
        $data->update();

        return redirect(action('admin\AncController@index'))->with('status', 'Announcement Post was successfully updated');
    }

    public function view($id)
    {
        $a = '11';
        $data = announcement::find($id);

        return view('admin.announcementView',compact('a','data'));
    }
}
