<?php
require_once "conexion.php";
class Cliente{

private $cli_id;
const TABLA = "cliente";

public function setCliId($cli_id){
    $this->cli_id = $cli_id;
}

public function getCliId(){
    return $this->cli_id;
}

public function __construct($cli_id){
    $this->cli_id = $cli_id;
}


public function guardar(){
    $conexion = new Conexion();
    {
        $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(cli_id) VALUES(:cliDocumento)");
        $consulta->bindParam(":cliDocumento", $this->cli_id);
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