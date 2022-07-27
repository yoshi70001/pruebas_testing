<?php

$view = $_GET['view'];

switch ($view){

	case 'Inicio' :
		session_start();
		include_once "../vistas/formprincipal.php";
		$form = new formprincipal();
		$form->formprincipalShow();
		break;

	case 'ventas':
		session_start();		
		include_once "../vistas/formventa.php";
		$form = new formventa();
		$form->formventaShow();
		break;

	case 'CrearComanda':
		session_start();	
		include_once "../controlador/ControladorMesero.php";
		$g = new ControladorMesero();
		$_SESSION['idmesa'] = $_GET['id'];
		$g->crear($_SESSION['idmesa']);
		include_once "../vistas/formcomandas.php";
		$form = new formcomanda();
		$form->formcomandaShow();
		break;	

	case 'RegresarAComandas':
		session_start();
		include_once "../controlador/ControladorMesero.php";
		include_once "../vistas/formcomandas.php";
		$form = new formcomanda();
		$form->formcomandaShow();	
		break;	
		
	case 'AgregarPlatilloComanda':
		session_start();
		include_once "../vistas/formcomandas.php";
		include_once "../modelo/detalle_comanda.php";
		$cantidad =  $_POST['cantidad'];
		$id = $_POST['buscarPlatillo'];
		$modelo = new DetalleComanda();	
		if ( $id > 0 && $cantidad > 0 ){

			$modelo->agregarPlatillo($id , $cantidad );
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Se agrego el platillo con exito", "getMesero.php?view=RegresarAComandas");

				
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al agregar el platillo", "getMesero.php?view=RegresarAComandas");
		}

		break;	

	case 'EliminarPlatillo':
		session_start();
		$id = $_GET['id'];
		include_once "../modelo/detalle_comanda.php";
		$modelo = new DetalleComanda();
		if ( $modelo->eliminarDetalle($id) == 1 ){
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Platillo Eliminado", "getMesero.php?view=RegresarAComandas");		
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al eliminar el platillo", "getMesero.php?view=RegresarAComandas");
		}

		break;

		
	case 'generarProforma':
		session_start();
		include_once "../modelo/proforma.php";
		$proforma = new Proforma();
		$r = $proforma->generarProforma($_SESSION['idmesa']);
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Proforma generada", "getMesero.php?view=ventas");
		break;

}

?>