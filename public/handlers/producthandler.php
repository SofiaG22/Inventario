<?php
include('conexion/conexion.php');
include('clases/producto.php');
include('clases/proveedor.php');

    $result = Proveedor::getProvidersSelect($conex);

if( isset($_POST['submitProduct'])){
    if( !empty($_POST['numberProduct']) && !empty($_POST['nameProduct'])  && !empty($_POST['descripcionProduct'])&& !empty($_POST['priceProduct']) && !empty($_POST['quantityProduct'])&& $_POST['providerId']!='nP' && !empty($_POST['priceBought'])){
        $producto =new Producto($_POST['numberProduct'],$_POST['nameProduct'],$_POST['descripcionProduct'],$_POST['priceProduct'],$_POST['quantityProduct'],$_SESSION['store']);
        $producto->setProduct($conex,$_POST['priceBought'],$_POST['providerId']);
    }
    else{
        echo "<script>
        Swal.fire({
            icon: 'error',
                title: 'Completa todos los campos'
          });
             </script>";   
    }

}

if(isset($_POST['showProducts'])){
 Producto::getProducts($conex, $_SESSION['store']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['showProducts']) && !isset($_POST['submitProduct'])) {
    foreach ($_POST as $valor => $campo) {
        $id=$valor;
        // echo$campo .$valor;
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
    elseif($campo =="addQuantity"){

        Producto::updateQuantityproduct($conex, $id, $_POST['quantityEditProduct'],$_POST['priceProvierEditProduct'],$_POST['idProviderEditProduct']);
    }
  
}

?>