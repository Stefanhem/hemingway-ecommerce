<?php

namespace App\Http\Controllers;

use App\Config;
use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $orders = Order::orderBy('id', 'desc')->take(10)->get();
        return view('admin.pages.home', ['orders' => $orders]);
    }

    public function announcement()
    {
        $announcement = Config::where('key', Config::CONFIG_ANNOUNCEMENT)->first();
        return view('admin.pages.announcement', ['announcement' => $announcement->value]);
    }

    public function saveAnnouncement(Request $request)
    {
        $announcement = $request->get('announcement');
        Config::updateOrCreate(['key' => Config::CONFIG_ANNOUNCEMENT], ['value' => $announcement]);
        return view('admin.pages.announcement', ['announcement' => $announcement]);
    }
}
