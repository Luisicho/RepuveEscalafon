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
    $noescAc = $_GET['noesc'];
    $registro = $_POST['registro'];

    $query = "UPDATE ESCALAFON SET REGISTRO = '$registro' WHERE NOESC = '$noesc'";
    mysqli_query($conex,$query);
    $_SESSION['message'] = 'Actualizado con exito';
    $_SESSION['message_type'] = 'info';
    header("Location: index.php");
}
?>


<?php include("includes/header.php") ?>

<div class="container p-1">
    <div class="row">
        <div class="col-md-4 mx-auto">
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
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>