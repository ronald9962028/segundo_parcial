// ACTUALIZAR TARJETA
function modal_rol(datosrol) {
  datosamd = datosrol.split("||");
  $("#id").val(datosamd[0]);   
  $("#roles").val(datosamd[1]);
}