<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inventario</title>
</head>

<body>
    <form action="" method="post">
        <input type="email" name="emailLogin">
        <input type="password" name="passwordLogin">
        <input type="submit" name="submitLogin" onclick="(e)=>{e.preventDefault()}">

    <?php
        include("Auth/login.php");
    ?>
    </form>
    
   
        
</body>

</html>