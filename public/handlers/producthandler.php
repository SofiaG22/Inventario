<?php
include('clases/producto.php');
include('conexion/conexion.php');

if( isset($_POST['submitProduct'])){
    if( !empty($_POST['numberProduct']) && !empty($_POST['nameProduct'])  && !empty($_POST['descripcionProduct'])&& !empty($_POST['priceProduct']) && !empty($_POST['quantityProduct']) ){
        $producto =new Producto($_POST['numberProduct'],$_POST['nameProduct'],$_POST['descripcionProduct'],$_POST['priceProduct'],$_POST['quantityProduct'],$_SESSION['store']);
        $producto->setProduct($conex);
    }

}
?>