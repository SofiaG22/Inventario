<?php
class Compra{
    private $cant_compra ;
    private $precio_proveedor;

    public function __construct($cant_compra, $precio_proveedor) {
        $this->cant_compra = $cant_compra;
        $this->precio_proveedor = $precio_proveedor;
    }
}