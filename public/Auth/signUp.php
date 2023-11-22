<?php
include("../conexion/conexion.php");
include("../clases/tienda.php");
include("../clases/administrador.php");


try{
    Tienda::getStoresSelect($conex);
   
   
}
catch(Exception $e){
}

if(isset($_POST['submitSignUp'])){
    if(!empty($_POST['nameSign']) && !empty($_POST['chargeSign']) && !empty($_POST['emailSign'])  && strlen($_POST['passwordSign'])>=8 && !empty($_POST['idStoreSign']) ){
     $admin = new Administrador($_POST['nameSign'], $_POST['chargeSign'], $_POST['emailSign'], md5($_POST['passwordSign']),$_POST['idStoreSign'] );
     $admin->addAdmin($conex);
 
    }
    else{
        echo "<script>
               let nameSign= document.getElementById('nameSign');
               nameSign.value=`{$_POST['nameSign']}`

               let chargeSign= document.getElementById('chargeSign');
               chargeSign.value=`{$_POST['chargeSign']}`

               let emailSign= document.getElementById('emailSign');
               emailSign.value=`{$_POST['emailSign']}`

               let passwordSign= document.getElementById('passwordSign');
               passwordSign.value=`{$_POST['passwordSign']}`
               let idStoreSign= document.getElementById('idStoreSign');
               idStoreSign.value=`{$_POST['idStoreSign']}`

               Swal.fire({
                icon: 'error',
                title: 'Completa todos los campos ',
                text:'la contraseña debe tener ocho caracteres'
              });
              </script>";
    }
}
?>