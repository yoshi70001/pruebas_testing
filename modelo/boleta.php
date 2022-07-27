<?php
include_once "conexion.php";
date_default_timezone_set('America/Lima');
$f = date('Y-m-d H:i:s');

class Boleta {

	private $idboleta;
	private $fecha;
	private $total;
	private $estado;
	private $proforma;

	public function setIdboleta($id){

		$this->idboleta = $id;
	}

	public function getIdboleta(){

		return $this->idboleta;
	}

	public function setFecha($f){

		$this->fecha = $f;
	}

	public function getFecha(){

		return $this->fecha;
	}

	public  function setTotal($t){

		$this->total = $t;
	}

	public function getTotal(){

		return $this->total;
	}

	public function setEstado($e){

		$this->estado = $e;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function setProforma($p){

		$this->proforma = $p;
	}

	public function getProforma(){

		return $this->proforma;
	}

	public function generarBoleta($id , $f , $t ){

		$con = Conexion::obtenerConexion();

		$sql = "INSERT INTO boleta (fecha , total , estado , idproforma ) VALUES ( '$f' , '$t' , '1' , '$id'  ) ";

		$resultado = mysqli_query($con, $sql );

		$sql = "UPDATE proforma SET estado = 0 WHERE idproforma = $id ";

		$resultado = mysqli_query($con, $sql);

		return $resultado;
	}

	public function listarBoletas($fecha){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM boleta WHERE fecha LIKE '%$fecha%' ";

		$resultado = mysqli_query($con, $sql );

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

			$boleta = new Boleta();

			$boleta->setIdboleta($row[0]);
			$boleta->setFecha($row[1]);
			$boleta->setTotal($row[2]);
			$boleta->setEstado($row[3]);
			$boleta->setProforma($row[4]);

			array_push($datos,$boleta);

		}

		return $datos;
	}

	public function listarBoletasCajero(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT  * FROM boleta";

		$resultado = mysqli_query($con, $sql );

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

			$boleta = new Boleta();

			$boleta->setIdboleta($row[0]);
			$boleta->setFecha($row[1]);
			$boleta->setTotal($row[2]);
			$boleta->setEstado($row[3]);
			$boleta->setProforma($row[4]);

			array_push($datos,$boleta);

		}

		return $datos;
	}

	public function reporteVentaFechas($fechainicial , $fechafinal){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM `boleta` WHERE fecha BETWEEN '$fechainicial' and '$fechafinal' ";

		$resultado = mysqli_query($con, $sql );

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

				$boleta = new Boleta();

				$boleta->setIdboleta($row[0]);
				$boleta->setFecha($row[1]);
				$boleta->setTotal($row[2]);
				$boleta->setEstado($row[3]);
				$boleta->setProforma($row[4]);

				array_push($datos,$boleta);
		}

		return $datos;
	}

	public function cambiarEstado($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT estado FROM boleta WHERE idboleta = $id ";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

				$estado = $row[0];
		}

		if ( $estado == 1 ) {

			$sql = "UPDATE boleta SET estado = 0 WHERE idboleta = $id";

			$resultado = mysqli_query($con, $sql );
		}else{

			$sql = "UPDATE boleta SET estado = 1 WHERE idboleta = $id";

			$resultado = mysqli_query($con, $sql );

		}

		return $resultado;

	}

}

?>