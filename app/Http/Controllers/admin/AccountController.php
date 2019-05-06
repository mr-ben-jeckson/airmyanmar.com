<?php

namespace App\Http\Controllers\admin;

use App\account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        $a = '14';
        $data = account::first();

        return view('admin.account',compact('a','data'));
    }

    public function update(Request $request)
    {
        $data = account::first();
        $data->facebook = $request->get('facebook');
        $data->instagram = $request->get('instagram');
        $data->pinterest = $request->get('pinterest');
        $data->twitter = $request->get('twitter');
        $data->google_plus = $request->get('google_plus');
        $data->youtube = $request->get('youtube');
        $data->update();

        return back()->with('status', 'Social account setting was successfully changed or updated');
    }
}
