<?php

include("db.php");

if (isset($_GET['noesc'])) {
    $noesc = $_GET['noesc'];

    $query = "SELECT * FROM ESCALAFON WHERE NOESC = $noesc";
    $result = mysqli_query($conex, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $noescN = $row[1];
        $registro = $row[2];
    }
}

if (isset($_POST['update'])){
    //toma datos de name textos
    $noescAc = $_GET['noesc'];
    $registro = $_POST['registro'];
    //consulta actualizar
    $query = "UPDATE ESCALAFON SET REGISTRO = '$registro' WHERE NOESC = '$noesc'";
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
                <form action="edit_esc.php?noesc=<?php echo $_GET['noesc'];?>" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <label class="label">No. Escalafon</label>
                        <input readonly type="text" name='noesc' value="<?php echo $noescN; ?>" class="form-control" placeholder="Nuevo No. Escalafon">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="label">Registro</label>
                        <input type="text" name="registro" value="<?php echo $registro; ?>" class="form-control" placeholder="Nuevo Registro">
                    </div>
                    <button class="btn btn-success" onclick="return  confirm('Actualizar registro?')" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var mensaje = toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": 0,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    }
    
</script>

<?php include("includes/footer.php") ?>