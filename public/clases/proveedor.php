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
            $query=("INSERT INTO `proveedor`(`id_proveedor`, `nombre_proveedor`, `telefono`, `correo`,`id_tienda`) VALUES ({$this->id_provider},'{$this->name_provider}',{$this->telefono},'{$this->correo}', {$_SESSION['store']})");
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
    public static function getProvidersSelect($conex){
        
        $query=("SELECT * FROM `proveedor` where id_tienda={$_SESSION['store']}");
        $result =mysqli_query($conex,$query);
        echo "<script>
        let select =document.getElementById('providerId');
        let option";
       
        if (mysqli_num_rows($result)>0){
            while($row =$result->fetch_array()){
                echo "
                option= document.createElement('option');
                 option.value ={$row['id_proveedor']};
                 option.text = '{$row['nombre_proveedor']}';
                 select.add(option);
                </script>";
            }
            return $result;
        }else{
            echo "
                option= document.createElement('option');
                 option.value ='nP';
                option.text = 'Añade un proveedor';
                 select.add(option);
                </script>";
        }
    }
    public static function getProvider($conex,$id_provider){
        
        $query=("SELECT * FROM `proveedor` where id_tienda={$_SESSION['store']} and id_proveedor=$id_provider");
        $result =mysqli_query($conex,$query);
       
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    public static function getProviders($conex){
        $query=("SELECT * FROM `proveedor` where id_tienda ={$_SESSION['store']}");
        $result = mysqli_query($conex,$query);
        if(mysqli_num_rows($result)>0){
            $table="<table> <tr>";
            $table.="<th>Documento</th>";
            $table.="<th>nombre</th>";
            $table.="<th>telefono</th>";
            $table.="<th>correo</th>";
            $table.="</tr>";

            while($row = $result->fetch_array()){
                $table.="<tr>";
                $table.="<th>{$row['id_proveedor']}</th>";
                $table.="<th>{$row['nombre_proveedor']}</th>";
                $table.="<th>{$row['telefono']}</th>";
                $table.="<th>{$row['correo']}</th>";
                $table.="<th> <form method='post'> <button type='submit' value='Editar' name='{$row['id_proveedor']}'>iconEdit </buttom></form></th>";
                $table.="<th> <form method='post'> <button type='submit' value='Eliminar' name='{$row['id_proveedor']}'>iconDelete</button> </form></th>";
                $table.="</tr>";
            }
            $table.="</table>";
            echo $table;

        }
        else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Aun no tienes proveedores registrados '
              });
                 </script>";   
        }
    }
    public static function setProviderInfo($conex,$id_provider){
        $result = Proveedor::getProvider($conex,$id_provider);
        while($row =$result->fetch_array()){
            echo "<script>
            Swal.fire({
                title: 'Editar Proveedor:{$row['nombre_proveedor']}',
                showCloseButton: true,
                showConfirmButton: false,
                html:`<div>
                <form method='post'>
                <label for= '' >Nombre</label>
                <input type= 'text' name='editNameProvider' value={$row['nombre_proveedor']}>
                <label for= ''>Documento</label>
                <input type= 'number' name='editIdProvider' value={$row['id_proveedor']}>
                <label for= ''>telefono</label>
                <input type= 'number' name='editNumberProvider' value={$row['telefono']}>
                <label for= ''>email</label>
                <input type= 'email' name= 'editEmailProvider' value={$row['correo']} >
                <button type='submit' value='Actualizar' name='{$row['id_proveedor']}'>Actualizar</button>
                <button type='submit' value='CancelarActualizar' name= '{$row['id_proveedor']}'>Cancel</button>
                
                </form>
                </div>`
              })
                 </script>";   
                
                    }
    
    
    }
    public static function updateProvider($conex,$oldIdProvider,$newIdProvider,$nombre_proveedor,$telefono,$email,$showMessagge){
        try{
            $query = "UPDATE `proveedor` SET `id_proveedor`={$newIdProvider}, `nombre_proveedor`='{$nombre_proveedor}', `telefono`={$telefono}, `correo`='{$email}' WHERE `id_proveedor`={$oldIdProvider}";

            $result =mysqli_query($conex,$query);
            if ($result && $showMessagge){
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Proveedor Actualizado con exito'
              });
                 </script>";   
            }
        }
        catch(Exception $e){
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar',
                text:'Verifica el nuevo id '
              });
                 </script>";   
        }
    

}
public static function deleteProvider($conex,$id){
    try{
        $query = "DELETE FROM `proveedor` WHERE `id_proveedor`={$id}";

        $result =mysqli_query($conex,$query);
        if ($result){
            echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Proveedor eliminado con exito'
          });
             </script>";   
        }
    }
    catch(Exception $e){
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error al eliminar',
            text:'Prueba de nuevo '
          });
             </script>";   
    }


}

}

?>