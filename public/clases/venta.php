<?php
class Venta{
    private $cant_venta ;
    private $fecha;

    public function __construct($id_venta, $cant_venta, $fecha) {
        $this->id_venta = $id_venta;
        $this->cant_venta = $cant_venta;
        $this->fecha = $fecha;
    }
}
