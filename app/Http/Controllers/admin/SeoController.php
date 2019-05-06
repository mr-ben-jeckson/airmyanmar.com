<?php

namespace App\Http\Controllers\admin;

use App\keyword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
    public function index()
    {
        $a = '14';
        $keyword = keyword::find('1');
        return view('admin.keywords',compact('a','keyword'));
    }

    public function update(Request $request)
    {
        $data = keyword::find(1);
        $data->title = $request->get('title');
        $data->keywords = $request->get('keywords');
        $data->description = $request->get('description');
        $data->update();

        return back()->with('status', 'SEO Meta setting was successfully changed or updated');
    }
}
