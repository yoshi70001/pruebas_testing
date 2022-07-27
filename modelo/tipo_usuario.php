<?php
include_once "conexion.php";
class Tipo_usuario{

	private $idtipo_usario;
	private $tipo;

	public function setTipoUsuario($u){

		$this->idtipo_usario = $u;
	}

	public function getTipoUsuario(){

		return $this->idtipo_usario;
	}

	public function setTipo($t){

		$this->tipo = $t;
	}

	public function getTipo(){

		return $this->tipo;
	}


	public function listarTipo(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM tipo_usuario";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

			$t = new Tipo_usuario();

			$t->setTipoUsuario($row[0]);

			$t->setTipo($row[1]);

			array_push($datos,$t);
		}

		return $datos;
	}
}

?>