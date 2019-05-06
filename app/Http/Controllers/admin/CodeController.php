<?php

namespace App\Http\Controllers\admin;

use App\code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function index()
    {
        $a = '14';
        $data = code::first();

        return view('admin.code',compact('data','a'));
    }

    public function update(Request $request)
    {
        $data = code::first();
        $data->head = $request->get('head');
        $data->body = $request->get('body');
        $data->update();

        return back()->with('status','Your codes was successfully inserted in web template');
    }
}
