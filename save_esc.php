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

        //Consulta
        $consulta = "INSERT INTO escalafon(NOESC, REGISTRO, APATERNO, AMATERNO, NOMBRE, TELEFONO, CURP, INE, IMSS, CALLE, NOEXT, COLONIA, CP, LOCALIDAD, MUNICIPIO, NOLICENCIA, TIPO,COMANTIGUEDAD, TIEMPOANTIGUEDAD, FECHAANTIGUEDAD) VALUES ('$noesc','$registro','$apaterno','$amaterno','$nombre','$telefono','$curp','$ine','$imss','$calle','$noext','$colonia','$cp','$localidad','$municipio','$nolicencia','$tipo','',0,'')";
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
