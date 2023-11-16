<?php
 
require_once "proveedor.php";

$prov_nombre = $_POST["prov_nombre"];
$prov_telefono = $_POST["prov_telefono"];
$prov_correo = $_POST["prov_correo"];

$proveedor = new Proveedor($prov_nombre, $prov_telefono, $prov_correo);

$proveedor->guardar();

ECHO "Guardado poderoso";

?>