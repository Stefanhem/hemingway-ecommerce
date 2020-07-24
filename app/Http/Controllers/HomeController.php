<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $products = Product::take(3)->get();
        return view('welcome', ['topProducts' => $products]);
    }
}
