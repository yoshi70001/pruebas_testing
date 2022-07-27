<?php
class formbuscarinsumo{
	public function formbuscarinsumoShow($nombre){
		include_once "../controlador/ControladorAlmacenero.php";	
		$m = new ControladorAlmacenero();
		$objListaInsumo = $m->buscarInsumo($nombre);
		if ( !empty($objListaInsumo) ){
			include_once "../vistas/head.php";
			include_once "../vistas/body.php";
		?>
		<table class='table'>
			<tr>
				<td>ID</td>
				<td>Nombre del Insumo</td>
				<td>Cantidad</td>
				<td>Unidad</td>
				<td>Accion</td>
			</tr>
			<tr>
				<td><?php echo $objListaInsumo->getIdinsumo(); ?></td>
				<td><?php echo $objListaInsumo->getNombre(); ?></td>
				<td><?php echo $objListaInsumo->getCantidad(); ?></td>
				<td><?php echo $objListaInsumo->getUnidad(); ?></td>
				<td>
					<form method="POST" action="../controlador/getAlmacenero.php?view=VistaEditarInsumo&id=<?php echo $objListaInsumo->getIdinsumo(); ?>">
						<input type="submit" class='btn btn-success' value="Editar">
					</form>						
				</td>
			</tr>
		</table>
		<?php include_once "../vistas/foot.php";
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Insumo no encontrado", "getAlmacenero.php?view=GestionarInsumos");
		}
	}
}

?>