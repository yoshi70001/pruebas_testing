<?php
class formbuscarplatillo{
	public function formbuscarplatilloShow($nombre){
		include_once "../controlador/ControladorAdministrador.php";
		$m = new ControladorAdministrador();
		$objPlatilloBuscado = $m->buscarPlatillosC($nombre);
		if ( !empty($objPlatilloBuscado ) ){
			include_once "../vistas/head.php";
			include_once "../vistas/body.php";
		?>
		<table class='table'>
			<tr>
				<th>Nombre platillo</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th></th>
			</tr>			
			<tr>
				<td><?php echo $objPlatilloBuscado->getNombrePlatillo(); ?></td>
				<td><?php echo $objPlatilloBuscado->getDescripcion(); ?></td>		
				<td>S/<?php echo $objPlatilloBuscado->getPrecio(); ?></td>
				<td>
					<form action='../controlador/getAdministrador.php?view=VistaEditarPlatillo&id=<?php echo $objPlatilloBuscado->getPlatillo(); ?>' method="POST">
						<input type="submit" class='btn btn-success' value="Editar">
					</form>
				</td>
			</tr>
		</table>
		<?php
		include_once "../vistas/foot.php";
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Insumo no encontrado", "getAdministrador.php?view=GestionarPlatillos");
		}
	}
}


?>