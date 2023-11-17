<?php
include("../validateSession/validatenTemplate.php")
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
    <h1>Crear tienda</h1>
    <div class="container">
        <div class="row"></div>
            <div class="col"></div>
                <form action="" method="post" class="row">

                    <div class="col-6">
                        <label class="col-2 col-form-label" for="">Nombre Tienda</label>
                            <div class="col-10">
                                <input type="text"  id="nameStore" name="nameStore">
                            </div>
                    </div>

                    <div class="col-6">
                        <label class="col-2 col-form-label" for="">Dirección Tienda</label>
                            <div>
                                <input type="text" id="adressStore"name="adressStore">
                            </div>
                    </div>

                    <input type="submit" name="submitStore">
            
                    <?php
                        include("../handlers/addStore.php")
                    ?>
                </form>
            </div>
        </div>
    </div>

    <a href="formSignUp.php">Añadir admin</a>
   <a href="../index.php">Iniciar sesion</a>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>