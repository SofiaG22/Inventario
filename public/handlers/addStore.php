<?php
include('../clases/tienda.php');
include('../conexion/conexion.php');


if( isset($_POST['submitStore'])){
    if( !empty($_POST['nameStore'])  && !empty($_POST['adressStore'])){
        $store =new Tienda($_POST['nameStore'],$_POST['adressStore']);
        $store->setStore($conex);
    }
    else{
        //si los campos estan vacios los rellena con lo que ya tenia
        echo"<script>
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