// ACTUALIZAR TARJETA
function modal_rol(datosrol) {
  datosamd = datosrol.split("||");
  $("#id").val(datosamd[0]);   
  $("#usuario").val(datosamd[1]);
  $("#correo").val(datosamd[2]);
  $("#pass").val(datosamd[3]);
}