<?php
class Venta{
    private $cant_venta ;
    private $fecha;

    public function __construct($cant_venta, $fecha) {
        $this->cant_venta = $cant_venta;
        $this->fecha = $fecha;
    }

    public static function getSells($conex,$id_store){
        


$query=("SELECT * FROM `venta` WHERE DATE(`fecha`)=CURDATE() and (`id_tienda`) =$id_store ;");
$result = mysqli_query($conex,$query);
if($result){
    while($row =$result->fetch_array()){
       echo $row['fecha'];
    }
}


    }
}
