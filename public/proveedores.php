<form action="" method="post">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<input type="submit" name="closeSession" value="Cerrar sesión"></input>
</form>
<?php
include('validateSession/validateTemplate.php');
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

<form action="" method="post">
    
    <input type="submit"  value="Ver proveedor" name ="showProveedor">
</form>

<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');
?>
<div class="container mt-5">
    <h1 class="text-center">Añadir proveedor</h1>
    <form action="" class="col-md-6 offset-md-3">
        <div class="mb-3">
            <label for="nameProvider" class="form-label">Nombre-Proveedor</label>
            <input type="text" class="form-control" id="nameProvider" name="nameProvider">
        </div class="mb-3">
        <div class="form-group">
            <label for="documentProvider" class="form-label">Documento</label>
            <input type="number" class="form-control" id="documentProvider" name="documentProvider">
        </div>
        <div class="mb-3">
            <label for="numberProvider" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="numberProvider" name="numberProvider">
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Producto</label>
            <input type="text" class="form-control" id="product" name="product">
        </div>
        <div class="mb-3">
            <label for="quantityProduct" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="quantityProduct" name="quantityProduct">
        </div>
        <div class="mb-3">
            <label for="priceBuyProduct" class="form-label">Precio-Compra</label>
            <input type="number" class="form-control" id="priceBuyProduct" name="priceBuyProduct">
        </div>
        <button type="submit" class="btn btn-primary mx-auto d-block" name="submitProveedor" >Añadir</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>