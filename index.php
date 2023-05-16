<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-1">

    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_esc.php" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <label class="label">No. Escalafon</label>
                        <input type="text" name="noesc" class="form-control" placeholder="No. Escalafon" autofocus>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="label">Registro</label>
                        <input type="text" name="registro" class="form-control" placeholder="Registro">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No Escalafon</th>
                            <th>Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM ESCALAFON";
                        $result = mysqli_query($conex,$query);
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td>
                                    <a href="edit_esc.php?id=<?php echo $row[1] ?>">Editar</a>
                                    <a href="delete_esc.php?id=<?php echo $row[1] ?>">Eliminar</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>