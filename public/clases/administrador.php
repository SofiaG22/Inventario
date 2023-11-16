<?php
class Administrador{
    private $id_admin;
    private $name_admin ;
    private $charge ;
    private $correo ;

    public function __construct($id_provider, $name_provider, $telefono, $correo) {
        $this->id_provider = $id_provider;
        $this->name_provider = $name_provider;
        $this->telefono = $telefono;
        $this->correo = $correo;
    }
}

?>