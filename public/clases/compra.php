<?php
class Compra{
    private $cant_compra ;
    private $precio_proveedor;

    public function __construct($cant_compra, $precio_proveedor) {
        $this->cant_compra = $cant_compra;
        $this->precio_proveedor = $precio_proveedor;
    }
    //agrega 10
    public static function setShowMoreBought(){
        $_SESSION['filaBought']+=10;
    }//quita 10 filas al resulyador
    public static function setShowLessBought(){
        $_SESSION['filaBought']-=10;
        if($_SESSION['filaBought']<10){
            $_SESSION['filaBought']=10;
        }
    }
    //trae las compras a proveedores
    public static function getBoughts($conex,$id_store){
            //trae compras por 10
            $query=("SELECT * FROM `compra` WHERE  (`id_tienda`) =$id_store LIMIT 0, {$_SESSION['filaBought']} ;");
            $result = mysqli_query($conex,$query);
            //trae todas las compras
            $queryTotal=("SELECT * FROM `compra` WHERE (`id_tienda`) =$id_store;");
            $resultTotal = mysqli_query($conex,$queryTotal);
            if($result && mysqli_num_rows($result)>0){
                $table ="<table>";
                $table.= "<tr class='headerFila'>";
                $table.="<th> ID DE COMPRA </th>";
                $table.="<th> CANTIDAD COMPRADA</th>";
                $table.="<th> PRECIO DE PRODUCTO </th>";
                $table.="<th> CODIGO DE PRODUCTO</th>";
                $table.="<th> PROVEEDOR </th>";
                $table.="<th> FECHA </th>";
                $table.="</tr>";

                //ARREGLO PARA PODER ITERAR SOBRE CADA UNA DE LAS COMPRAS 
                while($row =$result->fetch_array()){
                    $table.= "<tr class='fila'>";
                    $table.="<th> {$row['id_compra']} </th>";
                    $table.="<th> {$row['cant_compra']} </th>";
                    $table.="<th> {$row['precio_proveedor']}  </th>";
                    $table.="<th> {$row['id_producto'] }</th>";
                    $table.="<th> {$row['id_proveedor'] }</th>";
                    $table.="<th> {$row['fecha']} </th>";
                    $table.="</tr>";
                }
                $table .="</table>";
                //si son mas de 10 añade boton ver mas
                if(mysqli_num_rows($resultTotal)> $_SESSION['filaBought']){
                    $table .="<form method='post'><button type='submit' name='showMoreBought'>Cargar Más</button> </form>";
                }
                //si son mas de 20 añade boton ver menos
                if($_SESSION['filaBought']>=20){
                    $table .="<form method='post'><button type='submit' name='showLessBought'>Cargar Menos</button> </form>";
                }
                echo $table;
            }
            else{
                echo "<script> 
                Swal.fire({
                    icon: 'error',
                    title: 'Aun no has hecho compras a proveedores'
                });
                </script>";
             }
    }
}