$(document).ready(function(){
    $(".cart-button").click(function() {
        $(".cart-wrapper").css({opacity: 1, display: "block"});
    });
    $(".close-button ").click(function() {
        $(".cart-wrapper").css({opacity: 0, display: "none"});
    });
    $(".remove-cart-product").click(function() {
        console.log('123');
        const cartItemId = $(this).parent().parent().attr('id');
        const id = cartItemId.replace('cart-product-', '');
        $('#' + cartItemId).hide();
        $.post('/remove-cart-item/' + id, {}, function (data, error) {
            console.log(data);
            if (data.amount || data.amount === 0) {
                $('#totalAmount').text(data.amount + ' RSD');
            }
        })
    });
    $(".remove-checkout-product").click(function() {
        const cartItemId = $(this).parent().parent().attr('id');
        const id = cartItemId.replace('checkout-product-', '');
        $('#' + cartItemId).hide();
        $.post('/remove-cart-item/' + id, {}, function (data, error) {
            if (data.amount || data.amount === 0) {
                const amount = data.amount + ' RSD';
                $('#sum').text(amount);
                $('#middleSum').text(amount);
            }
        })
    });
    $(".kruzici-boja").click(function () {
        const value = $(this).data('value');
        const image = $(this).data('image');
        $(".kruzici-boja").css({border: '0px'});
        $(this).css({border: '3px solid #ccc'});
        document.getElementById('color').value = value;
        $(".fotka").attr("src", image);
    });
});
