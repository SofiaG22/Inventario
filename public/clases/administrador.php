<?php
class Administrador{
    private $name_admin ;
    private $charge ;
    private $user ;
    private $password ;

    public function __construct($name_admin, $charge, $user, $password ) {
        $this->name_admin = $name_admin;
        $this->charge = $charge;
        $this->user  = $user ;
        $this->password = $password;
    }
}

?>