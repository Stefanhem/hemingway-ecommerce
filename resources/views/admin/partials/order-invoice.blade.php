<div class="w-commerce-commerceorderconfirmationcontainer" style="padding-top: 5vh">
    <div class="w-commerce-commercelayoutcontainer w-container">
        @if ($data['status'] == \App\Order::STATUS_PENDING)
            <div style="padding:0px;width: 100%;margin-bottom: 10px" class="w-commerce-commercecheckoutrow">
                {{ Form::open(['url' => '/admin/order/'. $data['id'] .'/status', 'method' => 'POST', 'class' => "w-commerce-commercecheckoutcolumn"]) }}
                <input type="hidden" name="status" value="{{\App\Order::STATUS_CONFIRMED}}">
                <button type="submit" class="btn btn-success">Confirm Order</button>
                {{ Form::close() }}

                {{ Form::open(['url' => '/admin/order/'. $data['id'] .'/status', 'method' => 'POST', 'class' => "w-commerce-commercecheckoutcolumn"]) }}
                <input type="hidden" name="status" value="{{\App\Order::STATUS_DENIED}}">
                <button type="submit" class="btn btn-danger">Deny Order</button>
                {{ Form::close() }}
            </div>
        @endif
        <div class="w-commerce-commercelayoutmain">
            <div class="w-commerce-commercecheckoutcustomerinfosummarywrapper">
                <div class="w-commerce-commercecheckoutsummaryblockheader">
                    <h4>Customer Information</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent">
                    <div class="w-commerce-commercecheckoutrow">
                        <div class="w-commerce-commercecheckoutcolumn">
                            <div class="w-commerce-commercecheckoutsummaryitem">
                                <label class="w-commerce-commercecheckoutsummarylabel">Shopper Name</label>
                                <div>{{$data['name']}}</div>
                            </div>

                        </div>
                        <div class="w-commerce-commercecheckoutcolumn">
                            <div class="w-commerce-commercecheckoutsummaryitem">
                                <label class="w-commerce-commercecheckoutsummarylabel">Email</label>
                                <div>{{$data['email']}}</div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutpaymentsummarywrapper">
                <div class="w-commerce-commercecheckoutsummaryblockheader">
                    <h4>Payment Info</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent">
                    <div class="w-commerce-commercecheckoutrow">
                        <div class="w-commerce-commercecheckoutcolumn">
                            <div class="w-commerce-commercecheckoutsummaryitem"><label
                                    class="w-commerce-commercecheckoutsummarylabel">Payment Info</label>
                                <div class="w-commerce-commercecheckoutsummaryflexboxdiv">
                                    <div class="w-commerce-commercecheckoutsummarytextspacingondiv"></div>
                                    <div class="w-commerce-commercecheckoutsummarytextspacingondiv"></div>
                                </div>
                                <div class="w-commerce-commercecheckoutsummaryflexboxdiv">
                                    <div> {{$data['paymentMethod']}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-commerce-commercecheckoutcolumn">
                            <div class="w-commerce-commercecheckoutsummaryitem">
                                <label class="w-commerce-commercecheckoutsummarylabel">Shipping Address</label>
                                <div>{{$data['address']}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-commerce-commercecheckoutrow">
                        <div class="w-commerce-commercecheckoutcolumn">
                            <div class="w-commerce-commercecheckoutsummaryitem"><label
                                    class="w-commerce-commercecheckoutsummarylabel">Ime i prezime na adresi</label>
                                <div class="w-commerce-commercecheckoutsummaryflexboxdiv">
                                    <div class="w-commerce-commercecheckoutsummarytextspacingondiv"></div>
                                    <div class="w-commerce-commercecheckoutsummarytextspacingondiv"></div>
                                </div>
                                <div class="w-commerce-commercecheckoutsummaryflexboxdiv">
                                    <div> {{$data['deliveryName']}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-commerce-commercecheckoutcolumn">
                            <div class="w-commerce-commercecheckoutsummaryitem">
                                <label class="w-commerce-commercecheckoutsummarylabel">Broj telefona na adresi</label>
                                <div>{{$data['deliveryPhone']}}</div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutpaymentsummarywrapper">
                <div class="w-commerce-commercecheckoutsummaryblockheader">
                    <h4>Items in Order</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent">
                    <div class="order-items">
                        @foreach($data['products'] as $cartProduct)
                            <div id="checkout-product-{{$cartProduct['id']}}" class="order-item" style="color: black">
                                <img src="{{asset($cartProduct['product']->mainImage)}}" width="80" alt="">
                                <div class="div-block-19">
                                    <div class="text-block-23">{{$cartProduct['product']->name}}</div>
                                    <div>Količina: {{$cartProduct['quantity']}} </div>
                                    <div>Boja: {{$cartProduct['color']}}</div>
                                </div>
                                <div>
                                    <p>{{$cartProduct['price']}} RSD </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutpaymentsummarywrapper">
                <div class="w-commerce-commercecheckoutsummaryblockheader">
                    <h4>Order Summary</h4>
                </div>
                <fieldset class="w-commerce-commercecheckoutblockcontent">
                    <div class="w-commerce-commercecheckoutsummarylineitem">
                        <div>Total</div>
                        <div class="w-commerce-commercecheckoutsummarytotal">{{$data['sum']}} RSD</div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
