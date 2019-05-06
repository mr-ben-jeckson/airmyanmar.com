<?php

namespace App\Http\Controllers\admin;

use App\main_content;
use App\page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function create()
    {
        $a = '8';
        return view('admin.pageAdd',compact('a'));
    }

    public function add(Request $request)
    {
        $page = new page;
        $page->title = $request->get('title');
        $page->slug = str_slug($page->title);
        $page->keywords = $request->get('keywords');
        $page->description = $request->get('meta_description');
        $page->content = $request->get('content');
        $page->status = '1';
        if ($request->hasFile('img')){
            $files = $request->file('img');
            $fileAry = array();
            foreach ($files as $key=>$file){
                $filename= uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path().'/images/pages/',$filename);
                array_push($fileAry,$filename);
            }
            $page->img = serialize($fileAry);
        }
        $page->save();

        return redirect(action('admin\PageController@create'))->with('status', 'Page was successfully created');
    }

    public function show()
    {
        $a = '8';
        $data = page::paginate('10');
        return view('admin.pages',compact('a','data'));
    }

    public function pageShow($id)
    {
        $data = page::find($id);
        $data->status = "1";
        $data->update();

        return back()->with('status', 'A web page was successfully activated in visibility');
    }

    public function pageHide($id)
    {
        $data = page::find($id);
        $data->status = "0";
        $data->update();

        return back()->with('alert', 'A web page was successfully deactivated in visibility');
    }

    public function view($id)
    {
        $a ='8';
        $data = page::find($id);

        return view('admin.pageView',compact('a','data'));
    }

    public function edit($id)
    {
        $a = '8';
        $data = page::find($id);

        return view('admin.pageEdit',compact('a','data'));
    }

    public function update(Request $request, $id)
    {
        $page = page::find($id);
        $page->title = $request->get('title');
        $page->slug = str_slug($page->title);
        $page->keywords = $request->get('keywords');
        $page->description = $request->get('meta_description');
        $page->content = $request->get('content');
        $page->status = '1';
        if ($request->hasFile('img')){
            $files = $request->file('img');
            $fileAry = array();
            foreach ($files as $key=>$file){
                $filename= uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path().'/images/pages/',$filename);
                array_push($fileAry,$filename);
            }
            $page->img = serialize($fileAry);
        }
        $page->update();

        return back()->with('status', 'A web page was successfully updated or changed');
    }

    public function delete($id)
    {
        $data = page::find($id);
        if ($data->img){
            foreach (unserialize($data->img) as $img)
            {
                unlink(public_path().'/images/pages/'.$img);
            }
        }
        page::destroy($id);

        return back()->with('alert', 'A web page was successfully trashed or deleted');
    }

    public function contentShow()
    {
        $a = '8';
        $data = main_content::first();

        return view('admin.content',compact('a','data'));
    }

    public function contentUpdate(Request $request)
    {
        $data = main_content::first();
        $data->heading = $request->get('heading');
        $data->content = $request->get('content');
        $data->update();

        return back()->with('status', 'You have successfully updated Main Content');
    }
}
