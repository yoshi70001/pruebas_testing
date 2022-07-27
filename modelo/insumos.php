<?php
include_once "conexion.php";

class Insumo{

	private $idinsumo;
	private $nombre;
	private $cantidad;
	private $unidad;

	public function getIdinsumo(){
		return $this->idinsumo; 
	}

	public function setIdinsumo($id){
		$this->idinsumo = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($n){
		$this->nombre = $n;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($c){
		$this->cantidad = $c;
	}

	public function getUnidad(){
		return $this->unidad;
	}

	public function setUnidad($u){
		$this->unidad = $u;
	}

	public function listar(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM insumo ";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

			$insumo = new Insumo();

			$insumo->setIdinsumo($row[0]);
			$insumo->setNombre($row[1]);
			$insumo->setCantidad($row[2]);
			$insumo->setUnidad($row[3]);

			array_push($datos, $insumo);
		}

		return $datos;
	}

	public function agregar($n,$c,$u){

		$con = Conexion::obtenerConexion();
		$sql = "INSERT INTO insumo ( nombre , cantidad , unidad) VALUES ('$n','$c','$u' ) ";
		$resultado = mysqli_query($con,$sql);

		return $resultado;
	}

	public function editar($id,$n,$c,$u){

		$con = Conexion::obtenerConexion();
		$sql = "UPDATE insumo SET nombre = '$n', cantidad='$c', unidad ='$u' WHERE idinsumo = $id   ";
		$resultado = mysqli_query($con,$sql);

		return $resultado;
	}

	public function buscar($id){

		$con = Conexion::obtenerConexion();
		$sql = "SELECT * FROM insumo WHERE idinsumo = $id";
		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			$insumo = new Insumo();
			$insumo->setIdinsumo($row[0]);
			$insumo->setNombre($row[1]);
			$insumo->setCantidad($row[2]);
			$insumo->setUnidad($row[3]);
		}

		return $insumo;
	}

	public function buscarNombre($nombre){

		$con = Conexion::obtenerConexion();
		$sql = "SELECT * FROM insumo WHERE nombre = '$nombre'";
		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			$insumo = new Insumo();
			$insumo->setIdinsumo($row[0]);
			$insumo->setNombre($row[1]);
			$insumo->setCantidad($row[2]);
			$insumo->setUnidad($row[3]);

			return $insumo;
			
		}else{

			return null;
		}

		
	}

	public function aumentar($id,$cantidad){

		$con = Conexion::obtenerConexion();
		$sql = "UPDATE insumo SET cantidad = cantidad + $cantidad WHERE idinsumo = $id";
		$resultado = mysqli_query($con,$sql);

		return $resultado;
	}

	public function disminuir($id,$cantidad){

		$con = Conexion::obtenerConexion();
		$sql = "UPDATE insumo SET cantidad = cantidad - $cantidad WHERE idinsumo = $id";
		$resultado = mysqli_query($con,$sql);

		return $resultado;
	}

}

?>