<?php
class Cliente{
    public static function getId($conex, $id){
     $query = ("SELECT * from `cliente` where `id_cliente` = $id");
     $result =mysqli_query($conex,$query);
     if($result && mysqli_num_rows($result) > 0){
 
         return $result;
     }
    }
    public static function setIdSell($conex, $id){
        $result = Cliente::getId($conex, $id);
        if ($result){
            return $id;
        }
        else{
            $query = ("INSERT INTO `cliente`(id_cliente) VALUES ($id)");
            $result =mysqli_query($conex,$query);
            return $id;
        }

    }
}
?>