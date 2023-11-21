<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');
?>

<div class="container mt-5">
    <h1 class="text-center">Añadir proveedor</h1>
    <form action="" class="col-md-6 offset-md-3" method="post">
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
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="emailProveedor" name="emailProveedor">

        </div>

        <button type="submit" class="btn btn-primary mx-auto d-block" name="submitProveedor" >Añadir</button>
    </form>
</div>

<form action="" method="post">
    <input type="submit"  value="Ver proveedores" name ="showProveedor">
</form>

<?php
include("handlers/providerHandler.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>