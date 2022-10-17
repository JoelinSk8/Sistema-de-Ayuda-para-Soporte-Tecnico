$(document).ready(function () {
  $("#tablaReporteClienteLoad").load("reportesCliente/tablaReporteCliente.php");
});

function agregarNuevoReporte() {
  $.ajax({
    type: "POST",
    data: $("#frmNuevoReporte").serialize(),
    url: "../procesos/reportesCliente/agregarNuevoReporte.php",
    success: function (respuesta) {
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        $("#tablaReporteClienteLoad").load(
          "reportesCliente/tablaReporteCliente.php"
        );
        $("#frmNuevoReporte")[0].reset();
        Swal.fire(":D", "Agregado con Exito", "success");
      } else {
        Swal.fire(":(", "Ocurrio un error al agregar" + respuesta, "error");
      }
    },
  });
  return false;
}

function eliminarReporte(idReporte) {
  Swal.fire({
    title: "Estas seguro de Eliminar este reporte?",
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
        data: "idReporte=" + idReporte,
        url: "../procesos/reportesCliente/eliminarReporteCliente.php",
        success: function (respuesta) {
          if (respuesta == 1) {
            $("#tablaReporteClienteLoad").load(
              "reportesCliente/tablaReporteCliente.php"
            );
            Swal.fire(":)", "Eliminado con Exito", "success");
          } else {
            Swal.fire(":(", "Fallo al eliminar" + respuesta, "error");
          }
        },
      });
    }
  });
}
