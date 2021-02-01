<?php

session_start();

    echo $_POST["nombre"];
    echo $_POST["telefono"];
    echo $_POST["email"];

$_SESSION["email"] = $_POST["email"];
$_SESSION["telefono"] = $_POST["telefono"];
$_SESSION["nombre"] = $_POST["nombre"];

?>