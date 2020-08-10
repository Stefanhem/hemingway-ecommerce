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
        $products = collect();
        $bestSellers = ProductLabel::take(3)->where('idLabel', Label::TYPE_BESTSELLER)->get();
        foreach ($bestSellers as $bestSeller) {
            $products->push($bestSeller->product);
        }
        $specialOfferProducts = Product::take(3)->where('isOnSpecialOffer', 1)->orWhere('idType', Product::TYPE_SPECIAL_OFFER)->get();
        return view('welcome', ['topProducts' => $products, 'specialOfferProducts' => $specialOfferProducts]);
    }
}
