<?php
include("clases/administrador.php");
include("conexion/conexion.php");

Administrador::getAdminInfo($conex, $_SESSION['idAdmin']);

?>