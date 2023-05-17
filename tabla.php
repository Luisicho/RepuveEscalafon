<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php session_unset();
    } 
    
    //Consulta
    $query = "SELECT * FROM ESCALAFON";
    $result = mysqli_query($conex, $query);
    if ($result){
    ?>

    <table class="table table-striped table-bordered table-hover table-responsive" id="tablaEscalafon">
        <thead>
            <tr style="color:white; background-color: #9dbf2d;">
                <th>No Escalafon</th>
                <th>Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td style="text-align:center">
                        <a href="edit_esc.php?IDE=<?php echo $row[0] ?>" class="btn" style="background-color:#68b8cd;color:white;">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_esc.php?IDE=<?php echo $row[0] ?>" class="btn" style="background-color:#cb0160;color:white;" onclick="return  confirm('¿Eliminar registro?')">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php }else{
        ?>
        <div>
            <label class="label">No se cuenta con informacion</label>
        </div>
    <?php } ?>

</div>

<script>
    $(document).ready(function() {
        $('#tablaEscalafon').DataTable();
    });
</script>

<?php include("includes/footer.php") ?>