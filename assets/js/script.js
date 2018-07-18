/* Caroussel */

$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
    $('select').formSelect();
  });

$('.owl-carousel').owlCarousel({
    loop:true,
    nav:false,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

/* Limitation du texte aux 100 premiers caractères */

$(document).ready(function ()
{ $(".textLimit").each(function(i){
     var len=$(this).text().trim().length;
     if(len>100)
     {
         $(this).text($(this).text().substr(0,150)+'...');
     }
 });
});