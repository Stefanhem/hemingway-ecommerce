<?php

namespace App\Http\Controllers;

use App\Label;
use App\Product;
use App\ProductLabel;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $topProducts = Product::select('products.*')
            ->take(3)
            ->inRandomOrder()
            ->join('product_labels', function ($query) {
                $query->on('products.id', '=', 'product_labels.idProduct');
            })->where('product_labels.idLabel', Label::TYPE_BESTSELLER)
            ->where('products.quantityInStock', '>', 0)
            ->get();

        $specialOfferProducts = Product::take(3)
            ->inRandomOrder()
            ->where('quantityInStock', '>', 0)
            ->where('isOnSpecialOffer', 1)
            ->orWhere('idType', Product::TYPE_SPECIAL_OFFER)
            ->get();
        return view('welcome', [
            'topProducts' => $topProducts,
            'specialOfferProducts' => $specialOfferProducts
        ]);
    }
}
