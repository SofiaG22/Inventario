<?php
class Proveedor{
    private $name_provider ;
    private $id_provider ;
    private $telefono ;
    private $correo ;

    public function __construct($id_provider,$name_provider, $telefono, $correo) {
        $this->name_provider = $name_provider;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->id_provider = $id_provider;
    }
    public function setProvider($conex){
        try {
            $query=("INSERT INTO `proveedor`(`id_proveedor`, `nombre_proveedor`, `telefono`, `correo`) VALUES ({$this->id_provider},'{$this->name_provider}',{$this->telefono},'{$this->correo}')");
            $result =mysqli_query($conex,$query);
            if ($result){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                            title: 'Proveedor {$this->name_provider} creado con  exito'
                      });
                         </script>";   
            }
            else{
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Este proveedor ya esta registrado '
                      });
                         </script>";   
            }
        } catch (\Throwable $th) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Este proveedor ya esta registrado '
              });
                 </script>";   
        }
    }
    public static function getProvider($conex){
        $query=("SELECT * FROM `proveedor`");
        $result =mysqli_query($conex,$query);
        if(mysqli_num_rows($result)>0){
            return $result;
        }
        else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'No hay proveedores añadidos',
                text
              });
                 </script>";   
        }
    }

}

?>