<?php
echo"Hola";
    /*function validarDatos($correo, $contrasena){
        if(strlen($correo) >=5 && strlen($contrasena) >=5){           
        }
    }

    function validarBaseDatos($conexion){
        if($conexion){
            return true;
        }            
    }*/

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo"Holaaaaaaaa";
        if(isset($_POST["submitLogin"])){
            echo"Oprimido";
        }else{
            echo"Oprimidoooo";
        }  

    }
    echo"Holaaa";
?>