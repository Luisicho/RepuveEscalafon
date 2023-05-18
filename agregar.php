<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-1">

    <div class="row">
        <div class="col-md-12 m-2">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>
            <div class="card card-body">
                <form action="save_esc.php" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-3">
                                <label class="label">No. Escalafon</label>
                                <input type="text" name="noesc" class="form-control" placeholder="No. Escalafon" autofocus>
                            </div>
                            <div class="col-9">
                                <label class="label">Registro</label>
                                <input type="text" name="registro" class="form-control" placeholder="Registro">
                            </div>
                        </div>
                    </div>
                    <!-- FECHA EJEMPLO
                    <div class="form-group date mb-2">
                        <label class="label">Fecha <i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <input type="text" name="fecha" class="form-control fj-date">
                    </div>
                    -->
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-6">
                                <label class="label">Apellido Paterno</label>
                                <input type="text" name="apaterno" class="form-control" placeholder="Apellido Paterno">
                            </div>
                            <div class="col-6">
                                <label class="label">Apellido Materno</label>
                                <input type="text" name="amaterno" class="form-control" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-8">
                                <label class="label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-4">
                                <label class="label">Telefono</label>
                                <input type="number" name="telefono" class="form-control" placeholder="10 Digitos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">C.U.R.P.</label>
                                <input type="text" name="curp" class="form-control" placeholder="CURP">
                            </div>
                            <div class="col-4">
                                <label class="label">I.N.E.</label>
                                <input type="text" name="ine" class="form-control" placeholder="INE">
                            </div>
                            <div class="col-4">
                                <label class="label">I.M.S.S.</label>
                                <input type="text" name="imss" class="form-control" placeholder="IMSS">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-5">
                                <label class="label">Calle</label>
                                <input type="text" name="calle" class="form-control" placeholder="Calle">
                            </div>
                            <div class="col-2">
                                <label class="label">No. Exterior</label>
                                <input type="text" name="noext" class="form-control" placeholder="No. Exterior">
                            </div>
                            <div class="col-5">
                                <label class="label">Colonia</label>
                                <input type="text" name="colonia" class="form-control" placeholder="Colonia">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <label class="label">Codigo Postal</label>
                                <input type="text" name="cp" class="form-control" placeholder="Codigo Postal">
                            </div>
                            <div class="col-5">
                                <label class="label">Localidad</label>
                                <input type="text" name="localidad" class="form-control" placeholder="Localidad">
                            </div>
                            <div class="col-5">
                                <label class="label">Municipio</label>
                                <input type="text" name="municipio" class="form-control" placeholder="Municipio">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">No. Licencia</label>
                                <input type="text" name="nolicencia" class="form-control" placeholder="No. Licencia">
                            </div>
                            <div class="col-8">
                                <label class="label">Tipo de Licencia <i class="fa fa-id-card" aria-hidden="true"></i></label>
                                <select class="custom-select form-control" name="tipo" id="tipo">
                                    <option selected>Seleccione</option>
                                    <option value="Chofer">Chofer</option>
                                    <option value="Automovilista">Automovilista</option>
                                    <option value="Transporte Publico">Transporte Publico</option>
                                    <option value="Motociclista">Motociclista</option>
                                    <option value="Permiso Menor">Permiso Menor</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group mt-2 mb-2">
                        <label class="label">Antiguedad</label>
                        <input type="file" class="form-control" name="antiguedad">
                    </div> -->

                    <input type="submit" class="btn btn-block" style="background-color:#9dbf2d;color:white;" name="save" value="Guardar">
                </form>
            </div>
        </div>
    </div>

</div>



<?php include("includes/footer.php") ?>