$(document).ready(function () {
  $("#tablaReporteAdminLoad").load("reportesAdmin/tablaReportesAdmin.php");
});

function eliminarReporteAdmin(idReporte) {
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

function obtenerDatosSolucion(idReporte) {
  $.ajax({
    type: "POST",
    data: "idReporte=" + idReporte,
    url: "../procesos/reportesAdmin/obtenerSolucion.php",
    success: function (respuesta) {
      respuesta = jQuery.parseJSON(respuesta);
      $("#idReporte").val(respuesta["idReporte"]);
      $("#solucion").val(respuesta["solucion"]);
      $("#estatus").val(respuesta["estatus"]);
    },
  });
}

function agregarSolucionReporte() {
  $.ajax({
    type: "POST",
    data: $("#frmAgregarSolucionReporte").serialize(),
    url: "../procesos/reportesAdmin/actualizarSolucion.php",
    success: function (respuesta) {
      respuesta = respuesta.trim();
      if (respuesta == 1) {
        Swal.fire(":D", "Agregado con exito", "success");
        $("#tablaReporteAdminLoad").load(
          "reportesAdmin/tablaReportesAdmin.php"
        );
      } else {
        Swal.fire(":(", "Ah ocurrido un error" + respuesta, "error");
      }
    },
  });
  return false;
}
