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
    <h1 class="heading">Specijalna ponuda</h1>
    <div class="proizvodi-div">
        @if($specialOfferProducts->count() > 0)
            @foreach($specialOfferProducts as $specialOfferProduct)
                <div class="proizvod-div">
                    <img class="fotka-proizvoda" src="{{asset($specialOfferProduct->mainImage)}}"></img>
                    <h1 class="naziv-proizvoda-mali-div">{{$specialOfferProduct->name}}</h1>
                    <div class="cena-dugme">
                        <div class="text-block-21">{{$specialOfferProduct->price . ' RSD'}}</div>
                        @if($specialOfferProduct->quantityInStock == 0)
                            <div class="w-commerce-commerceaddtocartoutofstock">
                                <div>This product is out of stock.</div>
                            </div>
                        @else
                            <a href="/products/{{$specialOfferProduct->id}}" class="button-5 w-button add-cart">Pogledaj proizvod</a>
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
    <a href="/products/types" class="link-block-4 w-inline-block">
        <div class="text-block-8 white">Pogledaj ostale proizvode</div>
        <div class="div-block-9"><img src="images/Asset-15.svg" alt="" class="image-9 white"></div>
    </a>
</div>
<div id="Proizvodi" class="proizvodi">
    <h1 class="heading">Bestsellers</h1>
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
    <a href="/products/types" class="link-block-4 darker w-inline-block">
        <div class="text-block-8">Pogledaj ostale proizvode</div>
        <div class="div-block-9"><img src="images/Asset-15.svg" alt="" class="image-9"></div>
    </a>
</div>
@endsection
