<?php
class Venta{
    private $cant_venta ;
    private $fecha;

    public function __construct($cant_venta, $fecha) {
        $this->cant_venta = $cant_venta;
        $this->fecha = $fecha;
    }
}
