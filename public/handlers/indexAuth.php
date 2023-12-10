<?php
include("clases/venta.php");
include("conexion/conexion.php");
if(isset($_POST["showSellsToday"])){
    Venta::getSells($conex, $_SESSION['store']);
}

if(isset($_POST["getTotalSell"])){
    Venta::getTotalSell($conex, $_SESSION['store']);


}
if(isset($_POST["showSellsAdmin"])){
    Venta::getTotalSellAdmin($conex, $_SESSION['store']);

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['submitSell']) ) {
    foreach ($_POST as $valor => $campo) {
        $id=$valor;
    }
    if($campo =="Eliminar"){
        Venta::deleteSell($conex,$id);
    }
   
    
  
}


?>