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
        $this->id_store = $quantity_product;



    }

    // Otros métodos de la clase
    public function setProduct($conex) {
        $query=("SELECT * FROM administrador");
        $result =mysqli_query($conex,$query);
        if (mysqli_num_rows($result)>0){
           echo "este metodo funciona";
        }
    
}

 }
?>