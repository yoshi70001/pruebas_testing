<?php
class formproforma{

	public function formproformaShow(){
		include_once "../controlador/ControladorCajero.php";
		include_once "../Vistas/head.php";
		include_once "../vistas/body.php";
		$cajero = new ControladorCajero();
		$objListaProforma = $cajero->listarProforma();
		?>
		<table class='table'>
			<tr>
				<td>ID</td>
				<td>Fecha</td>
				<td>Total</td>
				<td>Mesa</td>
				<td>Estado</td>
				<td>Accion</td>
			</tr>
		<?php foreach ( $objListaProforma as $proforma ) { ?>
			<tr>
				<td><?php echo $proforma->getIdproforma(); ?></td>
				<td><?php echo $proforma->getFecha(); ?></td>
				<td>S/<?php echo $proforma->getTotal(); ?></td>
				<td>N° <?php echo $proforma->getMesa(); ?></td>
		<?php if ( $proforma->getEstado() == 1 ){ ?>
				<td>Por Generar</td>
				<td>
					<form action='../controlador/getCajero.php?view=generarBoleta&id=<?php echo $proforma->getIdproforma(); ?>' method='POST'>
						<input type='submit' class='btn btn-success' value='Generar Boleta'>
					</form>
					<form action='../controlador/getCajero.php?view=AnularProforma&id=<?php echo $proforma->getIdproforma(); ?>' method='POST'>
						<input type='submit' class='btn btn-danger' value='Anular Proforma'>
					</form>							
						</td></tr>
		<?php }elseif( $proforma->getEstado() == 0 ){ ?>
				<td>Generado</td>	
				<td></td>						
			</tr>
		<?php }elseif ($proforma->getEstado() == 2) { ?>
				<td>Anulada</td>	
				<td></td>						
			</tr>
		<?php }					
		} ?>
		</table>
		<?php include_once "../vistas/foot.php";
	}
}

?>