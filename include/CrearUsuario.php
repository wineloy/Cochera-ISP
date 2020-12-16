<?php
class CrearUsuario {

    private $nombre;
    private $apellidos;
    private $telefono;
    private $email;
    private $password;
    private $conexion;

    public function __construct($nombre, $apellidos, $telefono, $email, $password)
    {
        $this->$nombre=$nombre;
        $this->$apellidos=$apellidos;
        $this->telefono=$telefono;
        $this->email=$email;
        $this->password=$password;
        $this->conexion = new ConexionSql('localhost', 'root', '', 'WISPCH');
        $this->conexion->Conectar();
    }

    public function RegistrarUsuario():int 
    {
        $query = $this->conexion->ConsultaSql("call crearUsuario('$this->nombre','$this->apellidos','$this->telefono','$this->email','$this->password');");
        return $query[0][0];
    }

}
