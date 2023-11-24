<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include("validateSession/validateTemplate.php");
include("template/navbar.php");
include("handlers/profileHandler.php");
$_SESSION['filaSell']=10;
$_SESSION['filaBought']=10;
$_SESSION['rowProduct']=10;
?>
<form action="" method="post">
    <button class="deleteAccount" type="submit" name="deleteAccount">Eliminar cuenta</button>

</form>
