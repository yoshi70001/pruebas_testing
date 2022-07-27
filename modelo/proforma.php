<?php
include_once "conexion.php";

date_default_timezone_set('America/Lima');

class Proforma{

	private $idproforma;
	private $fecha;
	private $total;
	private $estado;
	private $mesa;

	public function setIdproforma($id){
		$this->idproforma = $id;
	}

	public function getIdproforma(){

		return $this->idproforma;
	}

	public function setFecha($fecha){

		$this->fecha = $fecha;
	}

	public function getFecha(){

		return $this->fecha;
	}

	public function setTotal($total){

		$this->total = $total;
	}

	public function getTotal(){

		return $this->total;
	}

	public function setMesa($m){

		$this->mesa = $m;
	}

	public function getMesa(){

		return $this->mesa;
	}

	public function setEstado($estado){

		$this->estado = $estado;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function generarProforma($id){

	    $f = date('Y-m-d H:i:s');

		$con = Conexion::obtenerConexion();

		$sql = "SELECT max(idcomanda) FROM comanda WHERE idmesa=$id AND total = 0 ";

		$resultado = mysqli_query($con, $sql );

		if ( $row = mysqli_fetch_array($resultado) ){

			$idcomanda = $row[0];

		}

		$sql = "DELETE FROM comanda WHERE idcomanda = $idcomanda";

		$resultado = mysqli_query($con, $sql );

		/// CONSULTAR PARA TRAER EL VALOR TOTAL DE TODAS LAS COMANDAS DE LA MESA SELECCIONADA CON ESTADO 1 QUE SIGNIFICA POR PAGAR Y 0 PAGADO

		$sql = "SELECT total FROM comanda WHERE idmesa = $id AND estado = 1  ";

		$resultado = mysqli_query($con, $sql );

		$total = 0;

		while ( $row = mysqli_fetch_array($resultado) ){

			// VARIABLE QUE ACUMULARÁ LOS TOTALES 

			$total += $row[0];

		}

		// CREANDO LA PROFORMA 

		$sql = "INSERT INTO proforma (fecha , total , mesa ,estado ) VALUES ( '$f' ,  '$total' , $id , 1 )";

		$resultado = mysqli_query($con, $sql );

		// BUSCA LA ULTIMA PROFORMA CREADA

		$sql = "SELECT max(idproforma) FROM proforma ";

		$resultado = mysqli_query($con, $sql );
		
		$idproforma = 0;

		if ( $row = mysqli_fetch_array($resultado ) ){

			$idproforma = $row[0];
		}

		// 	AGREGA LA PROFORMA A TODAS LAS COMANDAS 

		$sql = "UPDATE comanda SET idproforma = $idproforma WHERE estado = 1 ";

		$resultado = mysqli_query($con, $sql );

		// PONE A TODAS LAS COMANDA DE LA MESA SELECCIONADA EN ESTADO 0 QUE SIGNIFICA PAGADO

		$sql = "UPDATE comanda SET estado = 0 WHERE idmesa = $id ";

		$resultado = mysqli_query($con, $sql );

		// POR ULTIMO VUELVE A LA MESA A SU ESTADO 1 QUE SIGNIFICA DISPONIBLE 

		$sql = "UPDATE mesa SET estado = 1 WHERE idmesa = '$id' ";

		$resultado = mysqli_query($con,$sql);

		return $resultado;
	}

	public function capturarDatosProforma($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM proforma WHERE idproforma = '$id' ";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			$p = new Proforma();

			$p->setIdproforma($row[0]);
			$p->setFecha($row[1]);
			$p->setTotal($row[2]);
			$p->setMesa($row[3]);
			$p->setEstado($row[4]);

		}
		
		return $p;
	}


	public function listarProformas(){

		$fecha = date('Y-m-d');

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM proforma WHERE fecha LIKE '%$fecha%' ";

		$resultado = mysqli_query($con,$sql);

		$data = array();

		while ( $row = mysqli_fetch_array($resultado)){

			$p = new Proforma();

			$p->setIdproforma($row[0]);
			$p->setFecha($row[1]);
			$p->setTotal($row[2]);
			$p->setMesa($row[3]);
			$p->setEstado($row[4]);

			array_push($data , $p );

		}

		return $data;
	}

	public function anularProforma($idproforma){

		$con = Conexion::obtenerConexion();

		$sql = "UPDATE proforma SET estado = 2 WHERE idproforma= $idproforma";

		$resultado = mysqli_query($con,$sql);

		return $resultado;


	}
}

?>