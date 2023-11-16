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
<form action=""></form>

<script src="js/addProduct.js"></script>