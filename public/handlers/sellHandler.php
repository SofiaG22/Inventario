<?php
include("clases/venta.php");
include('conexion/conexion.php');
if (isset($_POST['submitSell'])){
    if(!empty($_POST['numberProduct']) && !empty($_POST['quantitySell'])&& !empty($_POST['idClient'])){
        $query = ("SELECT * FROM administrador WHERE `id_administrador` ={$_SESSION['idAdmin']}");
        $result = mysqli_query($conex,$query);
        while($row= $result->fetch_array()){
            $name_admin=$row['nombre_admin'];
        }
        Venta::setSell($conex,$_SESSION['store'],$_POST['numberProduct'],$_POST['quantitySell'],$_POST['idClient'],$name_admin);
    }
}

?>