<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('pages.checkout.index', Session::get('products'));
    }

    public function store(Request $request)
    {
        $order = $request->all();
        $order['price'] = Session::get('cartSum');
        $newOrder = Order::create($order);

        $orderProducts = [];
        foreach (Session::get('products') as $product) {
            $orderProducts[] = [
                'idOrder' => $newOrder->id,
                'idProduct' => $product['product']->id,
                'quantity' => $product['quantity']
            ];
        }
        OrderProduct::insert($orderProducts);
    }
}
