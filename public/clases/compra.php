<?php
class Compra{
    private $id_compra;
    private $cant_compra ;
    private $precio_proveedor;

    public function __construct($id_compra, $cant_compra, $precio_proveedor) {
        $this->id_compra = $id_compra;
        $this->cant_compra = $cant_compra;
        $this->precio_proveedor = $precio_proveedor;
    }
}