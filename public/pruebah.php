<?php

if (isset($_POST['submitPrueba'])){
    if(strlen($_POST['nombre'])>=3){

        echo "holiwi";
    }
    else{
        echo
        "<script>
        let name= document.getElementById('name');
        name.value=`{$_POST['nombre']}`
        </script>";
        echo "<script src='js/keepFields.js'>
        </script>";
    }

}
?>