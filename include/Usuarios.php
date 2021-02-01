<?php
require_once __DIR__.'/conexion.php';
class Usuarios{

    private String $nombre;
    private String $apellidos;
    private String $telefono;
    private String $correo;
    private String $pass;
    private $conexion;

    public function __construct(ConexionSql $conexion, string $nombre, String $apellidos, String $telefono, String $correo, String $contrasena)
    {
        $this->conexion = $conexion;
        $this->conexion->Conectar();
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->telefono=$telefono;
        $this->correo=$correo;
        $this->pass = $contrasena;
    }


    public function RegistrarUsuario(): int 
    {
        $cifrada = hash("sha512",$this->pass);
        $query = $this->conexion->ConsultaSql("call crearUsuario('$this->nombre','$this->apellidos','$this->telefono','$this->correo','$cifrada');");
        if ($query[0][0]==1) {
            session_start();
            $_SESSION["email"]= $this->correo;
         }
        $this->conexion->CerrarSql();
        return $query[0][0];

    }

}
//Ejecucion de Script
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$email = strtolower($_POST["email"]);
$password = $_POST["contraseña"];

$crearUsuario = new Usuarios($conexion,$nombre, $apellidos, $telefono, $email, $password);
$id = $crearUsuario->RegistrarUsuario();
echo $id;