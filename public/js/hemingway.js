$(document).ready(function(){
    $(".cart-button").click(function() {
        $(".cart-wrapper").css({opacity: 1, display: "block"});
    });
    $(".close-button ").click(function() {
        $(".cart-wrapper").css({opacity: 0, display: "none"});
    });
});
