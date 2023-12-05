<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('validateSession/validateTemplate.php');
include('template/navbar.php');
//controla numero de fialas mostradas en resultado
$_SESSION['filaSell']=10;
$_SESSION['filaBought']=10;
$_SESSION['rowProduct']=10;
?>

<div class="container mt-5">
<h1 class="text-center">Añadir Venta</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form action="" method="post">
                
                <div class="mb-3">
                    <label for="-1" autocomplete="off" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nameProduct" name="-1">
                    <ul id="ulSearch"></ul>
                </div>
                
                <div class="mb-3">
                    <label for="quantitySell" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="quantitySell" name="quantitySell">
                </div>

              

                <div class="mb-3">
                    <label for="idCliente" class="form-label">ID cliente</label>
                    <input type="number" class="form-control" id="idCliente" name="idClient">
                </div>


                <button type="submit" class="btn btn-primary mx-auto d-block border-0" style="background-color: #58158F;" name="submitSell">Añadir</button>
            </form>
        </div>
    </div>
</div>
<script src="js/searchProduct.js"></script>
<?php
include('handlers/sellHandler.php');
?>