@extends('layouts.app')
@section('content')
    <div class="proizvod-template" style="">
        <div class="proizvod-fotka-div">
            @if($productColors->count() > 0)
                <div class="div-block-product">
                    <img class="male-fotke" src="{{asset($product->mainImage)}}"/>
                    @foreach($productColors as $productColor)
                        <img src="{{asset($productColor->imagePath)}}" class="male-fotke"/>
                    @endforeach
                </div>
            @endif
            <div class="fotka-ikonice">
                <img class="fotka" src="{{asset($product->mainImage)}}"/>
                <div class="ikonice">
                    @if ($labels->count() > 0)
                        @foreach($labels as $label)
                            <div><img src="{{asset($label->label->image)}}" title="{{$label->label->name}}"
                                      alt="{{$label->label->name}}" class="image-14"></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="opis-proizvoda-div">
            <h1 class="heading proizvod-head page">{{$product->name}}</h1>
            @if($product->isOnSpecialOffer())
                <div class="text-block-18"><strike>{{$product->price . ' RSD' }}</strike></div>
                <div class="text-block-18" style="margin-top: 10px">{{$product->priceOnSpecialOffer . ' RSD' }}</div>
            @else
                <div class="text-block-18">{{$product->price . ' RSD' }}</div>
            @endif
            {{-- @if($productColors->count() > 0)
                <div class="text-block-19">Izaberi boju</div>
                <div class="boje-izbor">
                    @foreach($productColors as $productColor)
                        <div class="kruzici-boja" style="background-color:{{$productColor->color->hexCode}}"
                             data-value="{{$productColor->color->name}}"
                             data-image="{{asset($productColor->imagePath)}}"></div>
                    @endforeach
                </div>
            @endif --}}

            {{ Form::open(['url' => '/add-cart/' . $product->id, 'method' => 'POST']) }}
            <input type="hidden" id="color" name="color" value="">
            <input type="hidden" id="idProduct" name="idProduct" value="{{$product->id}}">
            <label for="quantity" class="field-label-5" style="margin-top:15px">Kolicina</label>
            <input type="number" id="quantity" name="quantity" min="1" max="{{$product->quantityInStock}}"
                   style="margin-top:10px !important" class="div-block-17" value="1">
            <div class="text-block-19" style="margin:30px 0 20px 0">Dimenzije: <span
                    class="text-block-18">{{$product->dimensions}}</span></div>
            @if($product->quantityInStock <= 3 && $product->quantityInStock > 0)
                <div class="w-commerce-commerceaddtocartoutofstock">
                    <div>Samo jos {{$product->quantityInStock}} proizvoda na stanju!</div>
                </div>
            @endif
            @if($product->quantityInStock <= 0)
                <div class="w-commerce-commerceaddtocartoutofstock" style="text-align: center">
                    <div style="color:red"><strong>STOCK OUT</strong></div>
                </div>
            @else
                <input type="submit" data-loading-text="Adding to cart..." value="Dodaj u korpu"
                       class="button-4 w-button">
            @endif
            {{ Form::close() }}
        <!-- ShareThis BEGIN -->
            <div style="margin-top:20px" class="sharethis-inline-share-buttons"></div>
            <!-- ShareThis END -->
            @if (!empty(Auth::user()))
                <div class="text-block-19" style="margin-bottom: 20px">Admin Tools</div>
                <a class="button-5 w-button" href="/admin/products/update/{{$product->id}}" style="margin-bottom: 20px">
                    Edit Product
                </a>
                <a class="button-5 w-button" href="/admin/products/{{$product->id}}/labels" style="margin-bottom: 20px">
                    Edit Labels
                </a>
                {{ Form::open(['url' => '/admin/products/delete/' . $product->id, 'method' => 'DELETE']) }}
                <input type="submit" value="Delete product" class="button-5 w-button" style="margin-bottom: 20px">
                {{ Form::close() }}
                <a class="button-5 w-button" href="/admin/products/color/{{$product->id}}" style="margin-bottom: 20px">
                    Add new Image
                </a>

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
                <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim
                    in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla,</p><img
                    src="images/Asset-1.svg" width="23" alt="" class="image-13">
            </div>
            <div class="review-text-div">
                <div class="petar-petrovic">Petar Petrovic</div>
                <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim
                    in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut
                    commodo diam libero vitae erat.</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13">
            </div>
            <div class="review-text-div">
                <div class="petar-petrovic">Petar Petrovic</div>
                <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim
                    in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut
                    commodo diam libero vitae erat.</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13">
            </div>
        </div>
    </div>
    <div class="proizvodi">
        <h1 class="heading">Predloženi proizvodi</h1>
        <div class="proizvodi-div">
            @if($sameTypeProducts->count() > 0)
                @each('partials.product', $sameTypeProducts, 'product')
            @else
                <div class="w-dyn-empty">
                    <div>No items found.</div>
                </div>
            @endif
        </div>
    </div>
@endsection
