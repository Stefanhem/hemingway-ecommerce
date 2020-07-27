<div id="checkout-product-{{$cartProduct['id']}}" class="order-item" style="color: black">
    <img src="{{asset($cartProduct['product']->mainImage)}}" width="80" alt="">
    <div class="div-block-19">
        <div class="text-block-23">{{$cartProduct['product']->name}}</div>
        <div>Količina: {{$cartProduct['quantity']}} </div>
        <div>Boja: Braon</div>
    </div>
    <div style="min-width: 75px">
        <p>{{$cartProduct['price']}} RSD </p>
        <a href="#" class="remove-checkout-product">Obrisi</a>
    </div>
</div>
