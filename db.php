<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conex = mysqli_connect("localhost","root","","repuve");
?>