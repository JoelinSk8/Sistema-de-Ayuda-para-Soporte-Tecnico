$(document).ready(function () {
  $("#tablaAsignacionLoad").load("asignacion/tablaAsignacion.php");
});

function asignarEquipo() {
  $.ajax({
    type: "POST",
    data: $("#frmAsignaEquipo").serialize(),
    url: "../procesos/asignacion/asignar.php",
    success: function (respuesta) {
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $("#frmAsignaEquipo")[0].reset();
        $("#tablaAsignacionLoad").load("asignacion/tablaAsignacion.php");
        Swal.fire(":)", "Asignado con Exito", "success");
      } else {
        Swal.fire(":(", "Fallo al asignar", +respuesta, "error");
      }
    },
  });
  return false;
}

function eliminarAsignacion(idAsignacion) {
  Swal.fire({
    title: "Estas seguro de Eliminar este registro?",
    text: "Una vez eliminado no sera recuperado",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3885d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: "idAsignacion=" + idAsignacion,
        url: "../procesos/asignacion/eliminarAsignacion.php",
        success: function (respuesta) {
          if (respuesta == 1) {
            $("#tablaAsignacionLoad").load("asignacion/tablaAsignacion.php");
            Swal.fire(":)", "Eliminado con Exito", "success");
          } else {
            Swal.fire(":(", "Fallo al eliminar" + respuesta, "error");
          }
        },
      });
    }
  });

  return false;
}
