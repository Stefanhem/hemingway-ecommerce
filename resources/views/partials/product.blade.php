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
