<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inventario</title>
</head>

<body>
    <h1>Iniciar sesion</h1>
    <form action="" method="post" >
        <input type="email"  id="emailLogin" name="emailLogin">
        <input type="password" id="passwordLogin" name="passwordLogin">
        <input type="submit" name="submitLogin" onclick="(e)=>{e.preventDefault()}">

    <?php
        include("Auth/login.php");
    ?>
    </form>

    <h1 class="text-center">Iniciar sesión</h1>
<form action="" method="post" class="col-md-6 offset-md-3 mt-4">
    <div class="mb-3">
        <label for="emailLogin" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="emailLogin" name="emailLogin">
    </div>
    <div class="mb-3">
        <label for="passwordLogin" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="passwordLogin" name="passwordLogin">
    </div>
    <button type="submit" class="btn btn-primary mx-auto d-block" name="submitLogin" onclick="(e)=>{e.preventDefault()}">Iniciar Sesión</button>

    <?php
    include("Auth/login.php");
    ?>
</form>

    
   <a href="template/tiendaForm.php">Crear tienda</a>
   <a href="template/formSignUp.php">Crear Cuenta</a>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>