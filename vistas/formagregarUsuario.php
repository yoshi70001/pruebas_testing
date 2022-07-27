<?php
class formagregarusuario{
	public function formAgregarusuarioShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
		<form action='../controlador/getAdministrador.php?view=AgregarUsuario' method='POST'>
			    <div class='form-group'>
			        <label for='usuario' class='control-label'>Usuario</label>			  
			        <input type='text' class='form-control' id='usuario' name='usuario' placeholder='usuario'>
			    </div>    

			    <div class='form-group'>
			        <label for='clave' class='control-label'>Contraseña</label>
			        <input type='text' class='form-control'  id='clave' name='clave' placeholder='clave'>
			    </div> 

			    <div class='form-group'>
			        <label for='nombres' class='control-label'>Nombres</label>
			        <input type='text' class='form-control'  id='nombres' name='nombres' placeholder='nombres'>
			    </div>

			    <div class='form-group'>
			        <label for='apellidos' class='control-label'>Apellidos</label>
			        <input type='text' class='form-control'  id='apellidos' name='apellidos' placeholder='apellidos'>
			    </div>

			    <div class='form-group'>
			        <label for='dni' class='control-label'>Dni</label>
			        <input type='text' class='form-control'  id='dni' name='dni' placeholder='dni'>
			    </div>
		<?php 
			include_once "../controlador/ControladorAdministrador.php";
			$control = new ControladorAdministrador();
			$objListadoTipoUsuario = $control->listarTipoUsuario();		
		?>
		<div class='form-group'> 
		        <label for='tipo' class='control-label'>Tipo</label>
		        <select class='form-control' name='tipo' id='tipo'>
		<?php foreach ($objListadoTipoUsuario as $objListadoTipoUsuario) { ?>
		 	<option value="<?php echo $objListadoTipoUsuario->getTipoUsuario(); ?>"><?php echo $objListadoTipoUsuario->getTipo(); ?></option>
		 <?php } ?> 
				</select>                    
		</div>	    
		<div class='form-group'> 
			<button type='submit' class='btn btn-primary'>Agregar</button>
		</div>  	    
		</form>
<?php 
	include_once "../vistas/foot.php";
	}
}
?>