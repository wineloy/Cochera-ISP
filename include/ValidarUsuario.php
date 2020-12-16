<?php

class validarUsuario{

    private String $email;
    private String $password;
    private $conexion;

    public function __construct(String $email, String $contraseña)
    {
        $this->email=$email;
        $this->password=$contraseña;
        $this->conexion = new ConexionSql('localhost', 'root', '', 'WISPCH');
        $this->conexion->Conectar();
    }

    public function Validacion(): int
    {
        $query = $this->conexion->ConsultaSql("call ValidarUsuario('$this->email','$this->password');");
        return $query[0][0];
    }
}

/* $obj = new validarUsuario("WINELOY@OUTLOOK.COM","TUPUTAMADRE12");
var_dump($obj->Validacion()); */

