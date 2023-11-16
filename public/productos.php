<form action="" method="post">
<input type="submit" name="closeSession" value="Cerrar sesión"></input>
</form>
<?php
include('validateSession/validate.php');
include('template/navbar.php');
include('clases/producto.php');
$pr= new Producto();
$pr->Saludar();
?>
<h1>Añadir productos</h1>
<h2>Ver productos</h2>
<<<<<<< HEAD
<form action=""></form>

<script src="js/addProduct.js"></script>
=======
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
>>>>>>> 96aa238ee9af16dfadfde77c7b36c14945b47984
