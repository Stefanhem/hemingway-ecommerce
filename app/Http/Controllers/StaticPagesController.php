<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
