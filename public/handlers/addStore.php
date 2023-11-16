<?php
include('../clases/tienda.php');
include('../conexion/conexion.php');

if( isset($_POST['submitStore'])){
    if( !empty($_POST['idStore']) && !empty($_POST['nameStore'])  && !empty($_POST['adressStore'])){
        $store =new Tienda($_POST['idStore'],$_POST['nameStore'],$_POST['adressStore']);
        $store->setStore($conex);
    }
    else{
        echo"<script>
        let idStore= document.getElementById('idStore');
        idStore.value=`{$_POST['idStore']}`
        let nameStore= document.getElementById('nameStore');
        nameStore.value=`{$_POST['nameStore']}`
        let adressStore= document.getElementById('adressStore');
        adressStore.value=`{$_POST['adressStore']}`
        Swal.fire({
            icon: 'error',
            title: 'Completa todos los campos',
            
          });
        </script>";
    
    }

}
?>