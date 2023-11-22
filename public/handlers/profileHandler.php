<?php
include("clases/administrador.php");
include("conexion/conexion.php");

Administrador::getAdminInfo($conex, $_SESSION['idAdmin']);
if(isset($_POST['deleteAccount'])){
    Administrador::setDeleteAlert();

}
else if(isset($_POST['deleteAdmin'])){
        Administrador::deleteAdmin($conex);
}

?>