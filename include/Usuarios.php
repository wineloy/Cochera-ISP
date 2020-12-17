<?php

class Usuarios{

    private String $nombre;
    private String $apellidos;
    private String $telefono;
    private String $correo;
    private String $contraseña;
    private $conexion;

    public function __construct(string $nombre, String $apellidos, String $telefono, String $correo, String $contraseya)
    {
        $this->conexion = new ConexionSql('localhost', 'root', '', 'WISPCH');
        $this->conexion->Conectar();
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->telefono=$telefono;
        $this->correo=$correo;
        $this->contraseya=$contraseya;
    }


    public function RegistrarUsuario(): int 
    {
        $query = $this->conexion->ConsultaSql("call crearUsuario('$this->nombre','$this->apellidos','$this->telefono','$this->correo','$this->contraseya');");
        return $query[0][0];
    }

}