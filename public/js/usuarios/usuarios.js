$(document).ready(function () {
  $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
});

function agregarNuevoUsuario() {
  $.ajax({
    type: "POST",
    data: $("#frmAgregarUsuario").serialize(),
    url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
    success: function (respuesta) {
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
        Swal.fire(":D", "Agregado con Exito", "success");
        $("#frmAgregarUsuario")[0].reset(); //reiniciar formulario si queremos agregar otro
      } else {
        Swal.fire(":(", "Algo Fallo al agregar!", +respuesta, "error");
      }
    },
  });
  return false;
}

function obtenerDatosUsuario(idUsuario) {
  $.ajax({
    type: "POST",
    data: "idUsuario=" + idUsuario,
    url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
    success: function (respuesta) {
      respuesta = jQuery.parseJSON(respuesta); //comvertir JSON en un objeto
      $("#idUsuario").val(respuesta["idUsuario"]);
      $("#paternou").val(respuesta["paterno"]);
      $("#maternou").val(respuesta["materno"]);
      $("#nombreu").val(respuesta["nombrePersona"]);
      $("#fechanacimientou").val(respuesta["fechanacimiento"]);
      $("#sexou").val(respuesta["sexo"]);
      $("#telefonou").val(respuesta["telefono"]);
      $("#correou").val(respuesta["correo"]);
      $("#usuariou").val(respuesta["nombreUsuario"]);
      $("#idRolu").val(respuesta["idRol"]);
      $("#ubicacionu").val(respuesta["ubicacion"]);
    },
  });
}

function actualizarUsuario() {
  $.ajax({
    type: "POST",
    data: $("#frmActualizarUsuario").serialize(),
    url: "../procesos/usuarios/crud/actualizarUsuario.php",
    success: function (respuesta) {
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
        Swal.fire(":D", "Actualizacion de datos Correcta", "success");
        $("#modalActualizarUsuarios").modal("hide");
      } else {
        Swal.fire(":(", "Algo Fallo al actualizar!", +respuesta, "error");
      }
    },
  });
  return false;
}
function agregarIdUsuarioReset(idUsuario) {
  $("#idUsuarioReset").val(idUsuario);
}

function resetPassword() {
  $.ajax({
    type: "POST",
    data: $("#frmActualizarPassword").serialize(),
    url: "../procesos/usuarios/extras/resetPassword.php",
    success: function (respuesta) {
      console.log(respuesta);
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $("#modalResetPassword").modal("hide");
        Swal.fire(":D", "Cambio de password con exito", "success");
      } else {
        Swal.fire(":(", "Error al actualizar password", +respuesta, "error");
      }
    },
  });
  return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
  $.ajax({
    type: "POST",
    data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
    url: "../procesos/usuarios/extras/cambioEstatusUsuario.php",
    success: function (respuesta) {
      console.log(respuesta);
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
        Swal.fire(":D", "Cambio de estatus con exito", "success");
      } else {
        Swal.fire(":(", "Error al cambiar estatus", +respuesta, "error");
      }
    },
  });
  return false;
}
