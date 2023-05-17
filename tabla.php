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

    <table class="table table-bordered" id="tablaEscalafon">
        <thead>
            <tr>
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
                    <td>
                        <a href="edit_esc.php?noesc=<?php echo $row[1] ?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_esc.php?noesc=<?php echo $row[1] ?>" class="btn btn-danger" onclick="return  confirm('¿Eliminar registro?')">
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

    } ?>

</div>

<script>
    $(document).ready(function() {
        $('#tablaEscalafon').DataTable();
    });
</script>

<?php include("includes/footer.php") ?>