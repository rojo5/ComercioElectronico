$(document).ready(desplegar);

var desplegado = true;

function desplegar(){
    $('.menu_bar').click(function(){
       if(desplegado) {
           $('nav').animate({
               left: '0'
           });
           desplegado = false;
       }else{
           desplegado= true;
           $('nav').animate({
               left: '-100%'
           });
       }
    });
}

//Carrusel
