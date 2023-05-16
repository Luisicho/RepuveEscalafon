<?php 

    include ("db.php");

    if(isset($_GET['noesc'])){
        $noesc = $_GET['noesc'];
        $query = "DELETE FROM ESCALAFON WHERE NOESC = '$noesc'";
        $result = mysqli_query($conex,$query);
        if(!$result){
            die("error al borrar");
        }



        $_SESSION['message'] = "Eliminado Correctamente";
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }

?>