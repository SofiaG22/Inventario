<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
   <a href="template/tiendaForm.php">Crear tienda</a>
   <a href="template/formSignUp.php">Crear Cuenta</a>

</body>

</html>