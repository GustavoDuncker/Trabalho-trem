<?php

if($_GET['logout'] == 1){
    session_destroy();
    header("Location: ../index.php");
    exit;
}
?>