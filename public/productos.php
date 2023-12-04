<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');
$_SESSION['filaSell']=10;
$_SESSION['filaBought']=10;

?> 

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Añadir producto</h1>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nameProduct" name="nameProduct">
                </div>

                <div class="mb-3">
                    <label for="numberProduct" class="form-label">Código</label>
                    <input type="number" class="form-control" id="numberProduct" name="numberProduct">
                </div>

                <div class="mb-3">
                    <label for="priceBought" class="form-label">Precio Compra</label>
            <input type="number" class="form-control" id="priceBought" name="priceBought">
        </div>
        <div class="mb-3">
            <label for="priceSell" class="form-label">Precio venta</label>
            <input type="number" class="form-control" id="priceSell" name="priceProduct">
        </div>
        <div class="mb-3">
            <label for="quantityProduct" class="form-label">Cantidad Compra</label>
            <input type="number" class="form-control" id="quantityProduct" name="quantityProduct">
        </div>
        <div class="mb-3">
            <label for="providerId" class="form-label">Proveedor Compra</label>
            <select class="form-control" id="providerId" name="providerId"></select>
        </div>
            
        <button type="submit" class="btn btn-primary mx-auto d-block border-0" style="background-color: #58158F;" name="submitProduct">Añadir</button>
            </form>
        </div>
    </div>
</div>

</form>
<form action="" method="post">
    
    <button type="submit"  class="EditDeleteProduct" value="Ver productos" name ="showProducts"> Ver y editar productos</button>
</form>

<script src="js/productTable.js"></script>
<?php


include('handlers/producthandler.php');
?>
