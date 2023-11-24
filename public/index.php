<?php
session_start();

if(!isset($_SESSION['user'])){
    include("template/indexnoAuth.php");
}

else{
    include("template/indexAuth.php");
}
?>