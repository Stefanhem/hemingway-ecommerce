<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaticPagesController extends Controller
{
    public function about()
    {
        return view('pages.footer.about-us');
    }

    public function contact()
    {
        return view('pages.footer.contact');
    }

    public function legal()
    {
        return view('pages.footer.legal');
    }

    public function contactFormEmail(Request $request)
    {
        Mail::send(new ContactMailable($request->all()));
        return redirect('/');
    }
}
