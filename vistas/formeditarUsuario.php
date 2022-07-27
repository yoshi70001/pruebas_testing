<?php

class formeditarusuario{
	public function formeditarusuarioShow($id){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		include_once "../controlador/ControladorAdministrador.php";
		$usuario = new ControladorAdministrador();
		$usuario->formEditarUsuario($id);
		?>
		<form action='../controlador/getAdministrador.php?view=EditarUsuario' method='POST'>
			 <div class='form-group'>
			    <label for='usuario' class='control-label'>Usuario</label>
			        <input type='hidden' name='idusuario' value='<?php echo $objUsuarioBuscado->getIdusuario(); ?>'>			  
			        <input type='text' class='form-control' id='usuario' name='usuario' value='<?php echo $objUsuarioBuscado->getUsuario(); ?>'>
			    </div>    

			    <div class='form-group'>
			        <label for='clave' class='control-label'>Contraseña</label>
			        <input type='text' class='form-control'  id='clave' name='clave' value='<?php echo $objUsuarioBuscado->getContraseña(); ?>'>
			    </div> 

			    <div class='form-group'>
			        <label for='nombres' class='control-label'>Nombres</label>
			        <input type='text' class='form-control'  id='nombres' name='nombres' value='<?php echo $objUsuarioBuscado->getNombres(); ?>'>
			    </div>

			    <div class='form-group'>
			        <label for='apellidos' class='control-label'>Apellidos</label>
			        <input type='text' class='form-control'  id='apellidos' name='apellidos' value='<?php echo $objUsuarioBuscado->getApellidos(); ?>'>
			    </div>

			    <div class='form-group'>
			        <label for='dni' class='control-label'>Dni</label>
			        <input type='text' disabled class='form-control'  id='dni' name='dni' value='<?php echo $objUsuarioBuscado->getDni(); ?>'>
			    </div>   

		<?php if ( $objUsuarioBuscado->getEstado_usuario() == 1) { ?>

			<div class='form-group'> 
		        	<label for='estado' class='control-label'>Estado</label>
		        	<select class='form-control' name='estado' id='estado'>
		        		<option selected value='1'>Activo</option>
		        		<option value='0'>Desactivado</option>	
		        	</select>

		<?php }elseif ($objUsuarioBuscado->getEstado_usuario() == 0) { ?>
			
			<div class='form-group'> 
		        	<label for='estado' class='control-label'>Estado</label>
		        	<select class='form-control' name='estado' id='estado'>
		        		<option value='1'>Activo</option>
		        		<option selected value='0'>Desactivado</option>	
		        	</select>

		<?php } ?> 

			<br><div class='form-group'> 
			        <button type='submit' class='btn btn-primary'>Editar</button>
			    </div> 	    
			</form>
		<?php 
		include_once "../vistas/foot.php";
	}
}

?>