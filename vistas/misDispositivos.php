<?php include "header.php";

if (
    isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 1
) {
    include "../clases/Asignacion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];

    $sql1 = "SELECT persona.id_persona as idPersona
    FROM t_usuarios as usuario inner join t_persona as persona
    ON usuario.id_persona = persona.id_persona
    AND usuario.id_usuario='$idUsuario'";
    $respuesta1 = mysqli_query($conexion, $sql1);

    $idPersona = mysqli_fetch_array($respuesta1)[0];

    $sql = "SELECT 
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
        asignacion.memoria as procesador,
        equipo.descripcion as imagen

    FROM
        t_asignacion AS asignacion
            INNER JOIN
        t_persona as persona ON asignacion.id_persona = persona.id_persona
            INNER JOIN
        tk_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo and asignacion.id_persona = '$idPersona'";
    $respuesta = mysqli_query($conexion, $sql);
?>
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Mis Dispositivos</h1>
                <p class="lead">
                <div class="row">
                    <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4>
                                        <span class="<?php echo $mostrar['imagen']; ?>"></span>
                                        <?php echo $mostrar['nombreEquipo']; ?>
                                    </h4>
                                    <p>
                                        <?php echo $mostrar['descripcion']; ?>
                                    </p>
                                    <ul>
                                        <li>Marca: <?php echo $mostrar['marca']; ?></li>
                                        <li>Modelo: <?php echo $mostrar['modelo']; ?></li>
                                        <li>Color: <?php echo $mostrar['color']; ?></li>
                                        <li>Memoria: <?php echo $mostrar['memoria']; ?></li>
                                        <li>Disco Duro: <?php echo $mostrar['discoDuro']; ?></li>
                                        <li>Procesador: <?php echo $mostrar['procesador']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                </p>
            </div>
        </div>
    </div>

<?php include "footer.php";
} else {
    header("location:../index.html");
} ?>