<?php

namespace App\Http\Controllers;

use App\Label;
use App\Product;
use App\ProductLabel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $bestSellers = Product::select('products.*')->take(3)
            ->join('product_labels', function ($query) {
            $query->on('products.id', '=', 'product_labels.idProduct');
        })->where('product_labels.idLabel', Label::TYPE_BESTSELLER)
          ->where('products.quantityInStock', '>', 0)
          ->get();
        $specialOfferProducts = Product::take(3)->where('quantityInStock', '>', 0)->where('isOnSpecialOffer', 1)->orWhere('idType', Product::TYPE_SPECIAL_OFFER)->get();
        return view('welcome', ['topProducts' => $bestSellers, 'specialOfferProducts' => $specialOfferProducts]);
    }
}
