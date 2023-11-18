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
        $ul="<ul>";
        $query=(" SELECT * from `producto` where id_tienda =$store");
        $result =mysqli_query($conex,$query);
        if (mysqli_num_rows($result)>0){
            while($row =$result->fetch_array()){
                $ul.= "<li> {$row['nombre_producto']} precio:{$row['precio_venta']} <button id={$row['id_producto']} > editar</button> </li>";
            }
            $ul.="<ul>";
            echo $ul;
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

 }
?>