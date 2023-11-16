<?php
session_start();
if (!isset($_SESSION['user'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: ../index.php");
    exit();
}
?>