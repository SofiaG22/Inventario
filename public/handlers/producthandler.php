<?php
include('conexion/conexion.php');
include('clases/producto.php');
include('clases/proveedor.php');

    //permite seleccionar proveedores existente en el selct
    $result = Proveedor::getProvidersSelect($conex);
    //Controla cuantas filas se muestran en los resultados
if( isset($_POST['submitProduct'])){
    if( !empty($_POST['nameProduct']) && !empty($_POST['priceProduct']) && !empty($_POST['quantityProduct'])&& $_POST['providerId']!='nP' && !empty($_POST['priceBought'])){
        $producto =new Producto($_POST['nameProduct'],'y',$_POST['priceProduct'],$_POST['quantityProduct'],$_SESSION['store']);
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
//verifica wur envia formulirio que no sea mostrar productos y añadir product
//campo toma valor del ultimo boton enviado(click)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['showProducts']) && !isset($_POST['submitProduct'])) {
    foreach ($_POST as $valor => $campo) {
        $id=$valor;

    }
    //el valor del boton es id producto a editar o  eliminar...
    if($campo =="Editar"){
        Producto::setProductInfo($conex,$_SESSION['store'],$id);
    }
    elseif($campo =="Actualizar"){
        Producto::updateProduct($conex,$id,$_POST['editNameProduct'],$_POST['editpriceProduct'],$_POST['editQuantityProduct'],$_SESSION['store'],true);
    }
    elseif($campo =="Eliminar"){
        Producto::deleteProduct($conex, $id);
    }
    //añadir cantidades a producto existente
    elseif($campo =="addQuantity"){

        Producto::updateQuantityproduct($conex, $id, $_POST['quantityEditProduct'],$_POST['priceProvierEditProduct'],$_POST['idProviderEditProduct']);
    }
}

?>