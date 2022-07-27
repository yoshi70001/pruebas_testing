<?php
class formmesa{

	public function formmesaShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
			<a href="../controlador/getAdministrador.php?view=VistaAgregarMesa" class="btn btn-success">Agregar Mesa</a><hr><br>
		<?php
		include_once "../controlador/ControladorAdministrador.php";
		$m = new ControladorAdministrador();
		$objListadoMesa = $m->listarMesaC();
		?>
		<table class='table'>
			<tr>
				<th>Numero de Mesa</th>
				<th>Capacidad</th>
				<th>Estado</th>
				<th>Accion</th>
			</tr>
		<?php foreach ($objListadoMesa as $objListadoMesa) { ?>		
			<tr>
				<td>N°<?php echo $objListadoMesa->getNum_mesa(); ?></td>
				<td><?php echo $objListadoMesa->getCapacidad(); ?> personas</td>
			<?php if ( $objListadoMesa->getEstado() == 1) { ?>
				<td>Disponible</td>
			<?php }else{ ?>
				<td>No Disponible</td>
			<?php }	?>		
				<td>
					<form action='../controlador/getAdministrador.php?view=VistaEditarMesa&id=<?php echo $objListadoMesa->getNum_mesa(); ?>' method="POST">
						<input type="submit" class='btn btn-success' value="Editar">
					</form>	
				</td>
			</tr>
		<?php }  ?>
		</table>
		<?php
		include_once "../vistas/foot.php";
	}

}

?>