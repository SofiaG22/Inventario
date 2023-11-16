<?php
class Proveedor{
    private $name_provider ;
    private $telefono ;
    private $correo ;

    public function __construct($name_provider, $telefono, $correo) {
        $this->name_provider = $name_provider;
        $this->telefono = $telefono;
        $this->correo = $correo;
    }
}

?>