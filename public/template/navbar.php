
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<ul>
    <li><a href="index.php"><i></i>Inicio</a></li>
    <li><a href="productos.php"><i></i>Productos</a></li>
    <li><a href="proveedores.php"><i></i>Proveedores</a></li>

</ul> -->



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <a class="navbar-brand" href="#">Tu Empresa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i></i>Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="productos.php"><i></i>Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="proveedores.php"><i></i>Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vender.php"><i></i>Vender</a>
            </li>
                <?php
                include("Auth/logOut.php");
                echo "<li class='nav-item'> <a class='nav-link' href='profile.php'>" . $_SESSION['user'] . "</a></li>";
                ?>
              <li class="nav-item">
                <form action="" method="post">
                <button type="submit" name="closeSession" value="Cerrar sesión"> Cerrar Sesíon</button>
                </form>
            </li>
        </ul>
    </div>
</nav>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>