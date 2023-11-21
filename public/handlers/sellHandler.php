<?php
include("clases/venta.php");
include('conexion/conexion.php');
if (isset($_POST['submitSell'])){
    if(!empty($_POST['numberProduct']) && !empty($_POST['quantitySell'])&& !empty($_POST['idClient'])){
        Venta::setSell($conex,$_SESSION['store'],$_POST['numberProduct'],$_POST['quantitySell'],$_POST['idClient']);
    }
}
?>