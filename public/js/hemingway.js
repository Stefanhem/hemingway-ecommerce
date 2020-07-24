$(document).ready(function(){
    $(".cart-button").click(function() {
        $(".cart-wrapper").css({opacity: 1, display: "block"});
    });
    $(".close-button ").click(function() {
        $(".cart-wrapper").css({opacity: 0, display: "none"});
    });
    $(".remove-cart-product").click(function() {
        const cartItemId = $(this).parent().parent().attr('id');
        $('#' + cartItemId).hide();
    });
    $(".remove-checkout-product").click(function() {
        const cartItemId = $(this).parent().parent().attr('id');
        $('#' + cartItemId).hide();
    });
});
