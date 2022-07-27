<?php
class ControladorAlmacenero{

	public function listarInsumo(){

		include_once "../modelo/insumos.php";
		$objInsumo = new Insumo();
		return $objInsumo->listar();				
	}

	public function editarInsumo($id){

		include_once "../modelo/insumos.php";
		$objInsumo = new Insumo();
		return $objInsumo->buscar($id);
	}
	public function buscarInsumo($nombre){

		include_once "../modelo/insumos.php";
		$objInsumo = new Insumo();
		return $objInsumo->buscarNombre($nombre);
	}
}

?>