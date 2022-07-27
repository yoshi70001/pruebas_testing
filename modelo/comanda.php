<?php
include_once "conexion.php";

class Comanda{

	private $idcomanda;
	private $mesa;
	private $detalle_comanda;
	private $fecha;
	private $total;

	public function setIdcomanda($id){
		$this->idcomanda = $id;
	}

	public function getIdcomanda(){
		return $this->idcomanda;
	}

	public function setMesa($f){
		$this->mesa = $f;
	}

	public function getMesa(){
		return $this->mesa;
	}

	public function setDetalle_comanda($t){
		$this->detalle_comanda = $t;
	}

	public function getDetalle_comanda(){
		return $this->detalle_comanda;
	}

	public function setFecha($m){
		$this->fecha = $m;
	}

	public function getFecha(){
		return $this->fecha;
	}


	public function setTotal($u){
		$this->total = $u;
	}

	public function getTotal(){
		return $this->total;
	}

	public function crearComanda( $m  ){

		date_default_timezone_set('America/Lima');

	    $f = date('Y-m-d H:i:s');

		$con = Conexion::obtenerConexion();

		$sql = "INSERT INTO comanda ( `idmesa`, `fecha`, `total` , `estado`	) VALUES ( '$m' , '$f' , '0' , '1' )";

		$r = mysqli_query($con ,  $sql );

		$sql = "UPDATE mesa SET estado = 0 WHERE idmesa = '$m' ";

		$r = mysqli_query($con, $sql );
		
		return $r;


	}

	public function VerComanda($id){

		$con = Conexion::obtenerConexion();

		$sql = "UPDATE boleta SET estado = 0 WHERE idproforma = $id";

		$stm = mysqli_query($con,$sql);

		$sql = "SELECT * FROM comanda WHERE idproforma='$id' ";

		$r = mysqli_query($con,  $sql );

		$datos = array();

		include_once "detalle_comanda.php";

		while ( $row = mysqli_fetch_array($r) ){

			$sql2 = "SELECT iddetalle_comanda , idcomanda, p.nombre_platillo , cantidad , subtotal , precio FROM detalle_comanda dc , platillo p WHERE dc.idplatillo = p.idplatillo AND idcomanda = $row[0] ";

			$resultado2 = mysqli_query($con,$sql2);

			while ( $row2 = mysqli_fetch_array($resultado2) ){
	
				$venta = new DetalleComanda();
				$venta->setDetalle_comanda($row2[0]);
				$venta->setComanda($row2[1]);
				$venta->setProducto($row2[2]);
				$venta->setCantidad($row2[3]);
				$venta->setSubtotal($row2[4]);
				$venta->setPrecio($row2[5]);

				array_push($datos,$venta);
			}

		}

		return $datos;
	}
}

?>