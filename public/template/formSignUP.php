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
        <label for="">nombre</label>
        <input type="text" name="nameSign">

        <label for="">cargo</label>
        <input type="text" name="chargeSign">
        <label for="">email</label>
        <input type="email" name="emailSign">
        <label for="">contraseña</label>
        <input type="password" name="passwordSign">
        <label for="">id tienda</label>
        <input type="number" name="idStoreSign">



        <input type="submit" name="submitSignUp">

        <?php
        include("../Auth/signUp.php")
        ?>
    </form>
</body>
</html>