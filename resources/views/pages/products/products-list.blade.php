@extends('layouts.app')
@section('content')
<div class="proizvodi special-section" style="padding-top: 25vh; min-height: 600px">
    @if (isset($typeName))
    <h1 class="heading">{{$typeName}}</h1>
    @endif
    @if($chunks->count() > 0)
    @foreach($chunks as $chunk)
    <div class="proizvodi-div">
        @foreach($chunk as $product)
        <div class="proizvod-div">
            <img class="fotka-proizvoda" src="{{asset($product->mainImage)}}"></img>
            <h1 class="naziv-proizvoda-mali-div">{{$product->name}}</h1>
            <div class="cena-dugme">
                <div class="text-block-21">
                    @if($product->isOnSpecialOffer)
                        {{$product->priceOnSpecialOffer . ' RSD'}}
                    @else
                        {{$product->price . ' RSD'}}
                    @endif
                </div>
                @if($product->quantityInStock == 0)
                <div class="w-commerce-commerceaddtocartoutofstock">
                    <div>This product is out of stock.</div>
                </div>
                @else
                <a href="/products/{{$product->id}}" class="button-5 w-button add-cart">Detaljnije</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    @else
    <div class="w-dyn-empty">
        <div>No items found.</div>
    </div>
    @endif
    @if($count > 1)
    <div class="pagination">
        @for($i=0; $i <= $count; $i++) <a href="/products/types?page={{$i + 1}}&type=1">{{$i + 1}}</a>
            @endfor
    </div>
    @endif
</div>

@endsection
