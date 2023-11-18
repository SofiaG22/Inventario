<?php
include('conexion/conexion.php');
include('clases/producto.php');
if( isset($_POST['submitProduct'])){
    if( !empty($_POST['numberProduct']) && !empty($_POST['nameProduct'])  && !empty($_POST['descripcionProduct'])&& !empty($_POST['priceProduct']) && !empty($_POST['quantityProduct']) ){
        $producto =new Producto($_POST['numberProduct'],$_POST['nameProduct'],$_POST['descripcionProduct'],$_POST['priceProduct'],$_POST['quantityProduct'],$_SESSION['store']);
        $producto->setProduct($conex);
    }

}

if(isset($_POST['showProducts'])){
 Producto::getProducts($conex, $_SESSION['store']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['showProducts']) && !isset($_POST['submitProduct'])) {
    foreach ($_POST as $valor => $campo) {
        // Recorre todos los elementos en el array $_POST
        $id=$valor;
    }
    if($campo =="editar"){
        Producto::updateProduct($conex,$_SESSION['store'],$id);
    }
    elseif($campo =="Actualizar"){
        echo "Actualizando";
    }
}

?>