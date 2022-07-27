<?php

$view = $_GET['view'];

switch ($view){

	case 'GestionarInsumos':
		session_start();	
		include_once "../vistas/forminsumos.php";
		$form = new forminsumos();
		$form->forminsumosShow();
		break;

	case 'VistaAgregarInsumo':
		session_start();	
		include_once "../vistas/formagregarinsumo.php";
		$form = new formagregarinsumo();
		$form->formagregarinsumoShow();
		break;

	case 'AgregarInsumo':
		$nombre = $_POST['nombre_insumo'];
		$cantidad = $_POST['cantidad'];
		$unidad = $_POST['unidad'];
		if ( strlen($nombre) > 0 && strlen($cantidad) && strlen($unidad) ){
			include_once "../modelo/insumos.php";
			$objInsumo = new Insumo();
			$objInsumo->agregar($nombre,$cantidad,$unidad);
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Se agrego con exito", "getAlmacenero.php?view=GestionarInsumos");
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al agregar el insumo -> Longitud no aceptada", "getAlmacenero.php?view=GestionarInsumos");
		}
		break;

	case 'buscarinsumo':
		session_start();
		include_once "../vistas/formbuscarinsumo.php";
		$nombre = $_POST['buscarinsumo'];
		if ( !empty($nombre) ){
			$form = new formbuscarinsumo();
			$form->formbuscarinsumoShow($nombre);
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("No ha ingresado el nombre de insumo", "getAlmacenero.php?view=GestionarInsumos");
		}
		
		break;	

	case 'VistaEditarInsumo':	
		session_start();
		include_once "../vistas/formeditarinsumo.php";
		$id = $_GET['id'];
		$form = new formeditarinsumo();
		$form->formeditarinsumoShow($id);
		break;

	case 'EditarInsumo':
		$id = $_POST['id'];
		$nombre = $_POST['nombre_insumo'];
		$cantidad = $_POST['cantidad'];
		$unidad = $_POST['unidad'];
		if ( strlen($nombre) > 0 && strlen($cantidad) && strlen($unidad) ){
			include_once "../modelo/insumos.php";
			$objInsumo = new Insumo();
			$objInsumo->editar($id,$nombre,$cantidad,$unidad);
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Se edito el insumo con exito", "getAlmacenero.php?view=GestionarInsumos");
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al editar el insumo -> Longitud no aceptada", "getAlmacenero.php?view=GestionarInsumos");
		}
		break;

	case 'VistaAumentarInsumo':
		session_start();
		include_once "../vistas/formaumentarinsumos.php";
		$id = $_GET['id'];
		$form = new formaumentarinsumos();
		$form->formaumentarinsumosShOW($id);
		break;	

	case 'AumentarInsumo':
		$id = $_POST['id'];
		$cantidad = $_POST['cantidad'];
		include_once "../modelo/insumos.php";
		$objInsumo = new Insumo();
		$r = $objInsumo->aumentar($id,$cantidad);
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Insumo Aumentado", "getAlmacenero.php?view=GestionarInsumos");
		break;	

	case 'VistaDisminuirInsumo':
		session_start();
		include_once "../vistas/formdisminuirinsumos.php";
		$id = $_GET['id'];
		$form = new formdisminuirinsumos();
		$form->formdisminuirinsumosShow($id);
		break;

	case 'DisminuirInsumo':
		$id = $_POST['id'];
		$cantidad = $_POST['cantidad'];
		include_once "../modelo/insumos.php";
		$objInsumo = new Insumo();
		$r = $objInsumo->disminuir($id,$cantidad);
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Insumo descontado", "getAlmacenero.php?view=GestionarInsumos");
		break;		
}


?>