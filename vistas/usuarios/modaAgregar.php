
<!-- Modal -->
<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">
<div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-4">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <div class="col-sm-4">
                <label for="paterno">Apellido Materno</label>
                <input type="text" class="form-control" id="materno" name="materno" required>
            </div>
            <div class="col-sm-4">
                <label for="paterno">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="paterno">Fecha Nacimiento</label>
                <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento">
            </div>
            <div class="col-sm-4">
                <label for="paterno">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="0">Seleccione</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="paterno">Telefono</label>
                <input type="number" class="form-control" id="telefono" name="telefono">
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="paterno">Correo</label>
                <input type="mail" class="form-control" id="correo" name="correo">
            </div>
            <div class="col-sm-4">
                <label for="paterno">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="col-sm-4">
                <label for="paterno">Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="idRol">Rol de usuario</label>
                <select name="idRol" id="idRol" class="form-control">
                    <option value="0">Seleccione</option>    
                    <option value="1">Cliente</option>
                    <option value="2">Administrador</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <label for="ubicacion">Ubicacion</label>
            <textarea name="ubicacion" id="ubicacion" class="form-control"></textarea>
            </div>
        </div>
    </div>
      <div class="modal-footer">
        <span  class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>

