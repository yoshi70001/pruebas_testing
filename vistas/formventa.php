<?php

class formventa{

	public function formventaShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		include_once "../controlador/ControladorMesero.php";
		$get = new ControladorMesero();
		$get->ListarMesas();
		include_once "../vistas/foot.php";

	}
}
