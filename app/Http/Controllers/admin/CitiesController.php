<?php

namespace App\Http\Controllers\admin;

use App\destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{

    public function index()
    {
        $data = destination::paginate('12');
        $a = 3;

        return view('admin.destinations',compact('data','a'));
    }

    public function create()
    {
        $a = 3;

        return view('admin.destinationAdd',compact('a'));
    }


    public function store(Request $request)
    {
        $data = new destination;
        $data->name = $request->get('name');
        $data->slug = str_slug($data->name);
        $data->code = $request->get('code');
        $data->airport_link = $request->get('airport_link');
        $data->description = $request->get('description');
        $files = $request->file('img');
        $fileAry = array();
        foreach ($files as $key=>$file){
            $filename= uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$filename);
            array_push($fileAry,$filename);
        }
        $data->img = serialize($fileAry);
        $data->save();

        return redirect(action('admin\CitiesController@index'))->with('status', 'New destination was successfully added');
    }


    public function show($id)
    {
        $data = destination::find($id);
        $a = 3;

        return view('admin.destination',compact('data','a'));
    }

    public function edit($id)
    {
        $data = destination::find($id);
        $a = 3;

        return view('admin.destinationEdit',compact('data','a'));
    }

    public function update(Request $request, $id)
    {
        $data = destination::find($id);
        $data->name = $request->get('name');
        $data->code = $request->get('code');
        $data->airport_link = $request->get('airport_link');
        $data->description = $request->get('description');

        if ($request->file('img')){
            $files = $request->file('img');
            $fileAry = array();
            foreach ($files as $key=>$file){
                $filename= uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path().'/images/',$filename);
                array_push($fileAry,$filename);
            }
            $data->img = serialize($fileAry);
        }

        $data->update();

        return back()->with('status',' Flight destination was successfully updated');
    }

    public function destroy($id)
    {
        $data = destination::find($id);
        foreach (unserialize($data->img) as $img){
            unlink(public_path().'/images/'.$img);
        }
        destination::destroy($id);

        return back()->with('alert', 'Destination was successfully removed or deleted');
    }
}
