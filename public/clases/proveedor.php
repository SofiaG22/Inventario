<?php
class Proveedor{
    private $name_provider ;
    private $documento_proveedor ;
    private $telefono ;
    private $correo ;

    public function __construct($documento_proveedor,$name_provider, $telefono, $correo) {
        $this->name_provider = $name_provider;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->documento_proveedor = $documento_proveedor;
    }
    public function setProvider($conex){
        try {
            $proveedor = Proveedor::getProvider($conex,$this->documento_proveedor );
            if($proveedor){
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Ya tienes registrado un proveedor con este documento'
                  });
                     </script>";   
            }
            else{

                $query=("INSERT INTO `proveedor`( `nombre_proveedor`, `telefono`, `correo`,`id_tienda`,`documento_proveedor`) VALUES ('{$this->name_provider}',{$this->telefono},'{$this->correo}', {$_SESSION['store']},{$this->documento_proveedor})");
                $result =mysqli_query($conex,$query);
                if ($result && mysqli_affected_rows($conex)>0){
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
                            title: 'Erroooor en esta consulta'
                          });
                             </script>";   
                }
            }
       
        } catch (\Throwable $th) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: ' '
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
                 option.value ={$row['documento_proveedor']};
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
        
        $query=("SELECT * FROM `proveedor` where id_tienda={$_SESSION['store']} and documento_proveedor=$id_provider");
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
                $table.="<th>{$row['documento_proveedor']}</th>";
                $table.="<th>{$row['nombre_proveedor']}</th>";
                $table.="<th>{$row['telefono']}</th>";
                $table.="<th>{$row['correo']}</th>";
                $table.="<th> <form method='post'> <button type='submit' value='Editar' name='{$row['documento_proveedor']}'><i class='editButton fa-solid fa-pen-to-square'></i></buttom></form></th>";
                $table.="<th> <form method='post'> <button type='submit' value='Eliminar' name='{$row['documento_proveedor']}'><i class='deleteButton fa-solid fa-rectangle-xmark'></i></button> </form></th>";
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
                <input type= 'number' name='editIdProvider' value={$row['documento_proveedor']}>
                <label for= ''>telefono</label>
                <input type= 'number' name='editNumberProvider' value={$row['telefono']}>
                <label for= ''>email</label>
                <input type= 'email' name= 'editEmailProvider' value={$row['correo']} >
                <button type='submit' value='Actualizar' name='{$row['documento_proveedor']}'>Actualizar</button>
                <button type='submit' value='CancelarActualizar' name= '{$row['documento_proveedor']}'>Cancel</button>
                
                </form>
                </div>`
              })
                 </script>";   
                
                    }
    
    
    }
    public static function updateProvider($conex,$oldIdProvider,$newIdProvider,$nombre_proveedor,$telefono,$email,$showMessagge){
        try{
            $query = "UPDATE `proveedor` SET `documento_proveedor`={$newIdProvider}, `nombre_proveedor`='{$nombre_proveedor}', `telefono`={$telefono}, `correo`='{$email}' WHERE `documento_proveedor`={$oldIdProvider} AND `id_tienda` ={$_SESSION['store']}";

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
        $query = "DELETE FROM `proveedor` WHERE `documento_proveedor`={$id} AND `id_tienda`= {$_SESSION['store']}";

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