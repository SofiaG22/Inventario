<?php
if(isset($_POST['showProveedor'])){
    
}

?><?php
include("clases/proveedor.php");
include("clases/compra.php");
include("conexion/conexion.php");

if (isset($_POST['submitProveedor'])){
    if(!empty($_POST['nameProvider']) && !empty($_POST['documentProvider'])&& !empty($_POST['numberProvider']) && !empty($_POST['emailProveedor']) ){
        $proveedor=new Proveedor($_POST['documentProvider'],$_POST['nameProvider'],$_POST['numberProvider'],$_POST['emailProveedor']);
        $proveedor->setProvider($conex);
    }
}

if(isset($_POST['showProviders'])){
    Proveedor::getProviders($conex);
}
if(isset($_POST['showBoughts'])){
    Compra::getBoughts($conex,$_SESSION['store']);
}

if(isset($_POST["showMoreBought"])){

    compra::setShowMoreBought();
    compra::getBoughts($conex, $_SESSION['store']);

}
if(isset($_POST["showLessBought"])){

    compra::setShowLessBought();
    compra::getBoughts($conex, $_SESSION['store']);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['showProviders']) && !isset($_POST['submitProveedor'])) {
    foreach ($_POST as $valor => $campo) {
        $id=$valor;
    }
    if($campo =="Editar"){
        Proveedor::setProviderInfo($conex,$id);
    }
    elseif($campo =="Actualizar"){
        Proveedor::updateProvider($conex,$id,$_POST['editIdProvider'],$_POST['editNameProvider'],$_POST['editNumberProvider'],$_POST['editEmailProvider'],true);
    }
    elseif($campo =="Eliminar"){
        Proveedor::deleteProvider($conex,$id);
    }
    
  
}
?>