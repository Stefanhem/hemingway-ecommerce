@extends('layouts.app')
@section('content')
<div class="proizvod-template">
    <div class="proizvod-fotka-div">
        <div class="div-block-16">
            @foreach($productColors as $productColor)
            <img src="{{asset($productColor->imagePath)}}" class="male-fotke" />
            @endforeach
        </div>
        <div class="fotka-ikonice">
            <img class="fotka" src="{{asset($product->mainImage)}}" />
            <div class="ikonice">
                <div><img src="{{asset('images/Best-seller.svg')}}" alt="" class="image-14"></div>
                <div><img src="{{asset('images/free-delivery.svg')}}" alt="" class="image-14"></div>
            </div>
        </div>
    </div>
    <div class="opis-proizvoda-div">
        <h1 class="heading proizvod-head page">{{$product->name}}</h1>
        @if($product->isOnSpecialOffer)
        <div class="text-block-18"><strike>{{$product->price . ' RSD' }}</strike></div>
        <div class="text-block-18">{{$product->priceOnSpecialOffer . ' RSD' }}</div>
        @else
        <div class="text-block-18">{{$product->price . ' RSD' }}</div>
        @endif
        @if($productColors->count() > 0)
        <div class="text-block-19">Izaberi boju</div>
        <div class="boje-izbor">
            @foreach($productColors as $productColor)
            <div class="kruzici-boja" style="background-color:{{$productColor->color->hexCode}}" data-value="{{$productColor->color->name}}" data-image="{{asset($productColor->imagePath)}}"></div>
            @endforeach
        </div>
        @endif
        {{ Form::open(['url' => '/add-cart/' . $product->id, 'method' => 'POST']) }}
        <input type="hidden" id="color" name="color" value="">
        <input type="hidden" id="idProduct" name="idProduct" value="{{$product->id}}">
        <label for="quantity" class="field-label-5">Kolicina</label>
        <input type="number" id="quantity" name="quantity" min="1" max="{{$product->quantityInStock}}" class="div-block-17" value="1">
        @if($product->quantityInStock <= 3 && $product->quantityInStock > 0)
            <div class="w-commerce-commerceaddtocartoutofstock">
                <div>Samo jos {{$product->quantityInStock}} proizvoda na stanju!</div>
            </div>
            @endif
            @if($product->quantityInStock <= 0) <div class="w-commerce-commerceaddtocartoutofstock">
                <div>Trenutno nema proizvoda na stanju.</div>
    </div>
    @else
    <input type="submit" data-loading-text="Adding to cart..." value="Dodaj u korpu" class="button-4 w-button">
    @endif
    {{ Form::close() }}
    <!-- ShareThis BEGIN -->
    <div style="margin-top:20px" class="sharethis-inline-share-buttons"></div>
    <!-- ShareThis END -->
    @if (!empty(Auth::user()))
    <div class="text-block-19" style="margin-bottom: 20px">Admin Tools</div>
    <a class="button-5 w-button" href="/admin/products/update/{{$product->id}}" style="margin-bottom: 20px">Edit Product</a>
    {{ Form::open(['url' => '/admin/products/delete/' . $product->id, 'method' => 'DELETE']) }}
    <input type="submit" value="Delete product" class="button-5 w-button" style="margin-bottom: 20px">
    {{ Form::close() }}
    <a class="button-5 w-button" href="/admin/products/color/{{$product->id}}" style="margin-bottom: 20px">Add new Color</a>
    @endif
</div>
</div>
<div class="opis-proizvoda">
    <h1 class="heading opis-proizvoda">Opis proizvoda</h1>
    <p class="paragraph-3">{{$product->description}}</p>
</div>
<div class="review">
    <h1 class="heading heading-review">Drugi o ovom proizvodu</h1>
    <div class="review-div">
        <div class="review-text-div">
            <div class="petar-petrovic">Ime Prezime</div>
            <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla,</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13">
        </div>
        <div class="review-text-div">
            <div class="petar-petrovic">Petar Petrovic</div>
            <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13">
        </div>
        <div class="review-text-div">
            <div class="petar-petrovic">Petar Petrovic</div>
            <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13">
        </div>
    </div>
</div>
<div class="proizvodi">
    <h1 class="heading">Proizvodi</h1>
    <div class="proizvodi-div">
        @if($sameTypeProducts->count() > 0)
        @foreach($sameTypeProducts as $sameTypeProduct)
        <div class="proizvod-div">
            <img class="fotka-proizvoda" src="{{asset($sameTypeProduct->mainImage)}}"></img>
            <h1 class="naziv-proizvoda-mali-div">{{$sameTypeProduct->name}}</h1>
            <div class="cena-dugme">
                <div class="text-block-21">{{$sameTypeProduct->price . ' RSD'}}</div>
                @if($sameTypeProduct->quantityInStock == 0)
                <div class="w-commerce-commerceaddtocartoutofstock">
                    <div>This product is out of stock.</div>
                </div>
                @else
                <a href="/products/{{$sameTypeProduct->id}}" class="button-5 w-button add-cart">Pogledaj proizvod</a>
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
@endsection