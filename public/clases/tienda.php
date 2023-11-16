<?php
class Tienda{
    private $name_tienda ;
    private $direccion ;

    public function __construct($name_tienda, $direccion) {
        $this->name_tienda = $name_tienda;
        $this->direccion = $direccion;
    }
}