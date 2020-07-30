<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductColor;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Product::take(3)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect('/products/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        $colors = ProductColor::with('color')->where('idProduct', $product->id)->get();
        return view('pages.products.product-page', ['product' => $product, 'productColors' => $colors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addCart(int $id, Request $request)
    {
        $product = Product::find($id);
        $price = $request->get('quantity') * $product->price;

        Session::push('products', [
            'id' => !empty(Session::get('products')) ? count(Session::get('products')) : 0,
            'product' => $product,
            'quantity' => $request->get('quantity'),
            'price' => $price,
            'color' => $request->get('color')
        ]);

        $cartProducts = Session::get('products');

        $cartSum = array_sum(array_map(function ($cartProduct) {
            return $cartProduct['product']->price * $cartProduct['quantity'];
        }, $cartProducts));

        Session::put('cartSum', $cartSum);
        return back();
    }

    public function removeFromCart(int $id)
    {
        // get all session products
        $products = Session::get('products');

        // find index of the one we are removing
        $inx = array_search($id, array_map(function ($product) {
            return $product['id'];
        }, $products));
        // remove it
        unset($products[$inx]);
        // put back the new session products
        Session::put('products', $products);
        // calculate the new sum
        $cartSum = array_sum(array_map(function ($cartProduct) {
            return $cartProduct['product']->price * $cartProduct['quantity'];
        }, $products));
        // put it in the new session
        Session::put('cartSum', $cartSum);
        // return it so we can update it live
        return [
            'amount' => $cartSum
        ];
    }

    public function adminProducts()
    {
        $types = ProductType::all();
        return view('admin.pages.products', [
            'data' => [
                'types' => $types
            ]
        ]);
    }
}
