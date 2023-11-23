<?php
class Tienda{
    private $id_tienda;
    private $name_tienda ;
    private $direccion ;

    public function __construct($name_tienda, $direccion) {
        $this->name_tienda = $name_tienda;
        $this->direccion = $direccion;
    }
    //boton desplegable tiendad 
    public static function getStoresSelect($conex){
        $query=("SELECT * FROM tienda");
        $result =mysqli_query($conex,$query);
        // $options=array();
        echo "<script>
        let select =document.getElementById('idStoreSign');
        let option;
       
       </script>";
        if (mysqli_num_rows($result)>0){
            //crea opcion por cada tienda y si tiene el mismo nombre muestar direccion
            while($row =$result->fetch_array()){
                echo "<script>
                option= document.createElement('option');
                 option.value ={$row['id_tienda']};
                 option.text = '{$row['nombre']}({$row['direccion']})';
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
    }
    // anadir tienda
    public function setStore($conex){
        try{
            $query=("INSERT INTO `tienda`( `nombre`, `direccion`) VALUES ('{$this->name_tienda}','{$this->direccion}')");

            $result =mysqli_query($conex,$query);
            if ($result){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Tienda {$this->name_tienda} registrada con exito',
                        text:'Redirigiendo a crear administrador ..',
                        footer:'<a href=formSignUp.php>Añadir admin a tienda</a>'
                      });
                      setTimeout(function(){
                        window.location.href = '../template/formSignUp.php'; 
                    }, 3500); 
                         </script>";   
                         //redirige a pagina administrador despues de 3.5 segundos
            
            }
        }
        catch(Exception $e){
            // echo$e->getMessage();
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error al crear tienda, prueba de nuevo',
                text:'Puede que ya haya una tienda con el mismo Id',
                footer:'<a href=formSignUp.php>Añadir admin a tienda</a>'
              });
                 </script>";    
        }
    }

}
