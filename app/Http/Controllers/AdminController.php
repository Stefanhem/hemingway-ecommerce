<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $orders = Order::orderBy('id', 'desc')->take(10)->get();
        return view('admin.pages.home', ['orders' => $orders]);
    }
}
