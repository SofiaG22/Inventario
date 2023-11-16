<?php

class Producto{
    private $id_product;
    private $name_product ;
    private $descriptionProduct ;
    private $priceProduct ;

    public function __construct($id_product, $name_product, $descriptionProduct , $priceProduct) {
        $this->id_product = $id_product;
        $this->name_product = $name_product;
        $this->descriptionProduct = $descriptionProduct;
        $this->priceProduct = $priceProduct;
    }

    // Otros métodos de la clase
    public function saludar() {
        echo "Hola, soy un metodo";
    }
 
    
}





?>