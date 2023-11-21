<?php
include("../validateSession/validatenTemplate.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    

<div class="container mt-5">
    <h1 class="text-center">Añadir Administrador </h1>
    <form action="" method="post" class="col-md-6 offset-md-3">
        <div class="mb-3">
            <label for="nameSign" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nameSign" name="nameSign">
        </div>
        <div class="mb-3">
            <label for="chargeSign" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="chargeSign" name="chargeSign">
        </div>
        <div class="mb-3">
            <label for="emailSign" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailSign" name="emailSign">
        </div>
        <div class="mb-3">
            <label for="passwordSign" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="passwordSign" name="passwordSign">
        </div>
        <div class="mb-3">
            <label for="idStoreSign" class="form-label">Escoger tienda</label>
            <select class="form-control" name="idStoreSign" id="idStoreSign"></select>
        </div>
        <button type="submit" class="btn btn-primary mx-auto d-block" name="submitSignUp">Añadir</button>

        <?php
        include("../Auth/signUp.php");
        ?>
    </form>
</div>


    <a href="tiendaForm.php">Crear tienda</a>
   <a href="../index.php">Iniciar sesion</a>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>