<?php

namespace App\Http\Controllers\admin;

use App\booking;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $a = '7';
        $data = User::orderBy('id','desc')->get();

        return view('admin.users',compact('data','a'));
    }

    public function show($id)
    {
        $a = '7';
        $customer = User::find($id);
        $data = booking::where('status', '=', '4')->where('currency', '=', "$")->where('user', '=', $customer->id)->get();
        $data1 = booking::where('status', '=', '4')->where('currency', '=', "MMK")->where('user', '=', $customer->id)->get();

        $pointForUSD = $data->sum('grand_amount')*0.5;
        $pointForMM = $data1->sum('grand_amount')*0.0005;

        $point = round($pointForUSD + $pointForMM);

        return view('admin.user',compact('point','a','customer'));

    }

    public function edit($id)
    {
        $user = User::whereId($id)->FirstOrFail();
        $a = '7';
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('admin.usersEdit',compact('roles','a','user','selectedRoles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::whereId($id)->FirstOrFail();

        $user->syncRoles($request->get('role'));

        return redirect(action('admin\UserController@edit', $id))->with('status','User has been updated successfully');
    }
}
