<?php
require_once "conexion.php";
header('Content-Type: application/json');

$conexion->Conectar();
$paquetes = $conexion->ConsultaSql("call getPaquetes();");
$conexion->CerrarSql();

echo json_encode($paquetes);


