<?php

$view = $_GET['view'];

switch ($view){

	case 'Inicio' :
		session_start();
		include_once "../vistas/formprincipal.php";
		$form = new formprincipal();
		$form->formprincipalShow();
		break;

	case 'GestionarProformas':
		session_start();
		include_once "../vistas/formproforma.php";
		$form = new formproforma();
		$form->formproformaShow();
		break;

	case 'GestionarBoleta':
		session_start();
		include_once "../vistas/formboleta.php";
		$form = new formboleta();
		$form->formboletaShow();
		break;		

	case 'generarBoleta':
		session_start();
		include_once "../modelo/proforma.php";
		include_once "../modelo/boleta.php";
		$id = $_GET['id'];
		$proforma = new Proforma();
		$dato = $proforma->capturarDatosProforma($id);
		$boleta = new Boleta();
		$r = $boleta->generarBoleta( $dato->getIdproforma() , $dato->getFecha() , $dato->getTotal() );
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Boleta generada", "getCajero.php?view=GestionarProformas");

		break;	

	case 'AnularProforma':
		session_start();
		include_once "../modelo/proforma.php";
		$id = $_GET['id'];
		$modelo = new Proforma();
		$modelo->anularProforma($id);
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Proforma anulada", "getCajero.php?view=GestionarProformas");
		break;	

	case 'ImprimirBoleta':
		session_start();
		include_once "../vistas/formimprimirBoleta.php";
		$form = new formimprimirboleta();
		$form->formimprimirboletaShow();	
		break;
		
	case 'CambiarEstado':
		session_start();
		include_once "../modelo/boleta.php";
		$id = $_GET['id'];
		$modelo = new Boleta();
		$modelo->cambiarEstado($id);
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Estado cambiado", "getCajero.php?view=GestionarBoleta");
		break;	

	case 'Reporte':
		session_start();
		include_once "../vistas/formreportes.php";
		$form = new formreportes();
		$form->formreportesShow();	
		break;

	case 'BuscarReporte':
		session_start();
		$fi = $_POST['finicio'];
		$ff = $_POST['ffinal'];
		if ( !empty($fi) && !empty($ff) ){
			include_once "../vistas/formbuscarreporte.php";
			$form = new formbuscarreporte();
			$form->formbuscarreporteShow($fi,$ff);
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Fecha invalida", "getCajero.php?view=Reporte");
		}
		break;

	case 'VerDetalle':
		session_start();
		include_once "../vistas/formdetallesboleta.php";
		$form = new formdetallesboleta();
		$form->formdetallesboletaShow();
		break;

	case 'imprimirReporteFecha':
		session_start();
		include_once "../vistas/formimprimirReporteFechas.php";
		$form = new fomrimprmirreportefechas();	
		$form->fomrimprmirreportefechasShow();
		break;
}

?>