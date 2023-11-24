
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
    <a href="index.php"><i class="fa-solid fa-layer-group logo"></i>  Inventario</a>
    <ul class="sidebarUl">
        <li><a href="index.php"><i class="fa-solid fa-house"></i>  Inicio</a></li>
        <li><a href="vender.php"><i class="fa-solid fa-cart-shopping"></i>  Vender</a></li>
        <li><a href="productos.php"><i class="fa-solid fa-puzzle-piece"></i>  Productos</a></li>
        <li><a href="proveedores.php"> <i class="fa-solid fa-truck"></i> Proveedores</a></li>
        <?php
        include("Auth/logOut.php");
        echo "<li><a href='profile.php'>"."<i class='fa-solid fa-user'></i> ". $_SESSION['user'] . "</a></li>";
        ?>
    </ul>
</div>


<div class="content">
    <nav class="navbar" id="navbar">
        <button class="navbar-toggle" type="button" onclick="toggleSidebar()">
        <i class="fa-solid fa-bars"></i>
        </button>
        <ul class="navUl">
            <li>
            <form action="" method="post">
                        <button type="submit" name="closeSession" value="Cerrar sesión" class="">Cerrar Sesión</button>
                    </form>
            </li>
        </ul>        
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const body= document.body;

        body.style.marginLeft = sidebar.style.left === '0px' ? '0px' : '250px';
        sidebar.style.left = sidebar.style.left === '0px' ? '-250px' : '0px';

    }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>