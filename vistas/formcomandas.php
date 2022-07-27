<?php
class formcomanda{

	public function formcomandaShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		$m = new ControladorMesero();
		?>
		<main>
			<div id="Menus" class="container" align="center">
			<h1>COMANDAS</h1>
			<div id="ListadoPlatillos">
			<form action="../controlador/getMesero.php?view=AgregarPlatilloComanda" method="POST">		
			<?php
				$objListaPlatillo = $m->listarPlatillosC();
			?>
			<strong>Escoger Platillo: </strong><select id='buscarPlatillo' name='buscarPlatillo' ><option value='0'>Buscar Platillo... </option>
		<?php foreach ($objListaPlatillo as $objListaPlatillo ) { ?>
			<option value='<?php echo $objListaPlatillo->getPlatillo(); ?>'><?php echo $objListaPlatillo->getNombrePlatillo(); ?></option>
		<?php } ?>
			</select><br><br>
			<strong>Cantidad:<strong> <input name="cantidad" type="number" min="1" ><br><br>
			<input type='submit' class='btn btn-success' value='Agregar Platillo' id='AgregarPlatillo'>	
			</form>	
			</div>
			<div id="Detalles" align="center">
			<?php
				$objDetalleBuscado = $m->verDetalle($_SESSION['idmesa']);	
			 ?>
			<table class='table'>
				<tr>
					<td>Comanda</td>
					<td>Platillo</td>
					<td>Precio</td>
					<td>Cantidad</td>
					<td>Subtotal</td>
					<td></td>
				</tr>
		<?php foreach ($objDetalleBuscado as $objDetalleBuscado ){ ?>
				<tr>
					<td><?php echo $objDetalleBuscado->getComanda(); ?></td>
					<td><?php echo $objDetalleBuscado->getProducto(); ?></td>
					<td>S/<?php echo $objDetalleBuscado->getPrecio(); ?></td>
					<td><?php echo $objDetalleBuscado->getCantidad();?> unidades</td>
					<td>S/<?php echo $objDetalleBuscado->getSubtotal(); ?></td>
					<td>
						<form method='POST' action='../controlador/getMesero.php?view=EliminarPlatillo&id=<?php echo $objDetalleBuscado->getDetalle_comanda(); ?>'>
							<input type='submit' value='Quitar'>
						</form>
					</td>
				</tr>
		<?php } ?>
			</table>
			</div>
			<div id="Emitir Proforma" align="center">
			<form method="POST" action="../controlador/getMesero.php?view=generarProforma">
				<input type="submit" class='btn btn-primary' value="Emitir Proforma">
			</form>	
		</div>
			<br>							
		</main>
<?php
		include_once "../vistas/foot.php";
	}
}
?>
