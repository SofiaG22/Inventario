<?php
if(isset($_POST['closeSession'])){
    session_start();
    session_regenerate_id(true);
    session_destroy();
    $_SESSION = array();
    header("Location: index.php");
}

?>