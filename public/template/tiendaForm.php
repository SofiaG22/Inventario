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
    <h1>Crear tienda</h1>
    <form action="" method="post">
        <label for="">id de tienda</label>
        <input type="number" id="idStore" name="idStore">

        <label for="">nombre Tienda</label>
        <input type="text"  id="nameStore" name="nameStore">

        <label for="">direccion Tienda</label>
        <input type="text" id="adressStore"name="adressStore">
        <input type="submit" name="submitStore">

        <?php
        include("../handlers/addStore.php")
        ?>
    </form>

    <a href="formSignUp.php">Añadir admin</a>
   <a href="../index.php">Iniciar sesion</a>
</body>
</html>