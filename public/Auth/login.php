<?php
        include("conexion/conexion.php");
       
        if(isset($_POST["submitLogin"])){
            $email= trim($_POST["emailLogin"]);
            $password= md5($_POST["passwordLogin"]);

            if(strlen($email)>=5 && strlen($password)>=5){
                $query=("SELECT * FROM administrador WHERE usuario ='$email' and contraseña='$password'");
                $result =mysqli_query($conex,$query);
                if (mysqli_num_rows($result)>0){
                    while($row =$result->fetch_array()){
                        session_start();
                        $_SESSION['user']=$row['nombre_admin'];
                        $_SESSION['store']=$row['id_tienda'];
                        header("Location: index.php");
                    }
                }
                else{
                    echo "<script>
                    Swal.fire({
                  icon: 'error',
                  title: 'Usuario o contraseña equivocada',
                  text: 'prueba de nuevo',
                  footer:'No tienes cuenta ?<a href=template/formSignUp.php>Registrate</a>'
                });
                   </script>";
                }
            }else
            {
               
            }   
        }   
?>