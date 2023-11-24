
<?php
class Administrador{
    private $name_admin ;
    private $charge ;
    private $user ;
    private $password ;
    private $id_store;

    public function __construct($name_admin, $charge, $user, $password,$id_store ) {
        $this->name_admin = $name_admin;
        $this->charge = $charge;
        $this->user  = $user ;
        $this->password = $password;
        $this->id_store = $id_store;

    }

    public static function getAdminInfo($conex, $id){
        //selecciona datos admin y tienda para mostrar la info del admin
        $query = ("SELECT administrador.*, tienda.nombre AS nombre_tienda FROM administrador JOIN tienda ON administrador.id_tienda = tienda.id_tienda WHERE administrador.id_administrador = {$id} AND administrador.id_tienda = {$_SESSION['store']}");
        $result = mysqli_query($conex, $query);
        if(mysqli_num_rows($result)>0){
            $html="<div>";
            while($row=$result->fetch_array()){
                $html.="<div class='mb-3'>
                <h1 class='text-center' >Informacion Administrador</h1>
                </div>";
                
                $html.="<div class='mb-3'>
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
        //genera alerta indicando riesgo de eliminar cuenta con botones aceptar cancelar
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
    public  function addAdmin($conex){
        //verifica si existe usuario
        $query_user=("SELECT * FROM administrador WHERE usuario ='{$this->user}'");
        $result_user= mysqli_query($conex,$query_user);
        
        if(mysqli_num_rows($result_user)>0){
            //si existe muestra alerta existe
            echo "<script>
                    Swal.fire({
                  icon: 'error',
                  title: 'Usuario ya registrado',
                  text: 'prueba de nuevo',
                  footer:'<a href=../index.php>Ir a inicio</a>'
                });
                   </script>";
        }
        else{
            //si no, lo agrega 
            try{
                $query=("INSERT INTO `administrador`( `nombre_admin`, `cargo`, `usuario`, `contraseña`, `id_tienda`) VALUES ('{$this->name_admin}','{$this->charge}','{$this->user}','{$this->password}',{$this->id_store})");   
                $result= mysqli_query($conex,$query);
                if($result){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario registrado con exito',
                        footer:'<a href=../index.php>Ir a inicio</a>'
                      });
                         </script>";    
                  }
            }
            catch(Exception $e){
                //si hay error rellena todos los campos para no llenar otra vez
                
                    echo "<script>
                    let nameSign= document.getElementById('nameSign');
                    nameSign.value=`{$this->name_admin}`
     
                    let chargeSign= document.getElementById('chargeSign');
                    chargeSign.value=`{$this->charge}`
     
                    let emailSign= document.getElementById('emailSign');
                    emailSign.value=`{$this->user}`
     
                    let passwordSign= document.getElementById('passwordSign');
                    passwordSign.value=`{$this->password}`
    
                        Swal.fire({
                    icon: 'error',
                    title: 'A ocurrido un error',
                    text: 'hay un error en la conexion',
                    footer:'no tienes una tienda? <a href=tiendaForm.php>Creala</a>'
                });
                   </script>";
            }
            
        }
    }
    public static function deleteAdmin($conex){
        //crea contraseña y usuario aleatorio 
        $newPassword=md5(mt_rand(10000, 100000));
        $newUser=md5(mt_rand(10000, 100000));
        //asigna los valores aleatorios a la cuenta que se elimina para no poder volver a ingresar
        $query =("UPDATE `administrador` SET `contraseña`='$newPassword',`usuario`='$newUser' WHERE id_administrador ={$_SESSION['idAdmin']} ");
        $result = mysqli_query($conex,$query);
        if ($result){
            //elimina y cierra sesion, redirige inicio
            session_start();
            session_regenerate_id(true);
            session_destroy();
            $_SESSION = array();
            header("Location: index.php");
        }
     
    }

    public static function logIn($conex,$email,$password){
        //Se recibe la contraseña y se encripta con md5
        $password= md5($password);
        //se hace la cunsulta para verificar usuario y contraseña
        $query=("SELECT * FROM administrador WHERE usuario ='$email' and contraseña='$password'");
        $result =mysqli_query($conex,$query);
        if (mysqli_num_rows($result)>0){
            //si es exitosa crea o inicia sesion y en la sesion guardamos datos importantes (id_tienda)
            while($row =$result->fetch_array()){
                session_start();
                $_SESSION['user']=$row['nombre_admin'];
                $_SESSION['store']=$row['id_tienda'];
                $_SESSION['filaSell']=10;
                $_SESSION['filaBought']=10;
                $_SESSION['rowProduct']=10;
                $_SESSION['idAdmin']=$row['id_administrador'];
                header("Location: index.php");
            }
        }
        //si no es exitosa la consulta se llena el campo email con el valor ya ingresado
        //muestra alerta de no encontro usuarioo
        else{
            echo "<script>
           //mantener email; 
        let email= document.getElementById('emailLogin');
        email.value=`$email`

            Swal.fire({
          icon: 'error',
          title: 'Usuario o contraseña equivocada',
          text: 'prueba de nuevo',
          footer:'No tienes cuenta ?<a href=template/formSignUp.php>Registrate</a>'
        });
           </script>";
        }
    }
}
?>