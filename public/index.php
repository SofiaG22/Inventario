<?php

session_start();

if(!isset($_SESSION['user'])){
    include("indexnoAuth.php");
}

else{
    include("indexAuth.php");
}
?>