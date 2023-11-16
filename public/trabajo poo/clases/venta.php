<?php
class Venta{
        private $ven_id;
        private $ven_cant;
        private $ven_fecha;

        public function getVenId(){

            return $this->ven_id;
        }

        public function setVenId($ven_id){
            $this->ven_id = $ven_id;
        }

        public function getVenCant(){
            return $this->ven_cant;
        }

        public function setVenCant($ven_cant){
           $this->ven_cant = $ven_cant;
        }

        public function getVenFecha(){
            return $this->ven_fecha;
        }
        public function setVenFecha($ven_fecha){
            $this->ven_fecha = $ven_fecha;
        }

        public function __construct($ven_id, $ven_cant, $ven_fecha){
            $this->ven_id = $ven_id;
            $this->ven_cant = $ven_cant;
            $this->ven_fecha = $ven_fecha;
        }

    }
    ?>