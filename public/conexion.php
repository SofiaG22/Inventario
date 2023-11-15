<?php
$conexion = mysqli_connect("localhost", "root", "", "inventariotienda");

if ($conexion){
    echo"trabajando";
}else{
    echo"cualquier cosa";
}


?>