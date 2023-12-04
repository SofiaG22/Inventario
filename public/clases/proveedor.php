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
    //añadir provedor
    public function setProvider($conex){
        try {
            //trae proveedor y si existe le dice que existe con su documento
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
                //inserta provedor si no existe consus datos
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
                            title: 'Error en esta consulta'
                          });
                             </script>";   
                }
            }
       
        } catch (Exception $e) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: ' '
              });
                 </script>";   
        }
    }
    //selecion de proveedores llena campo select con todos los proveedores
    public static function getProvidersSelect($conex){
        
        $query=("SELECT * FROM `proveedor` where id_tienda={$_SESSION['store']}");
        $result =mysqli_query($conex,$query);
        //traigo el select de html y añado cada provedor como opcion
        //si no hya sale no hay proveedores
        echo "<script>
        let select =document.getElementById('providerId');
        let option </script>";
       
        if (mysqli_num_rows($result)>0){
            while($row =$result->fetch_array()){
                echo "
                <script>
                option= document.createElement('option');
                 option.value ={$row['documento_proveedor']};
                 option.text = '{$row['nombre_proveedor']}';
                 select.add(option);
                </script>";
            }
        }else{
            echo "
            <script>
                option= document.createElement('option');
                 option.value ='nP';
                option.text = 'Añade un proveedor';
                 select.add(option);
                </script>";
        }
    }
    //trae proveedor para saber si existe
    public static function getProvider($conex,$id_provider){
        
        $query=("SELECT * FROM `proveedor` where id_tienda={$_SESSION['store']} and documento_proveedor=$id_provider");
        $result =mysqli_query($conex,$query);
       
        if (mysqli_num_rows($result)>0){
            return $result;
        }
    }
    //trae todos lo provedores y los muestra en la tabla
    public static function getProviders($conex){
        $query=("SELECT * FROM `proveedor` where id_tienda ={$_SESSION['store']}");
        $result = mysqli_query($conex,$query);
        if(mysqli_num_rows($result)>0){
            $table="<table id='providerTable'> <thead> <tr class='headerFila'>";
            $table.="<th>Documento</th>";
            $table.="<th>nombre</th>";
            $table.="<th>telefono</th>";
            $table.="<th>correo</th>";
            $table.="<th>Editar</th>";
            $table.="<th>Eliminar</th>";
            $table.="</tr>";
            $table.="</thead>";
            $table.="<tbody>";

            while($row = $result->fetch_array()){
                $table.="<tr class='fila'>";
                $table.="<th>{$row['documento_proveedor']}</th>";
                $table.="<th>{$row['nombre_proveedor']}</th>";
                $table.="<th>{$row['telefono']}</th>";
                $table.="<th>{$row['correo']}</th>";
                $table.="<th> <form method='post'> <button type='submit' value='Editar' name='{$row['documento_proveedor']}'><i class='editButton fa-solid fa-pen-to-square'></i></buttom></form></th>";
                $table.="<th> <form method='post'> <button type='submit' value='Eliminar' name='{$row['documento_proveedor']}'><i class='deleteButton fa-solid fa-rectangle-xmark'></i></button> </form></th>";
                $table.="</tr>";
            }
            $table.="</tbody>";
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
    //al dar clic en edita muestar formulario datos proveedor a editar 
    public static function setProviderInfo($conex,$id_provider){
        //trae provveedor
        $result = Proveedor::getProvider($conex,$id_provider);
        //crea alerta con los datos y da la opcion de actualizar
        while($row =$result->fetch_array()){
            echo "<script>
            Swal.fire({
                title: 'Editar Proveedor:{$row['nombre_proveedor']}',
                showCloseButton: true,
                showConfirmButton: false,
                html:`<div>
                <form method='post'>
                    <div class='mb-3'>
                        <label for= 'editNameProvider' class='form-label'>Nombre</label>
                        <input type= 'text' class='form-control' name='editNameProvider' value={$row['nombre_proveedor']}>
                    </div>
                    <div class='mb-3'>
                        <label for= 'editIdProvider' class='form-label'>Documento</label>
                        <input type= 'number' class='form-control' name='editIdProvider' value={$row['documento_proveedor']}>
                    </div>
                    <div class='mb-3'>
                        <label for='editNumberProvider' class='form-label'>telefono</label>
                        <input type= 'number' class='form-control' name='editNumberProvider' value={$row['telefono']}>
                    </div>
                    <div class='mb-3'>
                        <label for= 'editEmailProvider' class='form-label'>email</label>
                        <input type= 'email' class='form-control' name= 'editEmailProvider' value={$row['correo']} >
                    </div>
                    <button type='submit' class='btn btn-primary' value='Actualizar' name='{$row['documento_proveedor']}'>Actualizar</button>
                    <button type='submit' class='btn btn-secondary' value='CancelarActualizar' name= '{$row['documento_proveedor']}'>Cancel</button>
                
                </form>
                </div>`
            });
            
            </script>";   
                
        }
    
    }
    //actualiza info proceedor
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
//recibe id y elimina proveedor
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