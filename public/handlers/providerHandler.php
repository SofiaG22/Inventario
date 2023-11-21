<?php
if(isset($_POST['showProveedor'])){
    
}

?><?php
include("clases/proveedor.php");
include("conexion/conexion.php");

if (isset($_POST['submitProveedor'])){
    if(!empty($_POST['nameProvider']) && !empty($_POST['documentProvider'])&& !empty($_POST['numberProvider']) && !empty($_POST['emailProveedor']) ){
        $proveedor=new Proveedor($_POST['documentProvider'],$_POST['nameProvider'],$_POST['numberProvider'],$_POST['emailProveedor']);
        $proveedor->setProvider($conex);
    }
}

?>