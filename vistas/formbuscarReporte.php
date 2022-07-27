<?php

class formbuscarreporte{
	public function formbuscarreporteShow($fi,$ff){
		include_once "../controlador/ControladorCajero.php";
		$cajero = new ControladorCajero();
		$objReporte = $cajero->listarReporte($fi,$ff);
		if ( !empty($objReporte) ){
				include_once "../vistas/head.php";
				include_once "../vistas/body.php";
		?>		
			<div align='center' class='row'>
			<h1 class='col-md-12'>Ventas realizadas entre <?php echo $fi; ?> y <?php echo $ff; ?> </h1>
			<table class='table'>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Total</th>
					<th></th>
				</tr>
		<?php foreach ($objReporte as $objReporte) { ?>
				<tr>
					<td><?php echo $objReporte->getIdboleta(); ?></td>
					<td><?php echo $objReporte->getFecha(); ?></td>
					<td>S/<?php echo $objReporte->getTotal(); ?></td>	
		<?php $total += $objReporte->getTotal(); }  ?>
				<tr>
					<td></td>
					<td><strong>Venta total</strong></td>
					<td><strong>S/<?php echo $total; ?></strong></td>
					<td>
						<form action='../controlador/getCajero.php?view=imprimirReporteFecha&fi=<?php echo $fi;?>&ff=<?php echo $ff;?>' method='POST'> 
							<input type='submit' class='btn btn-primary' value='Imprimir'>
						</form>	
					</td>
				       </tr>
				       </table></div>
		<?php include_once "../vistas/foot.php" ?>
		<?php }else{ 
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("No se encontro ventas en esas fechas", "getCajero.php?view=Reporte");		
		}
		
	}
}


?>