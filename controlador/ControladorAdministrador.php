<?php

class ControladorAdministrador{

	public function buscarPlatillosC($id){
		include_once "../modelo/platillo.php";
		$objPlatillo = new Platillo();
		return $objPlatillo->buscarPlatillosM($id);
	}

	public function listarMesaC(){
		include_once "../modelo/mesa.php";
		$objMesa = new Mesa();
		return $objMesa->VerListadoMesa();
		
	}

	public function listarPlatillosC(){
		include_once "../modelo/platillo.php";
		$objPlatillo = new Platillo();
		return $objPlatillo->listarPlatillos();
	}

	public function listarUsuarioC(){

		include_once "../modelo/usuario.php";
		$objUsuario = new Usuario();
		return $objUsuario->listarUsuario();			
	}
	
	public function EditarPlatillo($id){

		include_once "../modelo/platillo.php";
		$objPlatillo = new Platillo();
		return $objPlatillo->buscarPlatillo($id);
	}

	public function listarTipoUsuario(){
		include_once "../modelo/tipo_usuario.php";
		$objTipoUsuario = new Tipo_usuario();
		return $objTipoUsuario->listarTipo();
		
	}

	public function formEditarMesa($id ){

		include_once "../modelo/mesa.php";
		$objMesa = new Mesa();
		return $objMesa->buscarMesa($id);	
	 }

	public function formEditarUsuario($id){

		include_once "../modelo/usuario.php";
		$objUsuario = new Usuario();
		return $objUsuario->BuscarUsuario($id);	

	 }


}

?>
