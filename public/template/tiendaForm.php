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
                <label for="nameStore" class="form-label">Nombre de la tienda</label>
                <input type="text" class="form-control" id="nameStore" name="nameStore">
            </div>
            <div class="mb-3">
                <label for="adressStore" class="form-label">Direccion de la tienda</label>
                <input type="password" class="form-control" id="vs" name="adressStore">
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block" name="submitStore">Crear tienda</button>
    <?php
    include("../handlers/addStore.php");
    ?>
</form>
    
    <a href="formSignUp.php">Añadir admin</a>
   <a href="../index.php">Iniciar sesion</a>
</body>
</html>