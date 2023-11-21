<?php
include("../validateSession/validatenTemplate.php")
?>
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
    <h1 class="text-center">Crear tienda</h1>
        <form action="" method="post" class="col-md-6 offset-md-3 mt-4">
            <div class="mb-3">
                <label for="createStore" class="form-label">Nombre de la tienda</label>
                <input type="text" class="form-control" id="createStore" name="createStore">
            </div>
            <div class="mb-3">
                <label for="storeAddress" class="form-label">Direccion de la tienda</label>
                <input type="password" class="form-control" id="storeAddress" name="storeAddress">
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block" name="submitLogin" onclick="(e)=>{e.preventDefault()}">Iniciar Sesión</button>
    <?php
    include("../handlers/addStore.php");
    ?>
</form>
    
    <a href="formSignUp.php">Añadir admin</a>
   <a href="../index.php">Iniciar sesion</a>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>