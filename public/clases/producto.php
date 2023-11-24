<?php

class Producto{
    private $id_product;
    private $name_product ;
    private $descriptionProduct ;
    private $priceProduct;
    private $quantityProduct;


    public function __construct($id_product, $name_product,$description_product,$price_product,$quantity_product,$id_store) {
        $this->id_product = $id_product;
        $this->name_product = $name_product;
        $this->description_product = $description_product;
        $this->price_product = $price_product;
        $this->quantity_product = $quantity_product;
        $this->id_store = $id_store;
    }
    //crea productos
    public function setProduct($conex,$precio_provider,$id_provider) {
        try{
            //inserta producto
            $query=("INSERT INTO `producto`(`id_producto`, `nombre_producto`, `precio_venta`, `prcant_existente`, `id_tienda`) VALUES ({$this->id_product},'{$this->name_product}',{$this->price_product},{$this->quantity_product},{$this->id_store} )");
            $result =mysqli_query($conex,$query);
            //inserta a compras
            $queryBought=("INSERT INTO `compra`( `cant_compra`, `precio_proveedor`, `id_producto`, `id_proveedor`,`id_tienda`) VALUES ({$this->quantity_product },$precio_provider,{$this->id_product},$id_provider,{$_SESSION['store']})");
            $resultBought=mysqli_query($conex,$queryBought);
            //si se inserta da alerta de creado cin exito
            if ($result && mysqli_affected_rows($conex)>0){
                echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Producto {$this->name_product} creado con  exito'
                          });
                                 </script>";   
            }

        }
        // si no se inserta da erro
        catch(Exception $e){
            $queryProduct=("SELECT * FROM `producto` WHERE id_producto={$this->id_product} and id_tienda={$this->id_store} ");
            //verifica si el producto ya esta en la tienda y da la opcion de añadir mas unidades
            $result =mysqli_query($conex,$queryProduct);
            if(mysqli_num_rows($result)>0){
                echo "<script>
                Swal.fire({
                icon: 'warning',
                title: 'Ya tienes un producto con codigo {$this->id_product}',
                showCloseButton: true,
                showConfirmButton: false,
                html:`<p>Quieres descartar la consulta o añadir las unidades el producto que ya existe</p>
                <form method='post'>
                <input type='number' class='d-none'value='{$this->quantity_product}' name='quantityEditProduct'>
                <input type='number'class='d-none' value='{$id_provider}' name='idProviderEditProduct'>
                <input type='number' class='d-none' value='{$precio_provider}' name='priceProvierEditProduct'>
                <button type='submit' class='btn btn-secondary' name='cancel'>Descartar</button>
                <button type='submit' class='btn btn-primary' value='addQuantity' name='{$this->id_product}'>Agregar</button>
                </form>`
            });
            </script>";  
            //ya esta en uso el codigo
            }else{
                echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'El Codigo {$this->id_product} no esta disponible ',
                text:'prueba otro codigo'
            });
            </script>";  
            }
        }
        }
        //ejecuta en darle al producto ya esta registrado y actualiza unidades y añade nueva compra
        public static function updateQuantityproduct($conex,$id, $cantidad,$precio_provider,$id_provider){
            $queryUpdate=("UPDATE `producto` SET `prcant_existente`=`prcant_existente`+$cantidad where id_producto={$id}");
            $resultUpdate=mysqli_query($conex,$queryUpdate);
            
            $queryBought=("INSERT INTO `compra`( `cant_compra`, `precio_proveedor`, `id_producto`, `id_proveedor`,`id_tienda`) VALUES ({$cantidad},{$precio_provider},{$id},{$id_provider},{$_SESSION['store']})");
            $resultBought=mysqli_query($conex,$queryBought);            
        }
        //trae todos los prodcutos y los muestar en una tabla
public static function getProducts($conex, $store){

    try {
        //titulo de los espacios tabla
        $table="<table >";
        $table.="<tr class='headerFila'>";
        $table.="<th id='nombretabla'> Nombre</th>";
        $table.="<th> Codigo</th>";
        $table.="<th> Precio</th>";
        $table.="<th> Ultimo precio de compra</th>";
        $table.="<th> Cantidad</th>";
        $table.="<th> Editar</th>";
        $table.="<th> Eliminar</th>";
        $table.="</tr>";
        $query=(" SELECT * from `producto` where id_tienda =$store");
        $result =mysqli_query($conex,$query);
        //si hay almenos un producto crea taba
        if (mysqli_num_rows($result)>0){
            
            while($row =$result->fetch_array()){
                $queryPriceBought=("SELECT *  FROM `compra` WHERE id_producto={$row['id_producto']} ORDER BY `fecha` DESC LIMIT 1;");
                $resultPriceBought =mysqli_query($conex,$queryPriceBought);
                while($rowl= $resultPriceBought->fetch_array()){
                    $lastPriceBought= $rowl['precio_proveedor'];

                    }
                    //relleno espacios tbla
                $table.="<tr class='fila'>";
                $table.="<th> {$row['nombre_producto']}</th>";
                $table.="<th> {$row['id_producto']}</th>";
                $table.="<th> {$row['precio_venta']}</th>";
                $table.="<th> {$lastPriceBought}</th>";
                $table.="<th> {$row['prcant_existente']}</th>";

                $table.="<th> <form method='post'> <button type='submit' value='Editar' name='{$row['id_producto']}'><i class='editButton fa-solid fa-pen-to-square'></i></buttom></form></th>";
                $table.="<th> <form method='post'> <button type='submit' value='Eliminar' name='{$row['id_producto']}'><i class='deleteButton fa-solid fa-rectangle-xmark'></i></button> </form></th>";
                $table.="</tr>";
            }
            $table.="<table>";
            echo $table;
        }
        else{
            echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'No tienes productos aregados aun'
          });
             </script>";   
        }
    } catch (Exception $e) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error al traer productos'
          });
             </script>";   
    }
} 
//verifica si un producto existe
public  static function getProduct($conex, $store, $id){
    $query=(" SELECT * from `producto` where id_tienda = $store  and id_producto =$id" );
    $result =mysqli_query($conex,$query);
    if($result && mysqli_num_rows($result) > 0){

        return $result;
    }
}
//informacion que se muestra al darle en el boton editar 
public static function setProductInfo($conex,$id_store,$id_product){
    $result = Producto::getProduct($conex,$id_store,$id_product);
    while($row =$result->fetch_array()){
        //accesdo a los datps del producto
        //creo alerta donde muestra datos y da la opcion de actualizar
        echo "<script>
        Swal.fire({
            title: 'Editar {$row['nombre_producto']}',
            showCloseButton: true,
            showConfirmButton: false,
            html: `<div class='container'>
                <form method='post'>
                    <div class='form-group'>
                        <label for='editNameProduct'>Nombre</label>
                        <input type='text' class='form-control' name='editNameProduct' value='{$row['nombre_producto']}'>
                    </div>
                    <div class='form-group'>
                        <label for='editNumberProduct'>Código</label>
                        <input type='number' class='form-control' name='editNumberProduct' value='{$row['id_producto']}'>
                    </div>
                    <div class='form-group'>
                        <label for='editDescripcionProduct'>Descripción</label>
                        <input type='text' class='form-control' name='editDescripcionProduct' value='{$row['nombre_producto']}'>
                    </div>
                    <div class='form-group'>
                        <label for='editpriceProduct'>Precio</label>
                        <input type='number' class='form-control' name='editpriceProduct' value='{$row['precio_venta']}'>
                    </div>
                    <div class='form-group'>
                        <label for='editQuantityProduct'>Cantidad</label>
                        <input type='number' class='form-control' name='editQuantityProduct' value='{$row['prcant_existente']}'>
                    </div>
                    <button type='submit' class='btn btn-primary' value='Actualizar' name='{$row['id_producto']}'>Actualizar</button>
                    <button type='submit' class='btn btn-secondary' value='CancelarActualizar' name='{$row['id_producto']}'>Cancelar</button>
                </form>
            </div>`
        })
      </script>";   
            
    }

}
//actualizar producto con los valores dados
public static function updateProduct($conex,$Oldid_Product,$id_ProductEdit,$nombre_producto,$precio_venta,$cantidad,$tienda,$showMessagge){
        try{
            $query = "UPDATE `producto` SET `id_producto`=$id_ProductEdit, `nombre_producto`='$nombre_producto', `precio_venta`=$precio_venta, `prcant_existente`=$cantidad, `id_tienda`=$tienda WHERE `id_producto`=$Oldid_Product";

            $result =mysqli_query($conex,$query);
            if ($result && $showMessagge){
                echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Producto actualizado con exito'
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
//elimina el producto con el id
public static function deleteProduct($conex, $id){
    
    try{
        $query = "DELETE FROM `producto` WHERE `id_producto`=$id";

        $result =mysqli_query($conex,$query);
        if ($result){
            echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Producto Eliminado con exito'
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