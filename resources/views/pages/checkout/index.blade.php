@extends('layouts.app')
@section('content')
    <div class="section-5">
        <div class="form-block w-form">
            {{ Form::open(['url' => '/order', 'method' => 'POST', 'class' => 'form-2']) }}
            <div class="order-form-div-block">
                <div class="left-order-info-div">
                    <div class="customer-info-div">
                        <div class="block-header">
                            <h4 class="heading-6">Informacije o kupcu</h4>
                            <div>* Obavezno polje</div>
                        </div>
                        <div class="block-content">
                            <label for="email">Email*</label>
                            <input type="email" class="text-field-3 w-input" maxlength="256" name="email"  id="email" required="" value="vlado.plavsa.96@gmail.com">
                            <label for="name">Ime i prezime*</label>
                            <input type="text" class="text-field-3 w-input" maxlength="256" name="name" id="name" required="" value="Vladimir Plavsic">
                            <label for="phoneNumber">Broj telefona*</label>
                            <input type="tel" class="text-field-3 w-input" maxlength="256" name="phoneNumber" id="phoneNumber" required="" value="0644558107"></div>
                    </div>
                    <div class="customer-info-div">
                        <div class="block-header">
                            <h4 class="heading-6">Adresa Dostavljanja</h4>
                            <div>* Obavezno polje</div>
                        </div>
                        <div class="block-content">
                            <label for="address">Adresa*</label>
                            <input type="text" class="text-field-3 w-input" maxlength="256" name="address" id="address" required="" value="Brace Jovanovic 27">
                            <label for="country">Država*</label>
                            <input type="text" class="text-field-3 w-input" maxlength="256" name="country" id="country" required="" value="Srbija">
                            <div class="row">
                                <div class="collumn">
                                    <label for="city">Grad*</label>
                                    <input type="tel" class="text-field-3 w-input" maxlength="256" name="city" id="city" required="" value="Kraljevo">
                                </div>
                                <div class="collumn">
                                    <label for="zipCode">Poštanski broj*</label>
                                    <input type="tel" class="text-field-3 w-input" maxlength="256" name="zipCode" id="zipCode" required="" value="36000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customer-info-div">
                        <div class="block-header">
                            <h4 class="heading-6">Poručeni proizvodi</h4>
                        </div>
                        <div class="block-content">
                            <div class="order-items">
                                @if(!empty(\Illuminate\Support\Facades\Session::get('products')) && count(\Illuminate\Support\Facades\Session::get('products')) > 0)
                                    @foreach(\Illuminate\Support\Facades\Session::get('products') as $cartProduct)
                                        <div id="checkout-product-{{$cartProduct['id']}}" class="order-item" style="color: black">
                                            <img src="{{asset($cartProduct['product']->mainImage)}}" width="80" alt="">
                                            <div class="div-block-19">
                                                <div class="text-block-23">{{$cartProduct['product']->name}}</div>
                                                <div>Količina: {{$cartProduct['quantity']}} </div>
                                                <div>Boja: Braon</div>
                                            </div>
                                            <div>
                                                <p>{{$cartProduct['price']}} RSD </p>
                                                <a href="#" class="remove-checkout-product">Obrisi</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-order-info-div">
                    <div class="customer-info-div">
                        <div class="block-header">
                            <h4 class="heading-6">Za uplatu</h4>
                        </div>
                        <div class="block-content">
                            <div class="line-item">
                                <div>Ukupno</div>
                                <div>{{\Illuminate\Support\Facades\Session::get('cartSum')}} RSD</div>
                            </div>
                        </div>
                        <!--<div class="block-content"><label class="w-commerce-commercecheckoutdiscountslabel">PROMO Kod</label>
                            <div class="div-block-20"><input type="text" maxlength="256" name="Promo-code" data-name="Promo-code" id="Promo-code" class="text-field-4 w-input"></div>
                        </div>-->
                    </div>
                    <button type="submit" name='action' value='on-delivery' class="button-6 w-button" style="margin-bottom: 10px;">Plaćanje pouzećem</button>
                    <button type="submit" name='action' value='post-payment' class="button-6 w-button" style="background-color: red">Plaćanje uplatnicom</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
