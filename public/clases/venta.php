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
public static function setShowMore(){
    $_SESSION['filaSell']+=10;
}
public static function setShowLess(){
    $_SESSION['filaSell']-=10;
}
public static function getSells($conex,$id_store){
        $query=("SELECT * FROM `venta` WHERE DATE(`fecha`)=CURDATE() and (`id_tienda`) =$id_store LIMIT 0, {$_SESSION['filaSell']} ;");
        $result = mysqli_query($conex,$query);
        $queryTotal=("SELECT * FROM `venta` WHERE DATE(`fecha`)=CURDATE() and (`id_tienda`) =$id_store;");
        $resultTotal = mysqli_query($conex,$queryTotal);
        if($result && mysqli_num_rows($result)>0){
            $table ="<table>";
            $table.= "<tr>";
            $table.="<th> ID DE VENTA </th>";
            $table.="<th> CLIENTE </th>";
            $table.="<th> CANTIDAD </th>";
            $table.="<th> PRODUCTO </th>";
            $table.="<th> TOTAL </th>";
            $table.="<th> FECHA </th>";
            $table.="</tr>";

            while($row =$result->fetch_array()){
                $table.= "<tr>";
                $table.="<th> {$row['id_venta']} </th>";
                $table.="<th> {$row['cant_venta']} </th>";
                $table.="<th> {$row['id_cliente']}  </th>";
                $table.="<th> {$row['id_producto'] }</th>";
                $table.="<th> {$row['total'] }</th>";
                $table.="<th> {$row['fecha']} </th>";
                $table.="</tr>";
            }
            $table .="</table>";
            if(mysqli_num_rows($resultTotal)>$_SESSION['filaSell']){
                $table .="<form method='post'><button type='submit' name='showMore'>Cargar Más</button> </form>";
            }
            if($_SESSION['filaSell']>=20){
                $table .="<form method='post'><button type='submit' name='showLess'>Cargar Menos</button> </form>";
            }
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
    

public static function setSell($conex,$id_store,$id_product,$quantitySell,$idClient){
    $result = Producto::getProduct($conex,$id_store,$id_product);
    if($result){
        try{
            while($row= $result->fetch_array()){
                if($row['prcant_existente']>=$quantitySell){
                    $cliente = Cliente::setIdSell($conex,$idClient);
                    $total=($row['precio_venta'] * $quantitySell);
                    $querySell=("INSERT INTO `venta`( `cant_venta`,`id_cliente`, `id_producto`, `id_tienda`,`total`) VALUES ($quantitySell,$cliente,$id_product,$id_store,$total)");
                    $resultSell =mysqli_query($conex,$querySell);
                    if($resultSell){
                        $id_venta = mysqli_insert_id($conex);
                        Producto::updateProduct($conex,$id_product,$id_product,$row['nombre_producto'],$row['precio_venta'],$row['prcant_existente']-$quantitySell,$id_store,false);
                        echo "<script> 
                            Swal.fire({
                                icon: 'success',
                                title: 'Factura de venta',
                                html:`<b> ID venta : </b> {$id_venta} <br> 
                                <b> ID cliente :</b> {$idClient}<br>
                                <b> Producto : </b> {$row['nombre_producto']} * $quantitySell <br>
                                <b> Total : COP </b>$".$total."<br>`,
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
                title: 'No se encontro el id de producto',
                });
                </script>";
        }
    }
    public static function getTotalSell($conex, $store){
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
}
