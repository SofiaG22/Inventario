<?php
class productoEnTienda{
    private $cant_por_tienda ;
    private $nombre_repartidor;
    private $fecha_recibido;

    public function __construct($cant_por_tienda, $nombre_repartidor, $fecha_recibido) {
        $this->cant_por_tienda = $cant_por_tienda;
        $this->nombre_repartidor = $nombre_repartidor;
        $this->fecha_recibido = $fecha_recibido;
    }
}