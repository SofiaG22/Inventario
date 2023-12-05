<?php
if(isset($_POST['search']) && !empty($_POST['search'])){
    include("../conexion/conexion.php");
    include("../validateSession/validateTemplate.php");
    $query=("SELECT * FROM `producto` WHERE (`id_tienda`) ={$_SESSION['store']} AND (`nombre_producto`) LIKE '%{$_POST['search']}%'");
    $result= mysqli_query($conex,$query);
    $rows = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
    }

echo json_encode($rows);

}
?>