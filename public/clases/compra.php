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

            $query=("SELECT * FROM `compra` WHERE (`id_tienda`) =$id_store;");
            $result = mysqli_query($conex,$query);
            if($result && mysqli_num_rows($result)>0){
                $table ="<table id='boughtTable'>";
                $table.= "<thead>";
                $table.= "<tr class='headerFila'>";
                $table.="<th> ID Compra </th>";
                $table.="<th> Cantidad Comprada</th>";
                $table.="<th> Precio De Producto </th>";
                $table.="<th> Codigo De Producto</th>";
                $table.="<th> Proveedor </th>";
                $table.="<th> Fecha </th>";
                $table.="</tr>";
                $table.="</thead>";
                $table.="<tbody>";



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
                $table .="</tbody>";
                $table .="</table>";

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