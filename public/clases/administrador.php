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

    public static function getAdminInfo($conex, $id){
        $query = ("SELECT administrador.*, tienda.nombre AS nombre_tienda FROM administrador JOIN tienda ON administrador.id_tienda = tienda.id_tienda WHERE administrador.id_administrador = {$id} AND administrador.id_tienda = {$_SESSION['store']}");
        $result = mysqli_query($conex, $query);
        if(mysqli_num_rows($result)>0){
            $html="<div>";
            while($row=$result->fetch_array()){
                $html.="<div>{$row['nombre_admin']}</div>";
                $html.="<div>{$row['id_administrador']}</div>";
                $html.="<div>{$row['cargo']}</div>";
                $html.="<div>{$row['usuario']}</div>";
                $html.="<div>{$row['nombre_tienda']}</div>";
            }
            $html.="</div>";
            echo $html;
        }else
            echo"no hay resultados";
    }
}

?>