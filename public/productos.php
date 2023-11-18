<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form action="" method="post">
<input type="submit" name="closeSession" value="Cerrar sesión"></input>
</form>
<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');

?>
<h1>Añadir productos</h1>

<form action="" method="post">
    <label for="">Nombre</label>
    <input type="text" name="nameProduct">
    <label for="">Código</label>
    <input type="number" name="numberProduct">
    <label for="">Descripción</label>
    <input type="text" name="descripcionProduct">
    <label for="">Precio</label>
    <input type="number" name="priceProduct">
    <label for="">Cantidad</label>
    <input type="number" name="quantityProduct">
    <input type="submit" name="submitProduct">

</form>
<form action="" method="post">
    
    <input type="submit"  value="Ver productos" name ="showProducts">
</form>
<?php

include('handlers/producthandler.php');
?>
