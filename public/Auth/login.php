<?php
        include("conexion/conexion.php");
       
        if(isset($_POST["submitLogin"])){
            $email= trim($_POST["emailLogin"]);
            $password=$_POST["passwordLogin"];
            
            if(strlen($email)>=6 && strlen($password)>=8){
                $password= md5($_POST["passwordLogin"]);
                $query=("SELECT * FROM administrador WHERE usuario ='$email' and contraseña='$password'");
                $result =mysqli_query($conex,$query);
                if (mysqli_num_rows($result)>0){
                    while($row =$result->fetch_array()){
                        session_start();
                        $_SESSION['user']=$row['nombre_admin'];
                        $_SESSION['store']=$row['id_tienda'];
                        $_SESSION['filaSell']=10;
                        header("Location: index.php");
                    }
                }
                else{
                    echo "<script>
                   //mantener email; 
                let email= document.getElementById('emailLogin');
                email.value=`{$_POST['emailLogin']}`

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