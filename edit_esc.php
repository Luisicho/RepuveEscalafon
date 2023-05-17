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
        $registro = $row[2];
    }
}

if (isset($_POST['update'])){
    $IDEac = $_GET['IDE'];
    //toma datos de name textos
    $noescAc = $_POST['noesc'];
    $registro = $_POST['registro'];
    //consulta actualizar
    $query = "UPDATE ESCALAFON SET NOESC = '$noescAc', REGISTRO = '$registro' WHERE IDE = '$IDEac'";
    //ejecuta query
    mysqli_query($conex,$query);
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
                <form action="edit_esc.php?IDE=<?php echo $_GET['IDE'];?>" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <label class="label">No. Escalafon</label>
                        <input type="text" name='noesc' value="<?php echo $noescN; ?>" class="form-control" placeholder="Nuevo No. Escalafon">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="label">Registro</label>
                        <input type="text" name="registro" value="<?php echo $registro; ?>" class="form-control" placeholder="Nuevo Registro">
                    </div>
                    <div class="form-group date mb-2 ">
                        <label class="label">Fecha <i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <input type="text" value="<?php echo $fecha; ?>" class="form-control fj-date">
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