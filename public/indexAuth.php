<?php
echo "Bienvenido". $_SESSION['user'];
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

        <input type="submit" name="closeSession"></input>
    </form>
<?php
include("Auth/logOut.php");
?>

</body>
</html>
