<?php
require_once "conexion.php";
class validarUsuario{

    private String $email;
    private String $password;
    private $conexion;

    public function __construct(ConexionSql $conexion, String $email, String $contraseña)
    {
        $this->email=$email;
        $this->password=$contraseña;
        $this->conexion = $conexion;
        $this->conexion->Conectar();
    }

    public function Validacion(): int
    {
        $cifrada =   $cifrada = hash("sha512",$this->password);
        $query = $this->conexion->ConsultaSql("call ValidarUsuario('$this->email','$cifrada');");
        
        if ($query[0][0]==1) {
           session_start();
           $_SESSION["email"]= $this->email;
        }
        return $query[0][0];
       
    }
}
$email = strtolower($_POST["email"]);
$pass = $_POST["contraseña"];
//No es lo mejor
$validar = new validarUsuario($conexion,$email,$pass);
echo $validar->Validacion();
 

