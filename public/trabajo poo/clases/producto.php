<?php
require_once "conexion.php";

class Producto{

private $pro_id;
private $pro_nombre;
private $pro_venta;
private $pro_cantidadExst;
const TABLA = "producto";

public function getId(){

    return $this-> pro_id;
}


public function setPro_Id($pro_id){

 $this-> pro_id = $pro_id;
}

public function getPro_nombre(){

    return $this-> pro_nombre;
}


public function setPro_nombre($pro_nombre){

 $this-> pro_nombre = $pro_nombre;
}

public function getPro_venta(){
   return $this-> pro_venta; 
}

public function setPro_venta($pro_venta){
    $this->pro_venta = $pro_venta;
}

public function getPro_cantidadExst(){
    return $this->pro_cantidadExst;
}
public function setPro_cantidadExst($pro_cantidadExst){
    $this->pro_cantidadExst = $pro_cantidadExst;
}

public function __construct($pro_nombre,$pro_venta,$pro_cantidadExst, $pro_id = null) {
    $this->pro_id = $pro_id;
    $this->pro_nombre = $pro_nombre;
    $this->pro_venta = $pro_venta;
    $this->pro_cantidadExst = $pro_cantidadExst;
}

public function guardar(){
    $conexion = new Conexion();
    {
        $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(pro_nombre, pro_precioVenta, pro_cantExistente	) VALUES(:nombreProducto, :precioVenta, :cantidadExistente)");
        $consulta->bindParam(":nombreProducto", $this->pro_nombre);
        $consulta->bindParam(":precioVenta", $this->pro_venta);
        $consulta->bindParam(":cantidadExistente", $this->pro_cantidadExst);
        $consulta->execute();
        $this->id = $conexion->lastInsertId();
    }
    
    $conexion = null;
}

public static function mostrar(){

    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY nombre');
    $consulta-> execute();
    $registros = $consulta->fetchAll();
    return $registros;

}    
    

}

?>