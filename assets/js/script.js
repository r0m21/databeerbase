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

/* Limitation du texte */

$(document).ready(function ()
{ $(".titleLimitIndex").each(function(i){
     var len=$(this).text().trim().length;
     if(len>27)
     {
         $(this).text($(this).text().substr(0,25)+'...');
     }
 });
});

$(document).ready(function ()
{ $(".titleLimitIndex").each(function(i){
     var len=$(this).text().trim().length;
     if(len>27)
     {
         $(this).text($(this).text().substr(0,25)+'...');
     }
 });
});

$(document).ready(function ()
{ $(".textLimitIndex").each(function(i){
     var len=$(this).text().trim().length;
     if(len>100)
     {
         $(this).text($(this).text().substr(0,125)+'...');
     }
 });
});

$(document).ready(function (){ 
    $(".textLimitSearch").each(function(i){
        var len=$(this).text().trim().length;
        if(len>20){
            $(this).text($(this).text().substr(0,20)+'...');
        }
    });
});

$('#style').on('keyup', function () {

    $.ajax({
    type: 'GET',
    url: 'search-style/' + this.value,
    cache: false,
    success: function (response) {
    //autoCompleteSuccess(response, true);
    //alert(response);
    $('#autocompletestyle').html(response);
    //alert(JSON.parse(response));
    },
    error: function (xhr) {
    console.log(JSON.parse(xhr.responseText));
    }
    
    });
    });
    
    function selectStyle(id) {
    var selection = document.getElementById(id);
    var champStyle = document.getElementById("style")
    var listeStyle = document.getElementById("autocompletestyle")
    alert(selection.innerText);
    champStyle.value = selection.innerText;
    listeStyle.style.display="none"
    
    }

