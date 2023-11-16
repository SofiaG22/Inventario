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
    <label for="">Codigo</label>
    <input type="number" name="numberProduct">
    <label for="">Descripcion</label>
    <input type="text" name="descripcionProduct">
    <label for="">Precio</label>
    <input type="number" name="priceProduct">
    <label for="">Cantidad</label>
    <input type="number" name="quantityProduct">
    <input type="submit" name="submitProduct">
    <?php

include('handlers/producthandler.php');
?>
<h2>Ver productos</h2>
</form>
<script src="js/addProduct.js"></script>
