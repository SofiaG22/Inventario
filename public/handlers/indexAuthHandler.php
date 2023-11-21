<?php
include("clases/venta.php");
include("conexion/conexion.php");
if(isset($_POST["showSellsToday"])){
    Venta::getSells($conex, $_SESSION['store']);
}
if(isset($_POST["showMore"])){
    Venta::setShowMore();
    Venta::getSells($conex, $_SESSION['store']);

}
if(isset($_POST["showLess"])){
    Venta::setShowLess();
    Venta::getSells($conex, $_SESSION['store']);

}
if(isset($_POST["getTotalSell"])){
    Venta::getTotalSell($conex, $_SESSION['store']);

}



?>