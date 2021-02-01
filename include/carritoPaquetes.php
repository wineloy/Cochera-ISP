<?php
require_once __DIR__."/conexion.php";
header('Content-Type: application/json');

$conexion->Conectar();
$paquetes = $conexion->ConsultaSql("call getPaquetes();");
$conexion->CerrarSql();

echo json_encode($paquetes);


