<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreateCustomerMailable;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $order = Order::where('id', $id)->first();

        $id = 0;
        $orderProducts = [];
        foreach ($order->products as $product) {
            $prod = $product->product()->withTrashed()->first();
            $orderProducts[] = [
                'id' => $id++,
                'quantity' => $product->quantity,
                'price' => $product->quantity * $prod->price,
                'color' => $product->color,
                'product' => $prod
            ];
        }

        return view('admin.pages.order', [
            'data' => [
                'name' => $order->name,
                'email' => $order->email,
                'paymentMethod' => self::PAYMENT_METHOD,
                'address' => $order->address . ', ' . $order->city . ' ' . $order->zipCode . ', ' . $order->country,
                'products' => $orderProducts,
                'sum' => $order->price
            ]
        ]);
    }

    public function store(Request $request)
    {
        $order = $request->all();
        if (!Session::has('products')) {
            return redirect('/');
        }

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
            $product['product']->quantityInStock = $product['product']->quantityInStock - $product['quantity'];
            $product['product']->save();
        }
        OrderProduct::insert($orderProducts);

        $data = [
            'id' => $newOrder->id,
            'date' => (new \DateTime())->format('d.m.Y'),
            'name' => $newOrder->name,
            'email' => $newOrder->email,
            'paymentMethod' => self::PAYMENT_METHOD,
            'address' => $newOrder->address . ', ' . $newOrder->city . ' ' . $newOrder->zipCode . ', ' . $newOrder->country,
            'products' => $products,
            'sum' => $newOrder->price
        ];
        Mail::send(new OrderCreateCustomerMailable($data));

        Session::remove('products');
        Session::remove('cartSum');

        return view('pages.checkout.page-invoice', [
            'data' => $data
        ]);
    }
}
