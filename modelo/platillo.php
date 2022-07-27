<?php
include_once "conexion.php";

class Platillo{

	private $platillo;
	private $nombre_platillo;
	private $descripcion;
	private $precio;

	public function getPlatillo(){
		return $this->platillo;
	}

	public function setPlatillo($p){
		$this->platillo = $p;
	}

	public function setNombrePlatillo($n){
		$this->nombre_platillo = $n;
	}

	public function getNombrePlatillo(){
		return $this->nombre_platillo;
	}

	public function setDescripcion($n){
		$this->descripcion = $n;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setPrecio($p){
		$this->precio = $p;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function listarPlatillos(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM platillo";

		$r = mysqli_query($con,$sql);

		$datos = array();


		while ( $row = mysqli_fetch_array($r) ){

			$p = new PLatillo();

			$p->setPlatillo($row[0]);
			$p->setNombrePlatillo($row[1]);
			$p->setDescripcion($row[2]);
			$p->setPrecio($row[3]);

			array_push($datos, $p);
		}

		return $datos;
		
	}

	public function buscarPlatillosM($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM platillo WHERE nombre_platillo = '$id' ";

		$r = mysqli_query($con,$sql);

		$p = new PLatillo();

		if ( $row = mysqli_fetch_array($r) ){

			$p->setPlatillo($row[0]);
			$p->setNombrePlatillo($row[1]);
			$p->setDescripcion($row[2]);
			$p->setPrecio($row[3]);

			return $p;
		}else{
			
			return null;
		}


		

	}

	public function buscarPlatillo($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM platillo WHERE idplatillo = '$id' ";

		$r = mysqli_query($con,$sql);

		$p = new PLatillo();

		if ( $row = mysqli_fetch_array($r) ){

			$p->setPlatillo($row[0]);
			$p->setNombrePlatillo($row[1]);
			$p->setDescripcion($row[2]);
			$p->setPrecio($row[3]);

		}

		return $p;

	}

	public function obtenerNombrePlatillo($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT nombre_platillo FROM platillo WHERE idplatillo = '$id' ";

		$r = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($r) ){

			$nombre = $row[0];

		}
		
		return $nombre;
		
	}


	public function agregarPlatillo($n , $d , $p ){

		$con = Conexion::obtenerConexion();

		$sql = "INSERT INTO platillo ( nombre_platillo , descripcion , precio ) VALUES ( '$n' , '$d' , '$p' )";

		$r = mysqli_query($con,$sql);

		return $r;
	}

	public function editarPlatillo($n , $d , $p , $id){

		$con = Conexion::obtenerConexion();

		$sql = "UPDATE platillo SET nombre_platillo = '$n' , descripcion = '$d' , precio = '$p' WHERE idplatillo = $id  ";

		$r = mysqli_query($con,$sql);

		return $r;
	}
}

?>