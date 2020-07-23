@extends('layouts.app')
@section('content')
<div class="hero-section"><img src="images/Asset-3.svg" alt="" class="image-3">
    <div class="div-central-home">
        <div class="div-block-2">
            <div class="text-block-3">-   Established 2020   -</div>
            <div class="div-block-3">
                <p class="paragraph">Ručno pravljeni proizvodi<br>od najfinije kože</p>
            </div>
            <div class="social-div"><a href="#" class="w-inline-block"><img src="images/face.svg" alt="" class="image-5"></a><a href="#" class="w-inline-block"><img src="{{asset("images/twitter.svg")}}" alt="" class="image-5"></a><a href="#" class="w-inline-block"><img src="images/instagram.svg" alt="" class="image-5"></a></div>
        </div>
        <div class="div-block-4"><a href="#Proizvodi" class="link-block-2 w-inline-block"><img src="{{asset("images/button-down.svg")}}" alt="" class="image-6"></a><a href="#Proizvodi" class="link">Shop</a></div>
    </div>
</div>
<div class="tri-bloka">
    <div class="blokovi-sekcija-tri-bloka"><a href="#" class="link-4">O nama</a><a href="/about-us" class="link-tri-bloka w-inline-block"></a></div>
    <div class="blokovi-sekcija-tri-bloka"><a href="#" class="link-4">Proizvodi</a><a href="#Proizvodi" class="link-tri-bloka w-inline-block"></a></div>
    <div class="blokovi-sekcija-tri-bloka"><a href="#" class="link-4">Contact</a><a href="/contact" class="link-tri-bloka w-inline-block"></a></div>
</div>
<div class="proizvodi special-section">
    <h1 class="heading">Special offer</h1>
    <div class="proizvodi-div">
        @if($topProducts->count() > 0)
            @foreach($topProducts as $topProduct)
                <div class="proizvod-div">
                    <img class="fotka-proizvoda" src="{{asset($topProduct->mainImage)}}"></img>
                    <h1 class="naziv-proizvoda-mali-div">{{$topProduct->name}}</h1>
                    <div class="cena-dugme">
                        <div class="text-block-21">{{$topProduct->price . ' RSD'}}</div>
                        @if($topProduct->quantityInStock == 0)
                            <div class="w-commerce-commerceaddtocartoutofstock">
                                <div>This product is out of stock.</div>
                            </div>
                        @else
                            <a href="/products/{{$topProduct->id}}" class="button-5 w-button add-cart">Pogledaj proizvod</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="w-dyn-empty">
                <div>No items found.</div>
            </div>
        @endif
    </div>
</div>
<div class="ostali-proizvodi">
    <a href="#" class="link-block-4 w-inline-block">
        <div class="text-block-8 white">Pogledaj ostale proizvode</div>
        <div class="div-block-9"><img src="images/Asset-15.svg" alt="" class="image-9 white"></div>
    </a>
</div>
<div id="Proizvodi" class="proizvodi">
    <h1 class="heading">Hemingway proizvodi</h1>
    <div class="collection-list-wrapper-3 w-dyn-list">
        <div role="list" class="collection-list-2 w-dyn-items w-row">
            <div role="listitem" class="w-dyn-item w-col w-col-4">
                <div class="product-div"><a href="#" class="product-link w-inline-block"></a>
                    <div class="picture-div other-products"></div>
                    <div class="product-name"></div>
                    <div class="cena-korpa">
                        <div class="cena"></div>
                        <div class="add-to-cart">
                            <form data-node-type="commerce-add-to-cart-form" class="w-commerce-commerceaddtocartform default-state"><label for="quantity-4920f6fba008bc0641b7ae42ff3a50b-2" class="field-label">Quantity</label><input type="number" id="quantity-4920f6fba008bc0641b7ae42ff3a50b0" name="commerce-add-to-cart-quantity-input" min="1" class="w-commerce-commerceaddtocartquantityinput quantity" value="1"><input type="submit" data-loading-text="Adding to cart..." value="Dodaj u korpu" class="w-commerce-commerceaddtocartbutton korpa-dugme"><a href="checkout.html" data-node-type="commerce-buy-now-button" class="w-commerce-commercebuynowbutton buy-now-button">Buy now</a></form>
                            <div style="display:none" class="w-commerce-commerceaddtocartoutofstock">
                                <div>This product is out of stock.</div>
                            </div>
                            <div data-node-type="commerce-add-to-cart-error" style="display:none" class="w-commerce-commerceaddtocarterror">
                                <div class=".w-add-to-cart-error-msg" data-w-add-to-cart-quantity-error="Product is not available in this quantity." data-w-add-to-cart-general-error="Something went wrong when adding this item to the cart." data-w-add-to-cart-buy-now-error="Something went wrong when trying to purchase this item." data-w-add-to-cart-checkout-disabled-error="Checkout is disabled on this site.">Product is not available in this quantity.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-dyn-empty">
            <div>No items found.</div>
        </div>
    </div>
</div>
<div class="ostali-proizvodi">
    <a href="#" class="link-block-4 darker w-inline-block">
        <div class="text-block-8">Pogledaj ostale proizvode</div>
        <div class="div-block-9"><img src="images/Asset-15.svg" alt="" class="image-9"></div>
    </a>
</div>
@endsection
