<?php
include("../conexion/conexion.php");
if(isset($_POST['submitSignUp'])){

    if(!empty($_POST['nameSign']) && !empty($_POST['chargeSign']) && !empty($_POST['emailSign'])  && !empty($_POST['passwordSign']) && !empty($_POST['idStoreSign']) ){
        $name=$_POST['nameSign'];
        $charge=trim($_POST['chargeSign']);
        $email=trim($_POST['emailSign']);
        $password=md5($_POST['passwordSign']);
        $idStore=trim($_POST['idStoreSign']);
        //verificar si el usuario no existe 
        $query_user=("SELECT * FROM administrador WHERE usuario ='$email'");
        $result_user= mysqli_query($conex,$query_user);
        
        if(mysqli_num_rows($result_user)>0){
            echo "<script>
                    Swal.fire({
                  icon: 'error',
                  title: 'Usuario ya registrado',
                  text: 'prueba de nuevo',
                  footer:'<a href=index.php>Ir a inicio</a>'
                });
                   </script>";

        }
        else{
            $query=("INSERT INTO `administrador`( `nombre_admin`, `cargo`, `usuario`, `contraseña`, `id_tienda`) VALUES ('$name','$charge','$email','$password',$idStore)");   
            $result= mysqli_query($conex,$query);
            if($result){
                echo "<script>
                    Swal.fire({
                  icon: 'success',
                  title: 'Usuario registrado con exito',
                  footer:'<a href=index.php>Ir a inicio</a>'
                });
                   </script>";

                
            }
            else{
                echo "A  ocurrdio un error peurba mas tarde";
            }
            
        }
    }
    else{
        echo "completa los campos";
    }
}
?>