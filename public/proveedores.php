<form action="" method="post">
<input type="submit" name="closeSession" value="Cerrar sesión"></input>
</form>
<?php
include('validateSession/validate.php');
include('template/navbar.php');
?>
<h1>Añadir proveedor</h1>
<form action="">
    <label for="">Nombre-Proveedor</label>
    <input type="text" name="nameProvider">
    <label for="">Documento</label>
    <input type="number" name="documentProvider">
    <label for="">Telefono</label>
    <input type="number" name="numberProvider">
    <label for="">Producto</label>
    <input type="text" name="product">
    <label for="">Cantidad</label>
    <input type="number" name="quantityProduct">
    <label for="">Precio-Compra</label>
    <input type="number" name="priceBuyProduct">
    <input type="submit">
</form>
<h2>Ver proveedor</h2>