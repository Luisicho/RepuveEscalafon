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
    $nombre = '';
    $telefono = '';
    $curp = '';
    $ine = '';
    $imss = '';
    $calle = '';
    $noext = '';
    $colonia = '';
    $cp = '';
    $localidad = '';
    $municipio = '';
    $nolicencia = '';
    $tipo = '';
    
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
                    <button class="btn" style="background-color:#9dbf2d;color:white;" onclick="return  confirm('¿Actualizar registro?')" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>