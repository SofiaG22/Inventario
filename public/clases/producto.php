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

    // Otros métodos de la clase
    public function setProduct($conex) {
        try {
            $query=("INSERT INTO `producto`(`id_producto`, `nombre_producto`, `precio_venta`, `prcant_existente`, `id_tienda`) VALUES ({$this->id_product},'{$this->name_product}',{$this->price_product},{$this->quantity_product},{$this->id_store} )");
            $result =mysqli_query($conex,$query);
            if ($result){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Producto {$this->name_product} creado con  exito'
                      });
                         </script>";   
            }
        } catch (\Throwable $th) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Ya existe un producto con codigo {$this->id_product} '
              });
                 </script>";   
        }
    
}
public static function getProducts($conex, $store){

    try {
        $table="<table >";
        $query=(" SELECT * from `producto` where id_tienda =$store");
        $result =mysqli_query($conex,$query);
        if (mysqli_num_rows($result)>0){
            while($row =$result->fetch_array()){
                $table.="<tr>";
                $table.="<th> {$row['nombre_producto']}</th>";
                $table.="<th> {$row['id_producto']}</th>";
                $table.="<th> {$row['precio_venta']}</th>";
                $table.="<th> <form method='post'> <button type='submit' value='Editar' name='{$row['id_producto']}'>editar </buttom></form></th>";
                $table.="<th> <form method='post'> <button type='submit' value='Eliminar' name='{$row['id_producto']}'>delete</button> </form></th>";


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
    } catch (\Throwable $th) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error al traer productos'
          });
             </script>";   
    }
} 
public  static function getProduct($conex, $store, $id){
    $query=(" SELECT * from `producto` where id_tienda = $store  and id_producto =$id" );
    $result =mysqli_query($conex,$query);
    return $result;

}
public static function setProductInfo($conex,$id_store,$id_product){
    $result = Producto::getProduct($conex,$id_store,$id_product);
    while($row =$result->fetch_array()){
        $html ="<div> <p> editar {$row['nombre_producto']}</p>
        <form method='post'>
        <label for= '' >Nombre</label>
        <input type= 'text' name= 'editNameProduct' value={$row['nombre_producto']}>
        <label for= ''>Código</label>
        <input type= 'number' name= 'editNumberProduct' value={$row['id_producto']}>
        <label for= ''>Descripción</label>
        <input type= 'text ' name='editDescripcionProduct' value={$row['nombre_producto']}>
        <label for= ''>Precio</label>
        <input type= 'number' name= 'editpriceProduct' value={$row['precio_venta']}>
        <label for= ''>Cantidad</label>
        <input type= 'number' name= 'editQuantityProduct' value={$row['prcant_existente']} >
        <button type='submit' value='Actualizar' name= '{$row['id_producto']}'>Actualizar</button>
        <button type='submit' value='CancelarActualizar' name= '{$row['id_producto']}'>Cancel</button>

        
        </form>
        </div>";
        echo $html;
            
                }


}
public static function updateProduct($conex,$Oldid_Product,$id_ProductEdit,$nombre_producto,$precio_venta,$cantidad,$tienda){
   
        try{
            $query = "UPDATE `producto` SET `id_producto`=$id_ProductEdit, `nombre_producto`='$nombre_producto', `precio_venta`=$precio_venta, `prcant_existente`=$cantidad, `id_tienda`=$tienda WHERE `id_producto`=$Oldid_Product";

            $result =mysqli_query($conex,$query);
            if ($result){
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