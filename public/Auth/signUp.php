<?php
include("../conexion/conexion.php");

try{
    $query=("SELECT * FROM tienda");
    $result =mysqli_query($conex,$query);
    // $options=array();
    echo "<script>
    let select =document.getElementById('idStoreSign');
    let option;
   
   </script>";
    if (mysqli_num_rows($result)>0){
        while($row =$result->fetch_array()){
            echo "<script>
            option= document.createElement('option');
             option.value ={$row['id_tienda']};
<<<<<<< HEAD
             option.text = '{$row['nombre']}';
=======
            option.text = {$row['nombre']};
>>>>>>> ef482fa4371fdac7bf917ced542b164aeac72176
             select.add(option);
            </script>";
        }
    }else{
        echo "<script>
            option= document.createElement('option');
             option.value ='no existen tiendas';
            option.text = 'no existen tiendas';
             select.add(option);
            </script>";
    }
    // foreach($options as $x){
    //     echo $x;
    // }
}
catch(Exception $e){
}

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
                  footer:'<a href=../index.php>Ir a inicio</a>'
                });
                   </script>";

        }
        else{
            try{

                $query=("INSERT INTO `administrador`( `nombre_admin`, `cargo`, `usuario`, `contraseña`, `id_tienda`) VALUES ('$name','$charge','$email','$password',$idStore)");   
                $result= mysqli_query($conex,$query);
                if($result){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario registrado con exito',
                        footer:'<a href=../index.php>Ir a inicio</a>'
                      });
                         </script>";    
                  }
            }
            catch(Exception $e){
                
                    echo "<script>
                    let nameSign= document.getElementById('nameSign');
                    nameSign.value=`{$_POST['nameSign']}`
     
                    let chargeSign= document.getElementById('chargeSign');
                    chargeSign.value=`{$_POST['chargeSign']}`
     
                    let emailSign= document.getElementById('emailSign');
                    emailSign.value=`{$_POST['emailSign']}`
     
                    let passwordSign= document.getElementById('passwordSign');
                    passwordSign.value=`{$_POST['passwordSign']}`
    
                        Swal.fire({
                    icon: 'error',
                    title: 'A ocurrido un error',
                    text: 'no se encontro el id de tienda o hay un error en la conexion',
                    footer:'no tienes una tienda? <a href=tiendaForm.php>Creala</a>'
                });
                   </script>";
            }
            
        }
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
                title: 'Completa los campos'
              });
              </script>";
    }
}
?>