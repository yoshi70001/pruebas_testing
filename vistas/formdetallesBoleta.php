<?php

class formdetallesboleta{
	public function formdetallesboletaShow(){
		include_once "../controlador/ControladorCajero.php";
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		$id = $_GET['id'];
		$d = new ControladorCajero();
		$d->listarDetallesBoleta($id);
		include_once "../modelo/comanda.php";
		$objComanda = new Comanda();
		$objComandaBuscado = $objComanda->VerComanda($id);
		?>
		<table class='table'>
			<tr>
				<th>Platillo</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Subtotal</th>	
			</tr>
		<?php foreach ($objComandaBuscado as $objComandaBuscado ) { ?>
			<tr>
				<td><?php echo $objComandaBuscado->getProducto(); ?>"</td>
				<td><?php echo $objComandaBuscado->getCantidad(); ?> unidades</td>
				<td>S/<?php echo $objComandaBuscado->getPrecio(); ?></td>
				<td>S/<?php echo $objComandaBuscado->getSubtotal(); ?></td>			
			</tr>
		<?php $total +=$objComandaBuscado->getSubtotal(); ?>			
		<?php } ?> 
			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td><strong>S/<?php echo $total; ?></strong></td>
			  </tr>
		</table>
		<?php include_once "../vistas/foot.php";
	}
}

?>