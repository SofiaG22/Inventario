<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>

<?php
$_SESSION['filaBought']=10;
$_SESSION['rowProduct']=10;
include('navbar.php');
?>
<form action="" method="post" class="formSells">
<div class="daySell divSells">
    <button type="submit" name="showSellsToday">Ver ventas del Dia</button>
</div>
<div class="totalsellAdmin divSells">
    <button type="submit" name="showSellsAdmin">Ver total vendido Admin</button>
</div>
<div class="totalSellDay divSells">
    <button type="submit" name="getTotalSell" >Ver total vendido Tienda</button>
</div>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php
include('handlers/indexAuth.php');
?>
</body>
</html>
