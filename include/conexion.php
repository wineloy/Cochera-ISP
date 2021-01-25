<?php
/*Clase para conectarse a una fuente de datos   */
class ConexionSql{
	// Datos privados
	private $_Conn; // para administrar la conexion a la bd
	private $_Usuario; // para administrar el usuario
	private $_Clave; // para administrar la clave de usuario
	private $_BaseDatos; //Administrar la base de datos 
	private $_Servidor; //Administrar el servidor
	private $_ResultadoSql; //almacenar los resultados en forma de arreglo
	
	//construtor de la clase
	public function __construct($Servidor,$Usuario,$Clave,$Bd)
	{
		$this->_Servidor=$Servidor;
		$this->_Usuario=$Usuario;
		$this->_Clave=$Clave;
		$this->_BaseDatos=$Bd;
		$this->_ResultadoSql=array(); // inicializar el arreglo
	}
	
	public function Conectar(){
		
		if (!$this->_Conn= new mysqli($this->_Servidor,$this->_Usuario,$this->_Clave,$this->_BaseDatos))
		throw new Exception("Error, no se conecto al servidor ");
	}

	public function ConsultaSql($sql){
		$this->_ResultadoSql=array();
		//ejecutar la consulta
		$resultado=$this->_Conn->multi_query($sql); //quitar mysqli_multi_query
		//verificar que no obtengamos error en la consulta
		if (!$resultado)
			throw new Exception("Error en la consulta ".$sql);
		else{
			$fila=0; //para contabiliar los renglones
			do{
				//Obtener el primer conjunto de resultados
				if ($result=$this->_Conn->store_result()){
					while($row=$result->fetch_row()){ //Agregar el objeto $result->
						//inicializar una variable para controlar las columnas del arreglo
						$columna=0;
						foreach($row as $valor){
							//llenar mi arreglo a regresar
							$this->_ResultadoSql[$fila][$columna]=$valor;
							$columna++;
						}
						$fila++;
					}
					//cerrar el conjunto de resultados obtenidos
					$result->close();
				}
			}while($this->_Conn->more_results() and $this->_Conn->next_result());
			return $this->_ResultadoSql;
		} //else
	}//metodo

	public function resultadoSql(){
		for($r=0; $r<count($this->_ResultadoSql); $r++){
			for($c=0; $c<count($this->_ResultadoSql[$r]); $c++){
				echo $this->_ResultadoSql[$r][$c]. " - ";
			}
			echo "<br>";
		}
	}
	
	public function CerrarSql(){
		$this->_Conn->close();
	}
}


// Esto se hace para heredar la conexion con env
$conexion = new ConexionSql("localhost","root", "","WISPCH");
?>

