<?php
include "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = " SELECT 
    persona.id_persona,
    CONCAT(persona.paterno,
            ' ',
            persona.materno,
            ' ',
            persona.nombre) AS nombrePersona,
	equipo.id_equipo as idEquipo,
    equipo.nombre as nombreEquipo,
    asignacion.id_asignacion as idAsignacion,
    asignacion.marca as marca,
    asignacion.modelo as modelo,
    asignacion.color as color,
    asignacion.descripcion as descripcion,
    asignacion.memoria as memoria,
    asignacion.disco_duro as discoDuro,
    asignacion.memoria as procesador
FROM
    t_asignacion AS asignacion
        INNER JOIN
    t_persona as persona ON asignacion.id_persona = persona.id_persona
        INNER JOIN
    tk_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo";
$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" id="tablaAsignacionDataTable" style="width:100%">
    <thead>
        <th>Persona</th>
        <th>Equipo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Descripcion</th>
        <th>Memoria</th>
        <th>Disco Duro</th>
        <th>Procesador</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
            <tr>
                <td><?php echo $mostrar['nombrePersona']; ?></td>
                <td><?php echo $mostrar['nombreEquipo']; ?></td>
                <td><?php echo $mostrar['marca']; ?></td>
                <td><?php echo $mostrar['modelo']; ?></td>
                <td><?php echo $mostrar['color']; ?></td>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <td><?php echo $mostrar['memoria']; ?></td>
                <td><?php echo $mostrar['discoDuro']; ?></td>
                <td><?php echo $mostrar['procesador']; ?></td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion']; ?>)">
                        Eliminar
                    </button>
                </td>


            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaAsignacionDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    });
</script>