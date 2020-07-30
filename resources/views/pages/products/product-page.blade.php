@extends('layouts.app')
@section('content')
    <div class="proizvod-template">
        <div class="proizvod-fotka-div">
            <div class="div-block-16">
                @foreach($productColors as $productColor)
                    <img src="{{asset($productColor->imagePath)}}" class="male-fotke"/>
                @endforeach
            </div>
            <div class="fotka-ikonice">
                <img class="fotka" src="{{asset($product->mainImage)}}"/>
                <div class="ikonice">
                    <div><img src="{{asset('images/Best-seller.svg')}}" alt="" class="image-14"></div>
                    <div><img src="{{asset('images/free-delivery.svg')}}" alt="" class="image-14"></div>
                </div>
            </div>
        </div>
        <div class="opis-proizvoda-div">
            <h1 class="heading proizvod-head page">{{$product->name}}</h1>
            <div class="text-block-18">{{$product->price . ' RSD'}}</div>
            <div class="text-block-19">Izaberi boju</div>
            <div class="boje-izbor">
                @foreach($productColors as $productColor)
                    <div class="kruzici-boja" style="background-color:{{$productColor->color->hexCode}}" data-value="{{$productColor->color->name}}" data-image="{{asset($productColor->imagePath)}}"></div>
                @endforeach
            </div>
            {{ Form::open(['url' => '/add-cart/' . $product->id, 'method' => 'POST']) }}
            <input type="hidden" id="color" name="color" value="">
            <label for="quantity" class="field-label-5">Kolicina</label>
            <input type="number" id="quantity" name="quantity" min="1" class="div-block-17" value="1">
            @if($product->quantityInStock == 0)
                <div class="w-commerce-commerceaddtocartoutofstock">
                    <div>This product is out of stock.</div>
                </div>
            @else
                <input type="submit" data-loading-text="Adding to cart..." value="Dodaj u korpu" class="button-4 w-button">
            @endif
            {{ Form::close() }}
        </div></div>
    <div class="opis-proizvoda">
        <h1 class="heading opis-proizvoda">Opis proizvoda</h1>
        <p class="paragraph-3">{{$product->description}}</p>
    </div>
    <div class="review">
        <h1 class="heading heading-review">Drugi o ovom proizvodu</h1>
        <div class="review-div">
            <div class="review-text-div">
                <div class="petar-petrovic">Ime Prezime</div>
                <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla,</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13"></div>
            <div class="review-text-div">
                <div class="petar-petrovic">Petar Petrovic</div>
                <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13"></div>
            <div class="review-text-div">
                <div class="petar-petrovic">Petar Petrovic</div>
                <p class="paragraph-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p><img src="images/Asset-1.svg" width="23" alt="" class="image-13"></div>
        </div>
    </div>
    <div class="proizvodi">
        <h1 class="heading">Proizvodi</h1>
        <div class="proizvodi-div">
            <div class="proizvod-div">
                <div class="fotka-proizvoda"></div>
                <h1 class="naziv-proizvoda-mali-div">Kozna futrola<br>za naocare</h1>
                <div class="cena-dugme">
                    <div class="text-block-21">2500 RSD</div><a href="#" class="button-5 w-button">Dodaj u korpu</a></div>
            </div>
            <div class="proizvod-div">
                <div class="fotka-proizvoda"></div>
                <h1 class="naziv-proizvoda-mali-div">Kozna futrola<br>za naocare</h1>
                <div class="cena-dugme">
                    <div class="text-block-21">2500 RSD</div><a href="#" class="button-5 w-button">Dodaj u korpu</a></div>
            </div>
            <div class="proizvod-div">
                <div class="fotka-proizvoda"></div>
                <h1 class="naziv-proizvoda-mali-div">Kozna futrola<br>za naocare</h1>
                <div class="cena-dugme">
                    <div class="text-block-21">2500 RSD</div><a href="#" class="button-5 w-button">Dodaj u korpu</a></div>
            </div>
        </div>
    </div>
@endsection
