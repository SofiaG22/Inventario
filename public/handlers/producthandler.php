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
        $id=$valor;
    }
    if($campo =="Editar"){
        Producto::setProductInfo($conex,$_SESSION['store'],$id);
    }
    elseif($campo =="Actualizar"){
        Producto::updateProduct($conex,$id,$_POST['editNumberProduct'],$_POST['editNameProduct'],$_POST['editpriceProduct'],$_POST['editQuantityProduct'],$_SESSION['store'],true);
    }
    elseif($campo =="Eliminar"){
        Producto::deleteProduct($conex, $id);
    }
    
  
}

?>