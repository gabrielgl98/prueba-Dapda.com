// en esta hoja controlaremos cuando se pone y cuando se quita el spinner
$(document).ready(function() {
   $(".enviarsolicitud").click(function(){
     //ocultamos el formulario cuando pinchemos en el boton
     $(".landing").hide();
     // mostramos el spinner cuando pinchemos el boton
     $(".loading_page").css('visibility', 'visible');
   })
});
