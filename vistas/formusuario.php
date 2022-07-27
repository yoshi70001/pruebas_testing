<?php
class formusuario{
	public function formusuarioShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		include_once "../controlador/ControladorAdministrador.php";
		?>
		<a href="../controlador/getAdministrador.php?view=VistaAgregarUsuario" class="btn btn-success">Agregar Usuario</a><hr><br>
		<?php
		$d = new ControladorAdministrador();
		$objListadoUsuario = $d->listarUsuarioC();
		?>
		<table class='table'>
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>DNI</th>			
				<th>Tipo</th>
				<th>Estado</th>
				<th></th>
			</tr>
		<?php foreach ($objListadoUsuario as $objListadoUsuario) { ?>			
			<tr>
				<td><?php echo $objListadoUsuario->getUsuario(); ?></td>
				<td><?php echo $objListadoUsuario->getContraseña(); ?></td>
				<td><?php echo $objListadoUsuario->getNombres(); ?></td>
				<td><?php echo $objListadoUsuario->getApellidos(); ?></td>
				<td><?php echo $objListadoUsuario->getDni(); ?></td>
			<?php if ( $objListadoUsuario->getTipo_usuario() == 1){ ?>
					<td>Administrador</td>
			<?php }elseif ($objListadoUsuario->getTipo_usuario() == 2) { ?>
					<td>Mesero</td>
			<?php }elseif ($objListadoUsuario->getTipo_usuario() == 3) { ?>
					<td>Cajero</td>
			<?php }elseif ($objListadoUsuario->getTipo_usuario() == 4) { ?>
					<td>Almacenero</td>
			<?php } ?>
			<?php if ( $objListadoUsuario->getEstado_usuario() == 1 ){ ?>
				    <td>Activo</td>
			<?php } elseif ( $objListadoUsuario->getEstado_usuario() == 0 ) { ?>
					<td>Desactivado</td>
			<?php } ?>
				<td>
					<a class='btn btn-success' href='../controlador/getAdministrador.php?view=VistaEditarUsuario&id=<?php echo $objListadoUsuario->getIdusuario(); ?>'>Editar
					</a>
				</td>
			<tr>					
			<?php } ?>
		</table>
		<?php
		include_once "../vistas/foot.php";
	}
}

?>