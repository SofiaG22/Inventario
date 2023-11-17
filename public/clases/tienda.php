<?php
class Tienda{
    private $id_tienda;
    private $name_tienda ;
    private $direccion ;

    public function __construct($name_tienda, $direccion) {
        $this->name_tienda = $name_tienda;
        $this->direccion = $direccion;
    }

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

    public static function getSelectStores($conex){
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
                     option.text = '{$row['nombre']}';
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
        catch(Exception $e){
        }
    }
}