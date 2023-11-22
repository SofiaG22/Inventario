
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
    public static function setDeleteAlert(){
        echo "<script> 
        Swal.fire({
            icon: 'warning',
            showCloseButton: true,
            showConfirmButton: false,
            title: '¿Quieres eliminar la cuenta?',
            html:`<b>Esta sera suspendida y no podras ingresar de nuevo</b> </br>
            No podras ver las ventas del dia que haya realizado este usuario
            <form method='post'>
            <button type='submit' value='deleteAdmin' name='deleteAdmin'>Aceptar</button>
            <button type='submit' name='cancel'>cancelar</button>
            </form>
            `
        });
        </script>";
    }
    public static function deleteAdmin($conex){
        $newPassword=md5(mt_rand(10000, 100000));
        $newUser=md5(mt_rand(10000, 100000));
        $query =("UPDATE `administrador` SET `contraseña`='$newPassword',`usuario`='$newUser' WHERE id_administrador ={$_SESSION['idAdmin']} ");
        $result = mysqli_query($conex,$query);
        if ($result){
            session_start();
            session_regenerate_id(true);
            session_destroy();
            $_SESSION = array();
            header("Location: index.php");
        }
     
    }
}
?>