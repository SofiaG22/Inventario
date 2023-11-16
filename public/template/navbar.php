<?php

include("Auth/logOut.php");
echo "<div class=Bienvenida>". $_SESSION['user']."</div>";
?>
<ul>
    <li><a href="index.php"><i></i>inicio</a></li>
    <li><a href="productos.php"><i></i>productos</a></li>
    <li>Proveedores</li>

</ul>