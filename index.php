<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-1">

    <div class="row">
        <div class="col-md-12 m-2">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>
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
                    <div class="form-group date mb-2 ">
                        <label class="label">Fecha <i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <input type="text" class="form-control fj-date">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                </form>
            </div>
        </div>
    </div>

</div>

<!-- index JS -->
<script src="./js/index.js"></script>

<?php include("includes/footer.php") ?>