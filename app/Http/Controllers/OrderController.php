<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    const PAYMENT_METHOD = 'Placanje pouzećem';

    public function checkout()
    {
        return view('pages.checkout.index', Session::get('products'));
    }

    public function show(int $id)
    {
        $order = Order::with('products')->where('id', $id)->first();
        dd($order->products);
        return view('admin.pages.order', [
            'data' => [
                'name' => $order->name,
                'email' => $order->email,
                'paymentMethod' => self::PAYMENT_METHOD,
                'address' => $order->address . ', ' . $order->city . ' ' . $order->zipCode . ', ' . $order->country,
                'products' => $order->products,
                'sum' => $order->price
            ]
        ]);
    }

    public function store(Request $request)
    {
        $order = $request->all();
        $order['price'] = Session::get('cartSum');
        $products = Session::get('products');
        $newOrder = Order::create($order);

        $orderProducts = [];
        foreach (Session::get('products') as $product) {
            $orderProducts[] = [
                'idOrder' => $newOrder->id,
                'idProduct' => $product['product']->id,
                'quantity' => $product['quantity'],
                'color' => $product['color']
            ];
        }
        OrderProduct::insert($orderProducts);

        Session::remove('products');
        Session::remove('cartSum');

        return view('pages.checkout.page-invoice', [
            'data' => [
                'name' => $newOrder->name,
                'email' => $newOrder->email,
                'paymentMethod' => self::PAYMENT_METHOD,
                'address' => $newOrder->address . ', ' . $newOrder->city . ' ' . $newOrder->zipCode . ', ' . $newOrder->country,
                'products' => $products,
                'sum' => $newOrder->price
            ]
        ]);
    }
}
