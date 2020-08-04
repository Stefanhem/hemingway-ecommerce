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

    public function pokloni()
    {
        return view('pages.footer.pokloni');
    }

    public function poslovi()
    {
        return view('pages.footer.poslovi');
    }

    public function predlozi()
    {
        return view('pages.footer.predlozi');
    }

    public function podaci()
    {
        return view('pages.footer.podaci');
    }

    public function pomoc()
    {
        return view('pages.footer.pomoc');
    }

    public function placanje()
    {
        return view('pages.footer.placanje');
    }

    public function prava()
    {
        return view('pages.footer.prava');
    }

    public function politika()
    {
        return view('pages.footer.politika-privatnosti');
    }

    public function uslovi()
    {
        return view('pages.footer.uslovi-koriscenja');
    }

    public function contactFormEmail(Request $request)
    {
        Mail::send(new ContactMailable($request->all()));
        return redirect('/');
    }
}
