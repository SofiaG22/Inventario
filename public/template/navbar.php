<?php

include("Auth/logOut.php");
echo "<div class=Bienvenida>". $_SESSION['user']."</div>";
?>
<ul>
    <li><a href="index.php"><i></i>Inicio</a></li>
    <li><a href="productos.php"><i></i>Productos</a></li>
    <li><a href="proveedores.php"><i></i>Proveedores</a></li>

</ul>