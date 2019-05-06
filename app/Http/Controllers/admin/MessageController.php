<?php

namespace App\Http\Controllers\admin;

use App\message;
use App\notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $a = '9';
        $data = message::orderBy('id','desc')->paginate('12');

        return view('admin.messages',compact('a','data'));
    }

    public function show($id)
    {
        $a = '9';
        $reminder = notification::where('name', '=', "message")->where('app_id', '=', $id)->first();

        if ($reminder)
        {
            $reminder->status = '1';
            $reminder->update();
        }

        $data = message::find($id);

        return view('admin.message',compact('a','data'));
    }

    public function delete($id)
    {
        message::destroy($id);

        return back()->with('alert', 'The message has been successfully trashed or removed');
    }
}
