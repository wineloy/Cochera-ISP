<?php

require_once "conexion.php";
//Ya tengo el email
session_start();
$emailUser = $_SESSION["email"];
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

$conexion->Conectar();
$Usuario = $conexion->ConsultaSql("SELECT idUsuario, idCliente FROM usuarios where email = '$emailUser' ");
$idUsuario = $Usuario[0][0];
$idCliente = $Usuario[0][1];


//Se estan comprando dos paquetes
// Lo siguiente se puede mejorar 
if(isset($_POST["paqueteDos"]) && $_POST["paqueteDos"] != 0) {

    $idPaquete = $_POST["paqueteUno"];
    $direccionUno = $_POST["DireccionUno"];
    $numeroUno = $_POST["NumeroUno"];
    $localidadUno = $_POST["LocalidadUno"];
    $referenciaUno = $_POST["ReferenciaUno"];
   
    $idPaqueteDos = $_POST["paqueteDos"];
    $direccionDos = $_POST["DireccionDos"];
    $numeroDos = $_POST["NumeroDos"];
    $localidadDos = $_POST["LocalidadDos"] ;
    $referenciaDos = $_POST["ReferenciaDos"];

    
    $Oferta1 = $conexion->ConsultaSql("SELECT idOferta from ofertas where idPaquete = '$idPaquete'");
    $idOferta1=$Oferta1[0][0];
    $Oferta2 = $conexion->ConsultaSql("SELECT idOferta from ofertas where idPaquete = '$idPaqueteDos'");
    $idOferta2=$Oferta2[0][0];

    $paquete1 = $conexion->ConsultaSql("call InsertarPaquetesCarrito($idUsuario, '$idOferta1')");
    $paquete2 = $conexion->ConsultaSql("call InsertarPaquetesCarrito($idUsuario, '$idOferta2')");

    $conexion->ConsultaSql("call InsertarDireccion($idCliente, '$direccionUno', '$referenciaUno', '$numeroUno', '$localidadUno');");
    $conexion->ConsultaSql("call InsertarDireccion($idCliente, '$direccionDos', '$referenciaDos', '$numeroDos', '$localidadDos');");

    if($paquete1[0][0] == 1 && $paquete2[0][0] == 1)
        echo "1";
    else{
        echo "-1";
    }

    $_SESSION["OfertaUno"] =  $idOferta1;
    $_SESSION["OfertaDos"] = $idOferta2;

}
else{

    $idPaquete = $_POST["paqueteUno"];
    $direccionUno = $_POST["DireccionUno"];
    $numeroUno = $_POST["NumeroUno"];
    $localidadUno = $_POST["LocalidadUno"];
    $referenciaUno = $_POST["ReferenciaUno"];

    $Oferta = $conexion->ConsultaSql("SELECT idOferta from ofertas where idPaquete = '$idPaquete'");
    $idOferta=$Oferta[0][0];


    $paquete = $conexion->ConsultaSql("call InsertarPaquetesCarrito($idUsuario, '$idOferta')");;
    $conexion->ConsultaSql("call InsertarDireccion($idCliente, '$direccionUno', '$referenciaUno', '$numeroUno', '$localidadUno');");

    if($paquete[0][0] == 1)
        echo "1";
    else{
        echo "-1";
    }
    $_SESSION["OfertaUno"] =  $idOferta;

}




$conexion->CerrarSql();






