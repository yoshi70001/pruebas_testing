<?php

class ControladorCajero{

	public function listarBoletas(){
		include_once "../modelo/boleta.php";
		$objBoleta = new Boleta();
		return $objBoleta->listarBoletasCajero();
	}

	public function listarProforma(){
		include_once "../modelo/proforma.php";
		$objproforma = new Proforma();
		return $objproforma->listarProformas();
			
	}

	public function BuscarReporte($fechainicial , $fechafinal){
		include_once "../modelo/boleta.php";
		$objBoleta = new Boleta();
		return $objBoleta->reporteVentaFechas($fechainicial , $fechafinal);	
	}

	public function listarReporte($fechainicial , $fechafinal){
		include_once "../modelo/boleta.php";
		$objBoleta = new Boleta();
		return $objBoleta->reporteVentaFechas($fechainicial , $fechafinal);	
	}

	public function imprimirReporte($fechainicial , $fechafinal){

		include_once "../modelo/boleta.php";
		$objBoleta = new Boleta();
		return $objBoleta->reporteVentaFechas($fechainicial , $fechafinal);	
	}

	public function listarDetallesBoleta($id){

		include_once "../modelo/comanda.php";
		$objComanda = new Comanda();
		return $objComanda->VerComanda($id);

	}

}

?>