<?php include 'views/templates/header.php';?>
<h1 class="mt-4">Usuarios</h1>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>

<button class="btn btn-primary mb-2" type="button" onclick="formUsuario();">Nuevo</button>

        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Usuarios Registrados
                </div>
                <div class="card-body">
                    <table id="tblUsuarios" class="table" >
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Caja</th>
                                <th>Estado</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Caja</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
        </div>
<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="formnuevoUsuarios">
                   <div class="form-group">
                       <label for="my-input">Usuario</label>
                       <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                   </div>
                   <div class="form-group">
                       <label for="my-input">Nombre del Usuario</label>
                       <input id="Nombre" class="form-control" type="text" name="Nombre" placeholder="Nombre del Usuario">
                   </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input">Contraseña</label>
                                <input id="Contraseña" class="form-control" type="password" name="Contraseña" placeholder="Contraseña">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input">Confirmar Contraseña</label>
                                <input id="Confirmar" class="form-control" type="password" name="Confirmar" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
                       <label for="caja">Caja</label>
                       <select id="caja" class="form-control" name="caja">
                       <?php foreach($data['cajas'] as $row){ ?>
                           <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
                       <?php  } ?>
                       </select>
                   </div>
                   <button class="btn btn-primary" type="button" onclick="registrarUser(event);">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'views/templates/footer.php';?>


