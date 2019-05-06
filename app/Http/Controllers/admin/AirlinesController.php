<?php

namespace App\Http\Controllers\admin;

use App\airline;
use App\destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirlinesController extends Controller
{
    public function index()
    {
       $a = '2';
       $data = airline::all();
       return view('admin.airlineManage',compact('data','a'));
    }

    public function create()
    {
        $a = '2';
        $cities = destination::all();

        return view('admin.airlineCreate',compact('cities','a'));
    }

    public function store(Request $request)
    {
        $data = new airline;
        $data->name = $request->get('name');
        $data->slug = str_slug($request->name);
        $data->code = $request->get('code');
        $data->content = $request->get('content');
        $logo = $request->file('logo');
        $logoname = uniqid().'_'.$logo->getClientOriginalName();
        $logo->move(public_path().'/images/airlines/',$logoname);
        $data->logo = $logoname;
        $files = $request->file('img');
        $fileAry = array();
        foreach ($files as $key=>$file){
            $filename= uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$filename);
            array_push($fileAry,$filename);
        }
        $data->img = serialize($fileAry);
        $routes = $request->get('routes');
        $routeAry = array();
        foreach ($routes as $key=>$route){
            array_push($routeAry,$route);
        }
        $data->routes = serialize($routeAry);
        $data->save();

        return redirect(action('admin\AirlinesController@index'))->with('status', 'An airline has been successfully added');
    }

    public function show($id)
    {
        $a = '2';
        $data = airline::find($id);
        $cities = destination::all();

        return view('admin.airlineShow',compact('a','data','cities'));
    }


    public function edit($id)
    {
        $a = '2';
        $data = airline::find($id);
        $cities = destination::all();

        return view('admin.airlineEdit',compact('a','data','cities'));
    }

    public function update(Request $request, $id)
    {
        $data = airline::find($id);
        $data->name = $request->get('name');
        $data->code = $request->get('code');
        $data->content = $request->get('content');
        if ($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoname = uniqid().'_'.$logo->getClientOriginalName();
            $logo->move(public_path().'/images/airlines/',$logoname);
            $data->logo = $logoname;
        }
        if ($request->hasFile('img')){
            $files = $request->file('img');
            $fileAry = array();
            foreach ($files as $key=>$file){
                $filename= uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path().'/images/',$filename);
                array_push($fileAry,$filename);
            }
            $data->img = serialize($fileAry);
        }
        $routes = $request->get('routes');
        $routeAry = array();
        foreach ($routes as $key=>$route){
            array_push($routeAry,$route);
        }
        $data->routes = serialize($routeAry);

        $data->update();

        return back()->with('status', $data->name.' airline was succesfully edited');
    }

    public function destroy($id)
    {   $data = airline::find($id);
        unlink(public_path().'/images/airlines/'.$data->logo);
        foreach (unserialize($data->img) as $img)
        {
            unlink(public_path().'/images/'.$img);
        }
        airline::destroy($id);

        return back()->with('alert', 'Airline was successfully deleted');
    }
}
