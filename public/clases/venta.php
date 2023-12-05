<?php
include("clases/producto.php");
include("clases/cliente.php");

class Venta{
    private $cant_venta ;
    private $fecha;

    public function __construct($cant_venta, $fecha) {
        $this->cant_venta = $cant_venta;
        $this->fecha = $fecha;
    }
//añade 10 filas al resultado 
public static function setShowMore(){
    $_SESSION['filaSell']+=10;
}
//quita 10 filas al resultado 
public static function setShowLess(){
    $_SESSION['filaSell']-=10;
    if($_SESSION['filaSell']<10){
    $_SESSION['filaSell']=10;

    }
}
// trae todas las ventas y las meustra en una tabla
public static function getSells($conex,$id_store){

        $query=("SELECT * FROM `venta` WHERE DATE(`fecha`)=CURDATE() and (`id_tienda`) =$id_store and(`id_administrador`)={$_SESSION['idAdmin']};");
        $result = mysqli_query($conex,$query);
        if($result && mysqli_num_rows($result)>0){
            $table ="<table id='sellTable'>";
            $table.="<thead>";
            $table.="<tr class='headerFila'>" ;
            $table.="<th> ID de Venta </th>";
            $table.="<th> Cliente </th>";
            $table.="<th> Cantidad </th>";
            $table.="<th> Codigo </th>";
            $table.="<th> Nombre PROD </th>";
            $table.="<th> Total </th>";
            $table.="<th> Fecha </th>";
            $table.="<th> Eliminar</th>";
            $table.="</tr>";
            $table.="</thead>";
            $table.="<tbody>";



            while($row =$result->fetch_array()){
                $table.="<tr class='fila'>";
                $table.="<th> {$row['id_venta']} </th>";
                $table.="<th> {$row['id_cliente']}  </th>";
                $table.="<th> {$row['cant_venta']} </th>";
                $table.="<th> {$row['id_producto'] }</th>";
                $table.="<th> {$row['nombre_producto'] }</th>";

                $table.="<th> {$row['total'] }</th>";
                $table.="<th> {$row['fecha']} </th>";
                $table.="<th> <form method='post'> <button type='submit' value='Eliminar' name='{$row['id_venta']}'><i class='deleteButton fa-solid fa-rectangle-xmark'></i></button> </form> </th>";
                $table.="</tr>";
            }
            $table.="</tbody>";

            $table .="</table>";
            echo $table;
        }
        else{
            echo "<script> 
            Swal.fire({
                icon: 'error',
                title: 'Aun no tienes ventas hoy'
            });
            </script>";
         }
}
    

public static function setSell($conex,$id_store,$id_product,$quantitySell,$idClient,$name_admin){
    //verifico si existe producto 
    $result = Producto::getProduct($conex,$id_store,$id_product);
    if($result){
        //si existe se avanza en la venta 
        try{
            while($row= $result->fetch_array()){
                //convierto arreglo para obtener datos
                //verifica si lo que hay es amyor a lo que se vende
                if($row['prcant_existente']>=$quantitySell){
                    //si idCliente existe retorna id si no lo crea y lo retorna
                    $cliente = Cliente::setIdCustomer($conex,$idClient);
                    $total=($row['precio_venta'] * $quantitySell);
                    $querySell=("INSERT INTO `venta`( `cant_venta`,`id_cliente`, `id_producto`, `id_tienda`,`total`,`id_administrador` ,`nombre_producto`) VALUES ($quantitySell,$cliente,$id_product,$id_store,$total,{$_SESSION['idAdmin']},'{$row['nombre_producto']}')");
                    $resultSell =mysqli_query($conex,$querySell);
                    if($resultSell){
                        //verifico si fue exitosa y imprimo factura
                        $id_venta = mysqli_insert_id($conex);
                        //actualiza cantidad unidades producot
                        Producto::updateProduct($conex,$id_product,$row['nombre_producto'],$row['precio_venta'],$row['prcant_existente']-$quantitySell,$id_store,false);
                        echo "<script> 
                            Swal.fire({
                                icon: 'success',
                                title: 'Factura de venta',
                                html:`<b> ID venta : </b> {$id_venta} <br> 
                                <b> ID cliente :</b> {$idClient}<br>
                                <b>  Producto : </b> {$row['nombre_producto']} * $quantitySell <br>
                                <b> Total : COP </b>$".$total."<br>
                                <b>Encargado:</b> {$name_admin} <br>`,
                                });
                            </script>";
                        }  
                    }
                    else{
                        echo "<script> 
                            Swal.fire({
                                icon: 'error',
                                title: 'No quedan suficientes unidades'
                            });
                            </script>";
                         }
            }
        }
        catch(Exception $e){
            
            echo "<script> 
                Swal.fire({
                    icon: 'error',
                    title: 'Error al generar la venta',
                    text:'prueba mas tarde'
                });
                    </script>";
            
            }     
        }
        else{
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Selecciona un producto',
                });
                </script>";
        }
    }
    public static function getTotalSell($conex, $store){
        //trae y suma ventas dia y cantidad de regristro(venta)
        $query=("SELECT
        (SELECT SUM(total) FROM venta WHERE DATE(fecha) = CURDATE() AND id_tienda = $store) as total_suma,
        (SELECT COUNT(*) FROM venta WHERE DATE(fecha) = CURDATE() AND id_tienda = $store) as total_registros;");
        $result=mysqli_query($conex,$query);
        if(mysqli_num_rows($result)>0){
            while($row= $result->fetch_array()){
                if( $row['total_suma']>0){
                    echo "<script> Swal.fire({
                        title: 'Felicidades por las ventas :D',
                        html:`<b>ventas :</b> = {$row['total_registros']}<br> <b>total vendido :$</b>{$row['total_suma']}`,
                        });
                        </script>";
                }
                else{
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Aun no tienes ventas :(',
                        timer:2000
                        });
                        </script>";
                }
            }
        }
    }
    public static function getTotalSellAdmin($conex, $store){
        $query=("SELECT
        (SELECT SUM(total) FROM venta WHERE DATE(fecha) = CURDATE() AND id_tienda = $store AND (`id_administrador`)={$_SESSION['idAdmin']} ) as total_suma,
        (SELECT COUNT(*) FROM venta WHERE DATE(fecha) = CURDATE() AND id_tienda = $store  AND (`id_administrador`)={$_SESSION['idAdmin']} ) as total_registros;");
        $result=mysqli_query($conex,$query);
        if(mysqli_num_rows($result)>0){
            while($row= $result->fetch_array()){
                if( $row['total_suma']>0){
                    echo "<script> Swal.fire({
                        title: 'Felicidades por las ventas :D',
                        html:`<b>ventas :</b> = {$row['total_registros']}<br> <b>total vendido :$</b>{$row['total_suma']}`,
                        });
                        </script>";
                }
                else{
                    echo "<script> Swal.fire({
                        icon: 'error',
                        title: 'Aun no tienes ventas :(',
                        timer:2000
                        });
                        </script>";
                }
                }
        }
        

    }
    public static function deleteSell($conex, $id){
        $query=("DELETE FROM venta WHERE id_venta=$id") ;
        $result=mysqli_query($conex,$query);
        if($result){
            echo "<script> Swal.fire({
                icon: 'success',
                showConfirmButton: false,
                title: 'Venta eliminada',
                timer:1500
                });
                </script>";
        }
        else{
            echo"error";
        }
    }
}
