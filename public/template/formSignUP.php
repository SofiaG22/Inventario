<?php
include("../validateSession/validatenTemplate.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <h1>Añadir Admin</h1>
    <form action="" method="post">
        <label for="">nombre</label>
        <input type="text" id="nameSign"name="nameSign">

        <label for="">cargo</label>
        <input type="text" id="chargeSign"name="chargeSign">
        <label for="">email</label>
        <input type="email" id="emailSign" name="emailSign">
        <label for="">contraseña</label>
        <input type="password" id="passwordSign" name="passwordSign">
        <label for="">id tienda</label>
        <input type="number" id="idStoreSign" name="idStoreSign">



        <input type="submit" name="submitSignUp">

        <?php
        include("../Auth/signUp.php")
        ?>
    </form>
    <a href="tiendaForm.php">Crear tienda</a>
   <a href="../index.php">Iniciar sesion</a>
</body>
</html>