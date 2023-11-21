<?php
include('conexion/conexion.php');
include('clases/producto.php');
include('clases/proveedor.php');
try{
    $query=("SELECT * FROM proveedor");
    $result =mysqli_query($conex,$query);
    echo "<script>
    let select =document.getElementById('providerId');
    let option;
   
   </script>";
    if (mysqli_num_rows($result)>0){
        while($row =$result->fetch_array()){
            echo "<script>
            option= document.createElement('option');
             option.value ={$row['id_proveedor']};
             option.text = '{$row['nombre_proveedor']}';
             select.add(option);
            </script>";
        }
    }else{
        echo "<script>
            option= document.createElement('option');
             option.value ='nP';
            option.text = 'Añade un proveedor';
             select.add(option);
            </script>";
    }
  
}
catch(Exception $e){
}

if( isset($_POST['submitProduct'])){
    if( !empty($_POST['numberProduct']) && !empty($_POST['nameProduct'])  && !empty($_POST['descripcionProduct'])&& !empty($_POST['priceProduct']) && !empty($_POST['quantityProduct'])&& $_POST['providerId']!='nP' && !empty($_POST['priceBought'])){
        echo $_POST['providerId'];
        $producto =new Producto($_POST['numberProduct'],$_POST['nameProduct'],$_POST['descripcionProduct'],$_POST['priceProduct'],$_POST['quantityProduct'],$_SESSION['store']);
        $producto->setProduct($conex,$_POST['priceBought'],$_POST['providerId']);
    }
    else{
        echo "<script>
        Swal.fire({
            icon: 'error',
                title: 'Completa todos los campos'
          });
             </script>";   
    }

}

if(isset($_POST['showProducts'])){
 Producto::getProducts($conex, $_SESSION['store']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['showProducts']) && !isset($_POST['submitProduct'])) {
    foreach ($_POST as $valor => $campo) {
        $id=$valor;
    }
    if($campo =="Editar"){
        Producto::setProductInfo($conex,$_SESSION['store'],$id);
    }
    elseif($campo =="Actualizar"){
        Producto::updateProduct($conex,$id,$_POST['editNumberProduct'],$_POST['editNameProduct'],$_POST['editpriceProduct'],$_POST['editQuantityProduct'],$_SESSION['store'],true);
    }
    elseif($campo =="Eliminar"){
        Producto::deleteProduct($conex, $id);
    }
    
  
}

?>