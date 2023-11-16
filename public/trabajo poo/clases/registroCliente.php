<?php
 
require_once "cliente.php";

$cli_id = $_POST["cli_documento"];

$cliente = new Cliente($cli_id);

$cliente->guardar();

ECHO "Guardado poderoso";

?>