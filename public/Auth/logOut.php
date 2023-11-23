<?php
//verifica el click en cerrar sesion y sisi destruye sesion y manda al inicio
if(isset($_POST['closeSession'])){
    session_start();
    session_regenerate_id(true);
    session_destroy();
    //vaciar arreglo sesion
    $_SESSION = array();
    header("Location: index.php");
}

?>