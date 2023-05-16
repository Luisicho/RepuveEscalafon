<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-8">
            <div class="card card-body">
                <form action="save_esc.php" method="POST">
                    <div class="form-group mt-2 mb-2">
                        <label class="label">No. Escalafon</label>
                        <input type="text" name="noesc" class="form-control" placeholder="No. Escalafon" autofocus>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="label">No. Escalafon</label>
                        <input type="text" name="noesc" class="form-control" placeholder="No. Escalafon" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name = "save" value = "Guardar">
                </form>
            </div>
        </div>
        <div class="col-md-8">

        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>