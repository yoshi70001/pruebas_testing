<?php
include_once "conexion.php";

class DetalleComanda{

	private $detalle_comanda;
	private $comanda;
	private $producto;
	private $cantidad;
	private $subtotal;
	private $precio;

	public function setPrecio($p){
		$this->precio = $p;
	}

	public function getPrecio(){
		return $this->precio ;
	}

	public function setDetalle_comanda($id){
		$this->detalle_comanda = $id;
	}

	public function getDetalle_comanda(){
		return $this->detalle_comanda;
	}

	public function setComanda($f){
		$this->comanda = $f;
	}

	public function getComanda(){
		return $this->comanda;
	}

	public function setProducto($t){
		$this->producto = $t;
	}

	public function getProducto(){
		return $this->producto;
	}

	public function setCantidad($m){
		$this->cantidad = $m;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setSubtotal($u){
		$this->subtotal = $u;
	}

	public function getSubtotal(){
		return $this->subtotal;
	}

	public function agregarPlatillo( $p , $c){

		$con = Conexion::obtenerConexion();

		// SELECCIONA LA ULTIMA COMANDA CREADA 

		$sql = "SELECT max(idcomanda) FROM comanda";
		$resultado = mysqli_query($con,$sql);
		if ( $row = mysqli_fetch_array($resultado ) ){
			// ESTA VARIABLE CAPTURA EL ID DE LA ULTIMA COMANDA
			$id = $row[0];
		}

		$sql = "SELECT precio FROM platillo WHERE idplatillo = $p";
		$resultado = mysqli_query($con,$sql);
		if ( $row = mysqli_fetch_array($resultado ) ){
			// ESTA VARIABLE CAPTURA EL ID DE LA ULTIMA COMANDA
			$precio = $row[0];
		}

		$total = $precio*$c;

		// SE INSERTA UN DETALLE COMANDA CON EL ID DE COMANDA CAPTURA , EL PRODUCTO , LA CANTIDAD Y EL SUBTOTAL

		$sql = "INSERT INTO detalle_comanda (idcomanda , idplatillo, cantidad , subtotal ) VALUES ( '$id' , '$p' , '$c' , '$total')";

		$resultado = mysqli_query($con,$sql);

		// SELECCIONA EL SUBTOTAL DE TODOS LOS DETALLES COMANDA CON EL ID BUSCADO

		$sql = "SELECT subtotal FROM detalle_comanda WHERE idcomanda = $id ";

		$resultado = mysqli_query($con,$sql);

		$total = 0 ;

		while ( $row = mysqli_fetch_array($resultado ) ){

			// ESTA VARIABLE SUMA TODOS LOS SUBTOTALES DE CADA DETALLE COMANDA
			$total += $row[0];
		}

		// POR ULTIMO SE HACE UN UPDATE DE LA COMANDA CON LA VARIABLE TOTAL 

		$sql = "UPDATE comanda SET total = $total WHERE idcomanda = $id ";

		$resultado = mysqli_query($con,$sql);

		return $resultado;
	}

	public function VerDetalleComanda($mesa){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT max(idcomanda) FROM comanda ";

		$resultado = mysqli_query($con,$sql);

		$idcomanda = 0;

		if ( $row = mysqli_fetch_array($resultado)){

			$idcomanda = $row[0];
		}

		$sql = "SELECT iddetalle_comanda, dc.idcomanda ,nombre_platillo , cantidad , subtotal , p.precio FROM detalle_comanda dc , platillo p , comanda c WHERE  dc.idplatillo = p.idplatillo AND c.idcomanda = dc.idcomanda AND c.idmesa = $mesa AND c.estado = 1 	";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

		
			$venta = new DetalleComanda();
			$venta->setDetalle_comanda($row[0]);
			$venta->setComanda($row[1]);
			$venta->setProducto($row[2]);
			$venta->setCantidad($row[3]);
			$venta->setSubtotal($row[4]);
			$venta->setPrecio($row[5]);

			array_push($datos,$venta);
		}

		return $datos;


	}

	public function VerDetalleComandaC($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT iddetalle_comanda , idcomanda, dc.idplatillo , cantidad , subtotal , precio FROM detalle_comanda dc , platillo WHERE dc.idplatillo = platillo.idplatillo AND idcomanda = $id ";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

		
			$venta = new DetalleComanda();
			$venta->setDetalle_comanda($row[0]);
			$venta->setComanda($row[1]);
			$venta->setProducto($row[2]);
			$venta->setCantidad($row[3]);
			$venta->setSubtotal($row[4]);
			$venta->setPrecio($row[5]);

			array_push($datos,$venta);
		}

		return $datos;


	}

		// ELIMINAR EL PLATILLO DE LA COMANDA

	public function eliminarDetalle($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT MAX(idcomanda) FROM comanda";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			$d = $row[0];
		}

		$sql = "SELECT subtotal FROM detalle_comanda WHERE iddetalle_comanda = $id ";

		$resultado = mysqli_query($con,$sql);
		
		if ( $row = mysqli_fetch_array($resultado) ){

			$sub = $row[0];
		}

		$sql = "UPDATE comanda SET total = total - $sub WHERE idcomanda = $d";

		$resultado = mysqli_query($con,$sql);

		$sql = "DELETE FROM detalle_comanda WHERE iddetalle_comanda = '$id' ";

		$resultado = mysqli_query($con,$sql);

		if ($resultado){
			return 1;
		}else{
			return 0;
		}

	}


	// BUSCAR SI EXISTE EL PLATILLO EN LA COMANDA RETORNA 1 SI ES VERDADERO, 0 SI NO EXISTE

	public function buscarPlatilloEnComanda($id){

			$con = Conexion::obtenerConexion();

			$sql = "SELECT max(idcomanda) FROM comanda";

			$resultado = mysqli_query($con,$sql);

			if ( $row = mysqli_fetch_array($resultado) ){

				$idcomanda = $row[0];
			}

			$acierto = 0;

			$sql = "SELECT idplatillo FROM detalle_comanda WHERE idcomanda = '$idcomanda' AND idplatillo = '$id' ";

			$resultado = mysqli_query($con,$sql);

			if ( $row = mysqli_num_rows($resultado) == 1  ){

				$acierto = 1;
			}

			return $acierto;
	}

	// ACTUALIZA LA CANTIDAD DEL PLATILLO  EN EL DETALLE COMANDA  

	public function actualizarDetalleComanda($p , $c ){

		$con = Conexion::obtenerConexion();

		// BUSCA LA ULTIMA COMANDA CREADA

		$sql = "SELECT max(idcomanda) FROM comanda";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			//RETORNA EL VALOR Y LO ALMACENA EN LA VARIABLE IDCOMANDA

			$idcomanda = $row[0];
		}

		// CONSULTA PARA BUSCAR EL IDDETALLE DE LA TABLA DETALLE COMANDA USANDO COMO PARAMETROS EL ID DEL PRODUCTO Y LA COMANDA YA ANTES BUSCADA 

		$sql = "SELECT iddetalle_comanda FROM detalle_comanda WHERE idplatillo = '$p' AND idcomanda = '$idcomanda' ";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			// RETORNA EL VALOR Y LO ALMACENA EN LA VARIABLE IDDETALLE
			$iddetalle = $row[0];
		}

		// CONSULTA PARA OBTENER EL VALOR DE LA CANTIDAD ACTUAL DE UN DETALLE DE LA COMANDA

		$sql = "SELECT cantidad FROM detalle_comanda WHERE iddetalle_comanda = '$iddetalle' ";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			//RETORNA EL VALOR Y LO ALMACENA EN LA VARIABLE CANTIDAD

			$cantidad = $row[0];
		}

		$cantidad += $c;

		// CONSULTA PARA OBTENER EL PRECIO DEL PLATILLO

		$sql = "SELECT precio FROM platillo WHERE idplatillo = '$p' ";

		$resultado = mysqli_query($con,$sql);

		if ( $row = mysqli_fetch_array($resultado) ){

			// RETORNA EL VALOR Y LO ALMACENA EN LA VARIABLE PRECIO
			$precio = $row[0];
		}


		$subtotal = $cantidad*$precio;

		// CONSULTA PARA ACTUALIZAR LA CANTIDAD DE UN DETALLE DE LA COMANDA
		
		$sql = "UPDATE detalle_comanda SET cantidad = '$cantidad' , subtotal = '$subtotal' WHERE iddetalle_comanda = '$iddetalle' ";	
		$resultado = mysqli_query($con,$sql);

		$sql = "SELECT subtotal FROM detalle_comanda WHERE idcomanda = $idcomanda ";

		$resultado = mysqli_query($con,$sql);

		$total = 0 ;

		while ( $row = mysqli_fetch_array($resultado ) ){

			// ESTA VARIABLE SUMA TODOS LOS SUBTOTALES DE CADA DETALLE COMANDA
			$total += $row[0];
		}

		// POR ULTIMO SE HACE UN UPDATE DE LA COMANDA CON LA VARIABLE TOTAL 

		$sql = "UPDATE comanda SET total = $total WHERE idcomanda = $idcomanda ";

		$resultado = mysqli_query($con,$sql);

		return $resultado;

		$bandera = 0;

		if ( $row = mysqli_fetch_array($resultado) ){


			$bandera = 1;
		}

		// RETORNA 0 SI NO HAY PROBLEMA Y 0 SI EXISTE ALGUNO

		return $bandera;
	}
}


?>