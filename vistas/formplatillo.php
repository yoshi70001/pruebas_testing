<?php

class formplatillo{
	public function formplatilloShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		include_once "../controlador/ControladorAdministrador.php";
		?>
			<a href='../controlador/getAdministrador.php?view=VistaAgregarPlatillo' class='btn btn-success'>Agregar Platillo</a><hr><br>
			<form action="../controlador/getAdministrador.php?view=buscarplatillo" method="POST">
			  <div class="form-group row">
			    <label for="buscarplatillo" class="col-sm-2 col-form-label"><strong>Buscar Platillo</strong></label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" name="buscarplatillo" id="buscarplatillo" >
			    </div>
			    <div class="col-sm-5">
			    	<input type="submit" class="btn btn-success" value="Buscar">
			    </div>
			  </div>
			</form>
			<hr>
		<?php 
		$m = new ControladorAdministrador();
		$objListadoPlatillo = $m->listarPlatillosC();
		?>
		<table class='table'>
			<tr>
				<th>Nombre platillo</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th></th>
			</tr>
		<?php foreach ($objListadoPlatillo as $objListadoPlatillo) { ?>
			<tr>
				<td><?php echo $objListadoPlatillo->getNombrePlatillo(); ?></td>
				<td><?php echo $objListadoPlatillo->getDescripcion(); ?></td>		
				<td>S/<?php echo $objListadoPlatillo->getPrecio(); ?></td>
				<td>
					<a class='btn btn-success' href='../controlador/getAdministrador.php?view=VistaEditarPlatillo&id=<?php echo $objListadoPlatillo->getPlatillo(); ?>'>Editar
					</a>
				</td>
				</tr>
		<?php }?>
		</table>
		<?php
		include_once "../vistas/foot.php";
	}	
}


?>