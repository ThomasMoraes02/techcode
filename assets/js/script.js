//Slide
$(function() {
    $('.slide').slick({
        //slidesToShow: 1, //Quantas imagens a ser exibidas
        slidesToScroll: 1, //Quantas imagens para o carrosel
        autoplay: true,
        autoplaySpeed: 2000,
    })
})

$(window).scroll(function() {
    var windowTop = $(this).scrollTop();
    $('.anime').each(function() {
        if (windowTop > $(this).offset().top - 800) {
            $(this).addClass('anime-init');
        } else {
            $(this).removeClass('anime-init');
        }
    });
});