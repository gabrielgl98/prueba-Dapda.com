//En esta hoja de scripts, cambiaremos el vehiculo a elegir según el tipo de vehiculos seleccioniado.
// una vez que cargue la pagina haremos las funciones necesarias
$(document).ready(function(){

  activarCampos();
  cambiarSelectVehiculos();




  function activarCampos(){
    //volvemos a activar los select desactivados
    $(".vehiculo").empty();
    $('.vehiculo').append('<option value="Sin Especificar" selected="selected">Sin Especificar</option>');
    // $('.tipoVehiculo[value="Sin Especificar"]').attr('selected',true);
    $(".tipoVehiculo").val('Sin Especificar');


    $(".vehiculo").prop('disabled', false);
    $(".tipoVehiculo").prop('disabled', false);
    $(".enviarsolicitud").prop('disabled', false);

  }



  function cambiarSelectVehiculos(){
    //cuando cambie el tipo de vehiculo, cambiaremos los vehiculos disponibles en el desplegable de vehiculo segun sean los mismos.
    $(".tipoVehiculo").on('change', function() {
      //guardamos en una variable el valor del tipo de vehiculo escogido para segun ese valor mostrar unos vehículos u otros.
      $.tipoVehiculo = $(".tipoVehiculo").val();
      console.log($.tipoVehiculo);

      // vaciamos el select para añadir las opciones segun el tipo de vehiculo
      $(".vehiculo").empty();

      if ($.tipoVehiculo== "Turismo" || $.tipoVehiculo== "Comercial") {

        $('.vehiculo').append('<option value="Corsa" selected="selected">Corsa</option>');
        $('.vehiculo').append('<option value="Astra" >Astra</option>');

      } else if ($.tipoVehiculo== "Todo Terreno") {

        $('.vehiculo').append('<option value="Mokka" selected="selected">Mokka</option>');
        $('.vehiculo').append('<option value="Crossland">Crossland</option>');

      }
    })
  }
})

function AsignarPreferencia(opcion){

    // $( '#appbundle_solicitud_preferenciaLlamada' ).val('Tarde');
    $( '#appbundle_solicitud_preferenciaLlamada' ).empty(); // vaciamos el select
    //añadimos la opcion que se ha pasado la url y para hacerlo solo lectura deshabilitamos el boton
    $('#appbundle_solicitud_preferenciaLlamada').append('<option value='+opcion+' selected="selected">'+opcion+'</option>');
    $( '#appbundle_solicitud_preferenciaLlamada' ).prop('disabled', true);

    $(".enviarsolicitud").click(function(){
      $( '#appbundle_solicitud_preferenciaLlamada' ).prop('disabled', false);
    })

}
