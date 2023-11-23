<?php
//valida si ya inicio sesion
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}
?>