<?php
//Ya tengo el email
session_start();

//IDPaquetes
$idPaquete;
$idPaqueteDos;

//Primera Dirección
$direccionUno;
$numeroUno;
$localidadUno;
$referenciaUno;

//Segundo Envio
$direccionDos;
$numeroDos;
$localidadDos;
$referenciaDos;

$idPaquete = $_POST["paqueteUno"];
$direccionUno = $_POST["DireccionUno"];
$numeroUno = $_POST["NumeroUno"];
$localidadUno = $_POST["LocalidadUno"];
$referenciaUno = $_POST["ReferenciaUno"];


//Se estan comprando dos paquetes
// Lo siguiente se puede mejorar 
if(isset($_POST["paqueteDos"]) && $_POST["paqueteDos"]!=0) {

    $idPaqueteDos = $_POST["paqueteDos"];
    $direccionDos = $_POST["DireccionDos"];
    $numeroDos = $_POST["NumeroDos"];
    $localidadDos = $_POST["LocalidadDos"] ;
    $referenciaDos = $_POST["ReferenciaDos"];
}
