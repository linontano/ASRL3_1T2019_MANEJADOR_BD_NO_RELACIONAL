<?php
    session_start();
    if (isset($_SESSION["Nombre"])){
        echo " ".$_SESSION["Nombre"];
    }
?>