<?php

namespace App\Http\Controllers;

use App\Color;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\ProductColorRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductColor;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class ProductsController
 * @package App\Http\Controllers
 */
class ProductsController extends Controller
{
    /**
     * Limit products per page in lists
     */
    protected const PRODUCTS_PER_PAGE = 9;

    /**
     * Display top 3 products on the front page
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Product::take(3)->get();
    }

    /**
     * Route for diff pages of product types
     *
     * @param Product $model
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProductsByType(Product $model, Request $request)
    {
        $type = null;
        $typeModel = null;
        if ($request->has('type')) {
            $type = $request->get('type');
            $typeModel = ProductType::where('id', $type)->first();
            $model = $model->where('idType', $type);
        }
        if (empty($typeModel) && !empty($type)) {
            $products = [];
            $productsCount = 0;
        } else {
            $productsCount = $model->count();
            $products = $this->paginateQuery($model, $request);
        }
        return view('pages.products.products-list', ['chunks' => !empty($products) ? $products->chunk(3) : collect([]), 'count' => (int)$productsCount / self::PRODUCTS_PER_PAGE, 'type' => $type, 'typeName' => !empty($typeModel) ? $typeModel->name : '']);
    }

    /**
     * @param Product $model
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSpecialOfferProducts(Product $model, Request $request)
    {
        $model = $model->where('isOnSpecialOffer', 1)->orWhere('idType', Product::TYPE_SPECIAL_OFFER);
        $productsCount = $model->count();

        $products = $this->paginateQuery($model, $request);
        return view('pages.products.products-list', ['chunks' => !empty($products) ? $products->chunk(3) : collect([]), 'count' => (int)$productsCount / self::PRODUCTS_PER_PAGE, 'typeName' => 'Specijalna ponuda']);
    }

    /**
     * @param Product $model
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Product $model, Request $request)
    {
        if (!$request->has('name')) {
            return view('pages.products.products-list', ['chunks' => collect([]), 'count' => 0, 'typeName' => 'No results for your search']);
        }
        $name = $request->get('name');
        $model = $model->where('name', 'like', '%' . $name . '%');
        $productsCount = $model->count();
        $products = $this->paginateQuery($model, $request);

        return view('pages.products.products-list', ['chunks' => !empty($products) ? $products->chunk(3) : collect([]), 'count' => (int)$productsCount / self::PRODUCTS_PER_PAGE, 'typeName' => !empty($typeModel) ? $typeModel->name : '']);
    }

    /**
     * @param $model
     * @param Request $request
     * @return iterable|null
     */
    protected function paginateQuery($model, Request $request): ?iterable
    {
        if ($request->has('page') && $request->get('page') > 1) {
            $model->skip(self::PRODUCTS_PER_PAGE * ((int)$request->get('page') - 1));
        }
        return $model->take(self::PRODUCTS_PER_PAGE)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductRequest $request)
    {
        $inPublicPath = 'images/products/';
        $data = $request->all();
        $image = $request->file('image');
        $format = $image->getClientOriginalExtension();
        $imageName = $this->generateNameOfImage($format);

        $image->move(public_path($inPublicPath), $imageName);

        $data['mainImage'] = $inPublicPath . $imageName;
        $product = Product::create($data);
        return redirect('/products/' . $product->id);
    }

    /**
     * @param string $format
     * @return string
     */
    protected function generateNameOfImage(string $format = 'jpg'): string
    {
        return time() . '.' . $format;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        $colors = ProductColor::with('color')->where('idProduct', $product->id)->get();
        $sameTypeProducts = Product::whereIn('idType', Product::$SIMMILAR_PRODUCTS[$product->idType])->take(3)->get();
        return view('pages.products.product-page', ['product' => $product, 'productColors' => $colors, 'sameTypeProducts' => $sameTypeProducts, 'labels' => isset($product->labels) ? $product->labels : collect()]);
    }

    /**
     * Add a product to the card
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove product from the cart
     *
     * @param int $id
     * @return array
     */
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

    /**
     * Index page for adding colors of products
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productColor(int $id)
    {
        $product = Product::find($id);
        $colors = Color::all();
        return view('admin.pages.product-color', ['product' => $product, 'colors' => $colors]);
    }

    /**
     * Save a new Color of a Product
     *
     * @param ProductColorRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeProductColor(ProductColorRequest $request)
    {
        $inPublicPath = 'images/products/';
        $data = $request->all();
        $image = $request->file('image');
        $format = $image->getClientOriginalExtension();
        $imageName = $this->generateNameOfImage($format);

        $image->move(public_path($inPublicPath), $imageName);

        $data['imagePath'] = $inPublicPath . $imageName;
        ProductColor::create($data);

        return redirect('/products/' . $data['idProduct']);
    }

    /**
     * Index page of Colors
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function colors()
    {
        $colors = Color::all();
        return view('admin.pages.color', ['colors' => $colors]);
    }

    /**
     * Add new Color
     *
     * @param ColorRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeNewColor(ColorRequest $request)
    {
        Color::create($request->all());
        return redirect('/home');
    }

    /**
     * Add new products index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminProducts()
    {
        $types = ProductType::all();
        return view('admin.pages.products', [
            'data' => [
                'types' => $types
            ]
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminEditProduct(int $id)
    {
        $product = Product::find($id);
        $types = ProductType::all();
        return view('admin.pages.edit-product', ['product' => $product, 'types' => $types]);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminUpdateProduct(ProductUpdateRequest $request, int $id)
    {
        $product = Product::find($id);
        $data = $request->all();

        if (!empty($data['image'])) {
            $inPublicPath = 'images/products/';
            $image = $request->file('image');
            $format = $image->getClientOriginalExtension();
            $imageName = $this->generateNameOfImage($format);
            $image->move(public_path($inPublicPath), $imageName);
            $data['mainImage'] = $inPublicPath . $imageName;
        }
        $product->fill($data);
        $product->save();
        return redirect('/products/' . $id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminDeleteProducts(int $id)
    {
        Product::where('id', $id)->delete();

        return redirect('/home');
    }
}
