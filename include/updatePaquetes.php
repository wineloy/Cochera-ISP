<?php

require_once __DIR__."/conexion.php";

class Precio
{

    private $resultado;
    private $conexion;

    public function __construct(ConexionSql $conexion)
    {
        $this->conexion = $conexion;
        $this->conexion->Conectar();
        $this->resultado = $conexion->ConsultaSql("call getPaquetes();");
    }

    public function CalculaDescuento()
    {
        $paquetes = $this->resultado;
        for ($package = 0; $package < count($paquetes); $package++) {
            $idPaquete = $paquetes[$package][0];
            $descuento = $paquetes[$package][5];

            if ($paquetes[$package][7] == 1) {
                
                $descuento = $paquetes[$package][5] - ( ($paquetes[$package][5] * $paquetes[$package][8])/100 );
                $this->conexion->ConsultaSql("UPDATE `paquetes` SET `descuento` = $descuento WHERE (`idPaquete` = $idPaquete);");
            }
            else{
                $this->conexion->ConsultaSql("UPDATE `paquetes` SET `descuento` = $descuento  WHERE (`idPaquete` = $idPaquete);");
            }
              
        }
    }

    
}
$Precio = new Precio($conexion);
echo $Precio->CalculaDescuento();
