<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
</head>

<body>
    <form action="" method="post">
        <input type="email" name="emailLogin">
        <input type="password" name="passwordLogin">
        <input type="submit" name="submitLogin" onclick="noReenvio(event)">

    <?php
        include("login.php");
    ?>
    </form>
    
    <script>
        function noReenvio(e){
            e.preventDefault()
        }
    </script>
</body>

</html>