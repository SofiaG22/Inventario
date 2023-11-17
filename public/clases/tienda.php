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
}