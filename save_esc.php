<?php

include("db.php");

if (isset($_POST['save'])) {
    if (strlen($_POST['noesc']) >= 1) {
        $noesc = $_POST['noesc'];
        $registro = $_POST['registro'];
        $apaterno = $_POST['apaterno'];
        $amaterno = $_POST['amaterno'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $curp = $_POST['curp'];
        $ine = $_POST['ine'];
        $imss = $_POST['imss'];
        $calle = '';
        $noext = '';
        $colonia = '';
        $cp = '';
        $localidad = '';
        $municipio = '';
        $nolicencia = $_POST['nolicencia'];
        $tipo = $_POST['tipo'];
        //$antiguedad = $_POST['antiguedad'];

        //Consulta
        $consulta = "INSERT INTO escalafon(NOESC, REGISTRO, APATERNO, AMATERNO, NOMBRE, TELEFONO, CURP, INE, IMSS, CALLE, NOEXT, COLONIA, CP, LOCALIDAD, MUNICIPIO, NOLICENCIA, TIPO,COMANTIGUEDAD, TIEMPOANTIGUEDAD, FECHAANTIGUEDAD) VALUES ('$noesc','$registro','$apaterno','$amaterno','$nombre','$telefono','$curp','$ine','$imss','$calle','$noext','$colonia','$cp','$localidad','$municipio','$nolicencia','$tipo','',0,'')";
        //Insercion
        $resultado = mysqli_query($conex, $consulta);

        if (!$resultado) {
            die("Error al insertar");
        }
        /*
        //guarda archivo
        //hace extencion a minusculas
        $fileExt = explode('.',$_POST['antiguedad'][0]);//split
        $fileActualExt = $fileExt[0].strtolower(end($fileExt));//tolowercase
        //Copia archivo a upload
        move_uploaded_file($_POST['antiguedad'][2],'./assets/upload/'.$fileActualExt);
        */
        //session_start();
        $_SESSION['message'] = 'Insertado con exito';
        $_SESSION['message_type'] = 'success';
        header("Location: agregar.php");
    } else {
        $mensaje = 'Algun campo vacio';
        $mensajeTipo = 'warning';
    }
} ?>

<?php include("includes/header.php") ?>

<div class="container p-1">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <?php if (isset($mensaje)) { ?>
                <div class="alert alert-<?= $mensajeTipo ?> alert-dismissible fade show" role="alert">
                    <?= $mensaje ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php  
            } ?>
            <div class="card card-body">
                <form action="save_esc.php" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-3">
                                <label class="label">No. Escalafon</label>
                                <input type="text" name='noesc' value="<?php echo $_POST['noesc']; ?>" class="form-control" placeholder="No. Escalafon">
                            </div>
                            <div class="col-9">
                                <label class="label">Registro</label>
                                <input type="text" name="registro" value="<?php echo $_POST['registro']; ?>" class="form-control" placeholder="Registro">
                            </div>
                        </div>
                    </div>
                    <!-- PRUEBA FECHA
                    <div class="form-group date mb-2 ">
                        <label class="label">Fecha <i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <input type="text" value="<? //php echo $fecha; 
                                                    ?>" class="form-control fj-date">
                    </div> 
                    -->
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-6">
                                <label class="label">Apellido Paterno</label>
                                <input type="text" name="apaterno" value="<?php echo $_POST['apaterno']; ?>" class="form-control" placeholder="Apellido Paterno">
                            </div>
                            <div class="col-6">
                                <label class="label">Apellido Materno</label>
                                <input type="text" name="amaterno" value="<?php echo $_POST['amaterno']; ?>" class="form-control" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-8">
                                <label class="label">Nombre</label>
                                <input type="text" name="nombre" value="<?php echo $_POST['nombre']; ?>" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-4">
                                <label class="label">Telefono</label>
                                <input type="number" name="telefono" value="<?php echo $_POST['telefono']; ?>" class="form-control" placeholder="Telefono">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">C.U.R.P.</label>
                                <input type="text" name="curp" value="<?php echo $_POST['curp']; ?>" class="form-control" placeholder="CURP">
                            </div>
                            <div class="col-4">
                                <label class="label">I.N.E.</label>
                                <input type="text" name="ine" value="<?php echo $_POST['ine']; ?>" class="form-control" placeholder="INE">
                            </div>
                            <div class="col-4">
                                <label class="label">I.M.S.S.</label>
                                <input type="text" name="imss" value="<?php echo $_POST['imss']; ?>" class="form-control" placeholder="IMSS">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">No. Licencia</label>
                                <input type="text" name="nolicencia" value="<?php echo $_POST['nolicencia']; ?>" class="form-control" placeholder="No. Licencia">
                            </div>
                            <div class="col-8">
                                <label class="label">Tipo de Licencia <i class="fa fa-id-card" aria-hidden="true"></i></label>
                                <select class="custom-select form-control" name="tipo" id="tipo">
                                    <!-- Condicion lectura tipo -->
                                    <?php
                                    switch ($_POST['tipo']) {
                                        case "Chofer":
                                    ?>
                                            <option value="Chofer" selected>Chofer</option>
                                            <option value="Automovilista">Automovilista</option>
                                            <option value="Transporte Publico">Transporte Publico</option>
                                            <option value="Motociclista">Motociclista</option>
                                            <option value="Permiso Menor">Permiso Menor</option>
                                        <?php
                                            break;
                                        case "Automovilista":
                                        ?>
                                            <option value="Chofer">Chofer</option>
                                            <option value="Automovilista" selected>Automovilista</option>
                                            <option value="Transporte Publico">Transporte Publico</option>
                                            <option value="Motociclista">Motociclista</option>
                                            <option value="Permiso Menor">Permiso Menor</option>
                                        <?php
                                            break;
                                        case "Transporte Publico":
                                        ?>
                                            <option value="Chofer">Chofer</option>
                                            <option value="Automovilista">Automovilista</option>
                                            <option value="Transporte Publico" selected>Transporte Publico</option>
                                            <option value="Motociclista">Motociclista</option>
                                            <option value="Permiso Menor">Permiso Menor</option>
                                        <?php
                                            break;
                                        case "Motociclista":
                                        ?>
                                            <option value="Chofer">Chofer</option>
                                            <option value="Automovilista">Automovilista</option>
                                            <option value="Transporte Publico">Transporte Publico</option>
                                            <option value="Motociclista" selected>Motociclista</option>
                                            <option value="Permiso Menor">Permiso Menor</option>
                                        <?php
                                            break;
                                        case "Permiso Menor":
                                        ?>
                                            <option value="Chofer">Chofer</option>
                                            <option value="Automovilista">Automovilista</option>
                                            <option value="Transporte Publico">Transporte Publico</option>
                                            <option value="Motociclista">Motociclista</option>
                                            <option value="Permiso Menor" selected>Permiso Menor</option>
                                        <?php
                                            break;
                                        case 'Seleccione':
                                        ?>
                                            <option selected>Seleccione</option>
                                            <option value="Chofer">Chofer</option>
                                            <option value="Automovilista">Automovilista</option>
                                            <option value="Transporte Publico">Transporte Publico</option>
                                            <option value="Motociclista">Motociclista</option>
                                            <option value="Permiso Menor">Permiso Menor</option>
                                        <?php
                                            break;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block" style="background-color:#9dbf2d;color:white;" name="save" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>