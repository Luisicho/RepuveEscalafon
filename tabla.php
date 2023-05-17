<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container">
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
            $result = mysqli_query($conex, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td>
                        <a href="edit_esc.php?noesc=<?php echo $row[1] ?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_esc.php?noesc=<?php echo $row[1] ?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include("includes/footer.php") ?>