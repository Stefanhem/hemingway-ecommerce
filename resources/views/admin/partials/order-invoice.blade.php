<div class="w-commerce-commerceorderconfirmationcontainer" style="padding-top: 5vh">
    <div class="w-commerce-commercelayoutcontainer w-container">
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
                            <div class="w-commerce-commercecheckoutsummaryitem"><label class="w-commerce-commercecheckoutsummarylabel">Payment Info</label>
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
                        <div>Subtotal</div>
                        <div>{{$data['sum']}} RSD</div>
                    </div>
                    <script type="text/x-wf-template" id="wf-template-5f083a9f233b5f765850315000000000006b">%3Cdiv%20class%3D%22w-commerce-commercecheckoutordersummaryextraitemslistitem%22%3E%3Cdiv%3E%3C%2Fdiv%3E%3Cdiv%3E%3C%2Fdiv%3E%3C%2Fdiv%3E</script>
                    <div class="w-commerce-commercecheckoutordersummaryextraitemslist" data-wf-collection="database.commerceOrder.extraItems" data-wf-template-id="wf-template-5f083a9f233b5f765850315000000000006b">
                        <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="w-commerce-commercecheckoutsummarylineitem">
                        <div>Total</div>
                        <div class="w-commerce-commercecheckoutsummarytotal">{{$data['sum']}} RSD</div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
