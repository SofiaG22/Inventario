<?php
include("../validateSession/validaten.php")
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
    <form action="" method="post">
        <label for="">nombre Tienda</label>
        <input type="text" name="nameShop">
        <label for="">direccion Tienda</label>
        <input type="text" name="adressShop">
        <input type="submit" name="submitSignUp">

        <?php
        include("../Auth/signUp.php")
        ?>
    </form>
</body>
</html>