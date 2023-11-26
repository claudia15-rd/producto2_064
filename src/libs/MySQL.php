<?php  
/**
 * 
 */
class MySQLdb
{
	private $host="mysql";
	private $usuario = "root";
	private $clave = "example";
	private $db = "ponentes";
	private $puerto = "3306";
	private $conn;
	
	function __construct()
	{
		$this->conn =mysqli_connect($this->host, 
			$this->usuario, 
			$this->clave, 
			$this->db,
		    $this->puerto);

		if (mysqli_connect_errno()) {
			print "Error al conectarse a la base de datos.";
			exit();
		} else { 
			//print "Conexión exitosa ";
		}

		if (mysqli_set_charset($this->conn, "utf8")) {
			//print "El conjunto de caracteres es ".mysqli_character_set_name($this->conn)."<br>";
		} else {
			print "Error en la conversión de caracteres de la base de datos.";
			exit();
		}
	}
	/*
	* Query que regresa un solo registro en un arreglo asociativo
	*/
	public function query($sql='')
	{
		$data = [];
		$r = mysqli_query($this->conn,$sql);
		if ($r) {
			if (mysqli_num_rows($r)>0) {            //si encuentra algo
				$data = mysqli_fetch_assoc($r);     
			}
		}
		return $data;  //devuelve los datos
	}
}

?>