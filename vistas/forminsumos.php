<?php
class forminsumos{
	public function forminsumosShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
		<a href="../controlador/getAlmacenero.php?view=VistaAgregarInsumo" class="btn btn-success">Agregar Insumo</a><hr><br>
		<form action="../controlador/getAlmacenero.php?view=buscarinsumo" method="POST">
		  <div class="form-group row">
		    <label for="buscarinsumo" class="col-sm-2 col-form-label"><strong>Buscar Insumo</strong></label>
		    <div class="col-sm-5">
		      <input type="text" class="form-control" name="buscarinsumo" id="buscarinsumo" >
		    </div>
		    <div class="col-sm-5">
		    	<input type="submit" class="btn btn-success" value="Buscar">
		    </div>
		  </div>
		</form>
		<hr>
		<?php
		include_once "../controlador/ControladorAlmacenero.php";
		$lista = new ControladorAlmacenero();
		$objListaInsumo = $lista->listarInsumo();
		?>
		<table class='table'>
			<tr>
				<td>ID</td>
				<td>Nombre del Insumo</td>
				<td>Cantidad</td>
				<td>Unidad</td>
				<td>Accion</td>
			</tr>
		<?php 	
		foreach ($objListaInsumo as $objListaInsumo) { ?>
			<tr>
				<td><?php echo $objListaInsumo->getIdinsumo(); ?></td>
				<td><?php echo $objListaInsumo->getNombre(); ?></td>
				<td><?php echo $objListaInsumo->getCantidad(); ?></td>
				<td><?php echo $objListaInsumo->getUnidad(); ?></td>
				<td>
					<form action="../controlador/getAlmacenero.php?view=VistaEditarInsumo&id=<?php echo $objListaInsumo->getIdinsumo();?>" method="POST">
						<input type="submit" class='btn btn-success' value="Editar">
					</form>			
				</td>
			</tr>
	<?php } ?>
		</table>
		<?php include_once "../vistas/foot.php" ?>

<?php } } ?>