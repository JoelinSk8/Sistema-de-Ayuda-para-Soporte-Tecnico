<!-- Modal -->
<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
    <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="idUsuario" name="idUsuario" hidden>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="paternou">Apellido Paterno</label>
                            <input type="text" class="form-control" id="paternou" name="paternou" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="maternou">Apellido Materno</label>
                            <input type="text" class="form-control" id="maternou" name="maternou" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="nombreu">Nombre</label>
                            <input type="text" class="form-control" id="nombreu" name="nombreu" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="fachanacimientou">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="fechanacimientou" name="fechanacimientou">
                        </div>
                        <div class="col-sm-4">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexou" name="sexou" required>
                                <option value="0">Seleccione</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="paternou">Telefono</label>
                            <input type="number" class="form-control" id="telefonou" name="telefonou">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="correou">Correo</label>
                            <input type="mail" class="form-control" id="correou" name="correou">
                        </div>
                        <div class="col-sm-4">
                            <label for="usuariou">Usuario</label>
                            <input type="text" class="form-control" id="usuariou" name="usuariou">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="idRolu">Rol de usuario</label>
                            <select name="idRolu" id="idRolu" class="form-control">
                                <option value="0">Seleccione</option>
                                <option value="1">Cliente</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="ubicacionu">Ubicacion</label>
                            <textarea name="ubicacionu" id="ubicacionu" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>