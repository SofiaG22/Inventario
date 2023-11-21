<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');
$_SESSION['filaSell']=10;
$_SESSION['filaBought']=10;
?>


<div class="container mt-5">
<h1 class="text-center">Añadir Venta</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form action="" method="post">
                <div class="mb-3">
                    <label for="numberProduct" class="form-label">Código</label>
                    <input type="number" class="form-control" id="numberProduct" name="numberProduct">
                </div>

                <div class="mb-3">
                    <label for="quantitySell" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="quantitySell" name="quantitySell">
                </div>

              

                <div class="mb-3">
                    <label for="idCliente" class="form-label">ID cliente</label>
                    <input type="number" class="form-control" id="idCliente" name="idClient">
                </div>


                <button type="submit" class="btn btn-primary mx-auto d-block" name="submitSell">Añadir</button>
            </form>
        </div>
    </div>
</div>
<?php
include('handlers/sellHandler.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
