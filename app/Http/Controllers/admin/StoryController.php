<?php

namespace App\Http\Controllers\admin;

use App\story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function index()
    {
        $a = '12';
        $data = story::paginate('12');

        return view('admin.stories',compact('a','data'));
    }

    public function create()
    {
        $a = '12';

        return  view('admin.storyAdd',compact('a'));
    }

    public function store(Request $request)
    {
        $file = $request->file('img');
        $filename = uniqid(). '-' .$file->getClientOriginalName();
        $file->move(public_path().'/images/stories/',$filename);
        $data = new story;
        $data->keywords = $request->get('keywords');
        $data->description = $request->get('description');
        $data->name = $request->get('name');
        $data->title = $request->get('title');
        $data->slug = str_slug($data->title);
        $data->img = $filename;
        $data->content = $request->get('content');
        $data->status = $request->get('status');
        $data->save();

        return redirect(action('admin\StoryController@index'))->with('status', 'A story has been successfully created');
    }

    public function show($id)
    {
        $data = story::find($id);
        $data->status = 1;
        $data->update();

        return back()->with('status', 'Story has been published');
    }

    public function hide($id)
    {
        $data = story::find($id);
        $data->status = 0;
        $data->update();

        return back()->with('alert', 'Story has been unpublished');
    }

    public function edit($id)
    {
        $a = '12';
        $data = story::find($id);

        return view('admin.storyEdit',compact('data','a'));
    }

    public function update(Request $request, $id)
    {
        $data = story::find($id);
        $data->keywords = $request->get('keywords');
        $data->description = $request->get('description');
        $data->name = $request->get('name');
        $data->title = $request->get('title');
        $data->slug = str_slug($request->title);
        $data->content = $request->get('content');

        if ($request->hasFile('img'))
        {
            unlink(public_path().'/images/stories/'.$data->img);
            $file = $request->file('img');
            $filename = uniqid(). '-' .$file->getClientOriginalName();
            $file->move(public_path().'/images/stories/',$filename);
            $data->img = $filename;
        }

        $data->status = $request->get('status');
        $data->update();

        return redirect(action('admin\StoryController@index'))->with('status', 'A story has been updated');
    }

    public function destroy($id)
    {
        $data = story::find($id);
        unlink(public_path().'/images/stories/'.$data->img);
        story::destroy($id);

        return back()->with('alert', 'A story has been removed or trashed');
    }
}
