<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- 
<?php
// include('validateSession/validateTemplate.php');
// include('template/navbar.php');

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
-->
<?php

// include('handlers/producthandler.php');
?>


<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');
?> 

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Añadir productos</h1>

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
                    <label for="descripcionProduct" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcionProduct" name="descripcionProduct">
                </div>

                <div class="mb-3">
                    <label for="priceProduct" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="priceProduct" name="priceProduct">
                </div>

                <div class="mb-3">
                    <label for="quantityProduct" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="quantityProduct" name="quantityProduct">
                </div>

                <button type="submit" class="btn btn-primary mx-auto d-block" name="submitProduct">Añadir</button>
            </form>
        </div>
    </div>
</div>

</form>
<form action="" method="post">
    
    <input type="submit"  value="Ver productos" name ="showProducts">
</form>
<?php

include('handlers/producthandler.php');
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>