<form action="" method="post">
<input type="submit" name="closeSession" value="Cerrar sesión"></input>
</form>
<?php
include('validateSession/validate.php');
include('template/navbar.php');
?>
<h1>Añadir productos</h1>
<h2>Ver productos</h2>
<form action="">
    <label for="">Nombre</label>
    <input type="text" name="nameProduct">
    <label for="">Codigo</label>
    <input type="number" name="numberProduct">
    <label for="">Descripcion</label>
    <input type="text" name="descripcionProduct">
    <label for="">Precio</label>
    <input type="number" name="priceProduct">
    <input type="submit">
</form>