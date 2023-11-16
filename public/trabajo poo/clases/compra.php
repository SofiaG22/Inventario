<?php
class Compra{

private $com_id;
private $com_cantidad;
private $com_precioProveedor;

public function setcomId($com_id){
    $this->com_id = $com_id;
}

public function getcomId(){
    return $this->com_id;
}

public function setcomCantidad($com_cantidad){
    $this->com_cantidad = $com_cantidad;
}

public function getcomCantidad(){
    return $this->com_cantidad;
}

public function setPrecioProveedor($com_precioProveedor){
    $this->com_precioProveedor = $com_precioProveedor;
}

public function getPrecioProveedor(){
    return $this->com_precioProveedor;
}

public function __construct($com_id, $com_cantidad, $com_precioProveedor){
    $this->com_id = $com_id;
    $this->com_cantidad = $com_cantidad;
    $this->com_precioProveedor = $com_precioProveedor;
}

}
?>