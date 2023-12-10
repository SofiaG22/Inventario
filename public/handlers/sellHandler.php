<?php
include("clases/venta.php");
include('conexion/conexion.php');

if (isset($_POST['submitSell'])){
    foreach ($_POST as $valor => $campo) {
        break;
    }

    if(  !empty($_POST['quantitySell'])&& !empty($_POST['idClient'])){
        //trae el admini para mostrar en la factura 
        $query = ("SELECT * FROM administrador WHERE `id_administrador` ={$_SESSION['idAdmin']}");
        $result = mysqli_query($conex,$query);
        while($row= $result->fetch_array()){
            $name_admin=$row['nombre_admin'];
        }
        Venta::setSell($conex,$_SESSION['store'], $valor ,$_POST['quantitySell'],$_POST['idClient'],$name_admin, $_POST['emailCustomer']);
    }
}

?>