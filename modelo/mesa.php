<?php
include_once "conexion.php";

class Mesa{

	private $idmesa;
	private $num_mesa;
	private $capacidad;
	private $estado;

	public function setIdmesa($id){
		$this->idmesa = $id;
	}

	public function getIdmesa(){
		return $this->idmesa;
	}

	public function setNum_mesa($f){
		$this->num_mesa = $f;
	}

	public function getNum_mesa(){
		return $this->num_mesa;
	}

	public function setCapacidad($c){
		$this->capacidad = $c;
	}

	public function getCapacidad(){
		return $this->capacidad;
	}

	public function setEstado($e){
		$this->estado = $e;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function VerListadoMesa(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM mesa";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

			$m = new Mesa();

			$m->setIdmesa($row[0]);
			$m->setNum_mesa($row[1]);
			$m->setCapacidad($row[2]);
			$m->setEstado($row[3]);
			
			array_push($datos, $m);
					
		}
			
		return $datos;

	}

	public function buscarMesa($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM mesa WHERE numero_mesa = '$id' ";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			$m = new Mesa();

			$m->setIdmesa($row[0]);
			$m->setNum_mesa($row[1]);
			$m->setCapacidad($row[2]);
			$m->setEstado($row[3]);					
		}
			
		return $m;
	}

	public function mesaDisponible($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM mesa WHERE estado = 0 AND numero_mesa = $id ";

		$resultado = mysqli_query($con, $sql );

		$numero = mysqli_num_rows($resultado);

		return $numero;

	}

	public function agregarMesa( $numero , $capacidad ){

		$con = Conexion::obtenerConexion();

		$sql = "INSERT INTO mesa (numero_mesa , capacidad , estado ) VALUES ( '$numero' , '$capacidad' , 1 )";

		$resultado = mysqli_query($con, $sql );

		return $resultado;
	}

	public function editarMesa(  $capacidad , $estado  , $id ){

		$con = Conexion::obtenerConexion();

		$sql = "UPDATE mesa SET capacidad ='$capacidad', estado = $estado WHERE  idmesa = $id ";

		$resultado = mysqli_query($con, $sql );

		return $resultado;
	}

	public function VerCantidadMesa(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM mesa";

		$resultado = mysqli_query($con,$sql);

		$contador = 0 ;

		while ( $row = mysqli_fetch_array($resultado) ){		
				
			$contador++;			

		}

		return $contador;

	}

	public function obtenerMesa(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT max(numero_mesa) FROM mesa";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){		
				
			$ultimamesa = $row[0];			

		}

		$ultimamesa += 1;

		return $ultimamesa;

	}
}




?>