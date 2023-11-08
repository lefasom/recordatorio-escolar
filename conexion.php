<?php 
 class conexion {
	private $servidor="localhost";
	private $usuario="id18788963_root";
	private $contrasenia="Leo37738351@";
	private $conexion;

	public function __construct(){
		try {
		   $this->conexion= new PDO("mysql:host=$this->servidor;dbname=id18788963_host",$this->usuario,$this->contrasenia);

		   $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch ( PDOExceptiom $error) {
			echo "CONEXION ERRONEA!!".$error;
		}
    }


    public function ejecutar($sql){
    	$this->conexion->exec($sql);
    	return $this->conexion->lastInsertId();
    }

    public function consultar($sql){
    $sentencia=$this->conexion->prepare($sql);
    $sentencia->execute();
    return $sentencia->fetchAll();
    }

              }
              
 ?>
