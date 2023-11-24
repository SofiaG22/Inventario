
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="style/style.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/8eee5f58eb.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
      
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i></i>Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vender.php"><i></i>Vender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos.php"><i></i>Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="proveedores.php"><i></i>Proveedores</a>
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
</nav> -->


<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <i class="fa fa-book"></i>
    <ul>
        <li><a href="index.php"><i></i>Inicio</a></li>
        <li><a href="vender.php"><i></i>Vender</a></li>
        <li><a href="productos.php"><i></i>Productos</a></li>
        <li><a href="proveedores.php"><i></i>Proveedores</a></li>
        <?php
        include("Auth/logOut.php");
        echo "<li><a href='profile.php'>" . $_SESSION['user'] . "</a></li>";
        ?>
    </ul>
</div>

<!-- Contenido principal -->
<div class="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar">
        <button class="navbar-toggsler" type="button" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="" method="post">
                        <button type="submit" name="closeSession" value="Cerrar sesión" class="btn btn-light">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Aquí va el contenido específico de cada página -->
</div>

<!-- JavaScript para manejar la apertura/cierre del sidebar -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const navbar = document.getElement('navbar');

        // navbar.style.marginLeft = sidebar.style.left === '0px' ? '250px' : '0px';
        sidebar.style.left = sidebar.style.left === '0px' ? '-250px' : '0px';

    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>