<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        if(! Newsletter::isSubscribed($request->user_email))
        {
            Newsletter::subscribe($request->user_email);

            return back()->with('status', 'Thanks for subscription. We will sent all the latest news and cheap flights deal to your email');
        }

        return back()->with('status', 'You are already subscribed with this email');
    }
}
