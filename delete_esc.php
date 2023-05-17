<?php 

    include ("db.php");

    if(isset($_GET['IDE'])){
        $IDE = $_GET['IDE'];
        $query = "DELETE FROM ESCALAFON WHERE IDE = '$IDE'";
        $result = mysqli_query($conex,$query);
        if(!$result){
            die("error al borrar");
        }

        $_SESSION['message'] = "Eliminado Correctamente";
        $_SESSION['message_type'] = 'danger';
        header("Location: tabla.php");
    }

?>