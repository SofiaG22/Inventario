<?php
 
require_once "producto.php";

$pro_nombre = $_POST["nombre_producto"];
$pro_venta = $_POST["valor_venta"];
$pro_cantidadExst = $_POST["producto_cantidad"];

$producto = new Producto($pro_nombre, $pro_venta, $pro_cantidadExst);

$producto->guardar();

ECHO "Guardado poderoso";

?>