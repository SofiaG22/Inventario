
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
                $html.="<div class='mb-3'>
                <h1 class='text-center'>Informacion Administrador</h1>
                <h5 for='nameAdmin'>Nombre:</h5>
                <p>{$row['nombre_admin']}</p>
                </div>";
                $html.="<div class='mb-3'>
                <h5 for='chargeAdmin'>Cargo:</h5>
                <p>{$row['cargo']}</p>
                </div>";
                $html.="<div class='mb-3'>
                <h5 for='userAdmin'>Usuario:</h5>
                <p>{$row['usuario']}</p>
                </div>";
                $html.="<div class='mb-3'>
                <h5 for='storeAdmin'>Tienda:</h5>
                <p>{$row['nombre_tienda']}</p>
                </div>";
            }
            $html.="</div>";
            echo $html;
        }
    }
}
?>