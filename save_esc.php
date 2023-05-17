<?php

include("db.php");



if (isset($_POST['save'])) {
    if (strlen($_POST['noesc']) >= 1) {
        $noesc = $_POST['noesc'];
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

        //Consulta
        $consulta = "INSERT INTO escalafon(NOESC, REGISTRO, APATERNO, AMATERNO, NOMBRE, TELEFONO, CURP, INE, IMSS, CALLE, NOEXT, CP, LOCALIDAD, MUNICIPIO, NOLICENCIA, TIPO,COMANTIGUEDAD, TIEMPOANTIGUEDAD, FECHAANTIGUEDAD) VALUES ('$noesc','$registro','$apaterno','$amaterno','$nombre','$telefono','$curp','$ine','$imss','$calle','$noext','$cp','$localidad','$municipio','$nolicencia','$tipo','',0,'')";
        //Insercion
        $resultado = mysqli_query($conex, $consulta);

        if (!$resultado) {
            die("Error al insertar");
        }
        $_SESSION['message'] = 'Insertado con exito';
        $_SESSION['message_type'] = 'success';
        
    }else{
        $_SESSION['message'] = 'Algun campo vacio';
        $_SESSION['message_type'] = 'warning';
    }
    header("Location: index.php");
}
