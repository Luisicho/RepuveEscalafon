<?php

include("db.php");

if (isset($_GET['IDE'])) {
    $IDE = $_GET['IDE'];

    $query = "SELECT * FROM ESCALAFON WHERE IDE = $IDE";
    $result = mysqli_query($conex, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $IDEN = $row[0];
        $noescN = $row[1];
        $registroN = $row[2];
        $apaternoN = $row[3];
        $amaternoN = $row[4];
        $nombreN = $row[5];
        $telefonoN = $row[6];
        $curpN = $row[7];
        $ineN = $row[8];
        $imssN = $row[9];
        $calleN = $row[10];
        $noextN = $row[11];
        $coloniaN = $row[12];
        $cpN = $row[13];
        $localidadN = $row[14];
        $municipioN = $row[15];
        $nolicenciaN = $row[16];
        $tipoN = $row[17];
    }
}

if (isset($_POST['update'])) {
    $IDEac = $_GET['IDE'];
    //toma datos de name textos
    $noescAc = $_POST['noesc'];
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
    
    //consulta actualizar
    $query = "UPDATE ESCALAFON SET NOESC = '$noescAc', REGISTRO = '$registro',APATERNO='$apaterno',AMATERNO='$amaterno',NOMBRE='$nombre',TELEFONO='$telefono',CURP='$curp',INE='$ine',IMSS='$imss',CALLE='$calle',NOEXT='$noext',CP='$cp',LOCALIDAD='$localidad',MUNICIPIO='$municipio',NOLICENCIA='$nolicencia',TIPO='$tipo' WHERE IDE = '$IDEac'";
    //ejecuta query
    mysqli_query($conex, $query);
    //Guarda mensaje de alerta
    $_SESSION['message'] = 'Actualizado con exito';
    $_SESSION['message_type'] = 'info';
    //redirecciona a tabla.php
    header("Location: tabla.php");
}
?>


<?php include("includes/header.php") ?>

<div class="container p-1">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-body">
                <form action="edit_esc.php?IDE=<?php echo $_GET['IDE']; ?>" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-3">
                                <label class="label">No. Escalafon</label>
                                <input type="text" name='noesc' value="<?php echo $noescN; ?>" class="form-control" placeholder="Nuevo No. Escalafon">
                            </div>
                            <div class="col-9">
                                <label class="label">Registro</label>
                                <input type="text" name="registro" value="<?php echo $registroN; ?>" class="form-control" placeholder="Nuevo Registro">
                            </div>
                        </div>
                    </div>
                    <!-- PRUEBA FECHA
                    <div class="form-group date mb-2 ">
                        <label class="label">Fecha <i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <input type="text" value="<?//php echo $fecha; ?>" class="form-control fj-date">
                    </div> 
                    -->
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-6">
                                <label class="label">Apellido Paterno</label>
                                <input type="text" name="apaterno" value="<?php echo $apaternoN; ?>" class="form-control" placeholder="Nuevo Apellido Paterno">
                            </div>
                            <div class="col-6">
                                <label class="label">Apellido Materno</label>
                                <input type="text" name="amaterno" value="<?php echo $amaternoN; ?>" class="form-control" placeholder="Nuevo Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-8">
                                <label class="label">Nombre</label>
                                <input type="text" name="nombre" value="<?php echo $nombreN; ?>" class="form-control" placeholder="Nuevo Nombre">
                            </div>
                            <div class="col-4">
                                <label class="label">Telefono</label>
                                <input type="number" name="telefono" value="<?php echo $telefonoN; ?>" class="form-control" placeholder="Nuevo Telefono">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">C.U.R.P.</label>
                                <input type="text" name="curp" value="<?php echo $curpN; ?>" class="form-control" placeholder="Nueva CURP">
                            </div>
                            <div class="col-4">
                                <label class="label">I.N.E.</label>
                                <input type="text" name="ine" value="<?php echo $ineN; ?>" class="form-control" placeholder="Nuevo INE">
                            </div>
                            <div class="col-4">
                                <label class="label">I.M.S.S.</label>
                                <input type="text" name="imss" value="<?php echo $imssN; ?>" class="form-control" placeholder="Nuevo IMSS">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label class="label">No. Licencia</label>
                                <input type="text" name="nolicencia" value="<?php echo $nolicenciaN; ?>" class="form-control" placeholder="No. Licencia">
                            </div>
                            <div class="col-8">
                                <label class="label">Tipo de Licencia <i class="fa fa-id-card" aria-hidden="true"></i></label>
                                <select class="custom-select form-control" name="tipo" id="tipo">
                                    <!-- Condicion lectura tipo -->
                                    <?php 
                                    switch ($tipoN){
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
                                        default:
                                            ?>
                                                <option>Seleccione</option>
                                                <option value="Chofer">Chofer</option>
                                                <option value="Automovilista">Automovilista</option>
                                                <option value="Transporte Publico">Transporte Publico</option>
                                                <option value="Motociclista">Motociclista</option>
                                                <option value="Permiso Menor" selected>Permiso Menor</option>
                                            <?php
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