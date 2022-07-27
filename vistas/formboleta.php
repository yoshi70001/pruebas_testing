<?php

class formboleta{

	public function formboletaShow(){
		include_once "../controlador/ControladorCajero.php";
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		$p = new ControladorCajero();			
		$objListaBoleta = $p->listarBoletas();
		$total = 0;
		?>
		<div class='row'>
			<table class='table'>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>

		<?php foreach ($objListaBoleta as $objListaBoleta) { ?>
				<tr>
					<td><?php echo $objListaBoleta->getIdboleta(); ?></td>
					<td><?php echo $objListaBoleta->getFecha(); ?></td>
					<td>S/<?php echo $objListaBoleta->getTotal(); ?></td>
		<?php if ( $objListaBoleta->getEstado() == 1){ ?>
					<td>Por Pagar</td>
					<td>
						<form action='../controlador/getCajero.php?view=ImprimirBoleta&id=<?php echo $objListaBoleta->getproforma(); ?>' method='POST'>
							<input type='submit' class='btn btn-primary' value='Emitir'>
						</form>
						<form action='../controlador/getCajero.php?view=CambiarEstado&id=<?php echo $objListaBoleta->getIdboleta(); ?>' method='POST'>
							<input type='submit' class='btn btn-success' value='Cambiar Estado'>
						</form>			
					</td>
				<tr>
		<?php }else{ ?>
					<td>Pagado</td>
					<td>
						<form action='../controlador/getCajero.php?view=ImprimirBoleta&id=<?php echo $objListaBoleta->getproforma(); ?>' method='POST'>
							<input type='submit' class='btn btn-primary' value='Emitir'>
						</form>
						<form action='../controlador/getCajero.php?view=CambiarEstado&id=<?php echo $objListaBoleta->getIdboleta(); ?>' method='POST'>
							<input type='submit' class='btn btn-success' value='Cambiar Estado'>
						</form>	
					</td>
				<tr>
				<?php } $total += $objListaBoleta->getTotal(); ?>
				<?php } ?>
			</table>
		</div>	
		<?php 
		include_once "../vistas/foot.php";
	}
}

?>