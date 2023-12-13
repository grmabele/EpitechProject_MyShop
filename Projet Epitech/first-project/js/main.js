$(document).ready(function () {
    $(".filter .ft").click(function () {
        $(this).children("div").slideToggle();
    });
    $('header .fa-navicon').click(function () {
        $('.mobile-menu').slideToggle();
    });
    $(".filter-box").click(function () {
        $('.filter-content').slideToggle();
    });

    // price range 
    $("#ex2").slider({});

    var slider = new Slider('#ex2', {});
    /*-----------------------------------*/
});
