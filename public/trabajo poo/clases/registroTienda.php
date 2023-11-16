<?php
 
require_once "tienda.php";

$tie_nombre = $_POST["tie_nombre"];
$tie_direccion = $_POST["tie_direccion"];

$tienda = new Tienda($tie_nombre, $tie_direccion);

$tienda->guardar();

ECHO "Guardado poderoso";

?>