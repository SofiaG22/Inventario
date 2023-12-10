<?php
    //incluye archivos
    include("conexion/conexion.php");
    include("clases/administrador.php");

        if(isset($_POST["submitLogin"])){
            $email= trim($_POST["emailLogin"]);
            $password=$_POST["passwordLogin"];
            if(strlen($email)>=6 && strlen($password)>=8){
                Administrador::logIn($conex,$email,$password);
             
            }else
            {
               echo "<script>
               let email= document.getElementById('emailLogin');
               email.value=`{$_POST['emailLogin']}`
               Swal.fire({
                icon: 'error',
                title: 'Completa los campos',
                text: 'La contraseña debe tener 8 caracteres',
              });
              </script>";
              
            }   
        }   
?>