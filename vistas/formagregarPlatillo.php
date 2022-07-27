<?php

class formagregarplatillo{
	public function formagregarplatilloShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
			<form action='../controlador/getAdministrador.php?view=AgregarPlatillo' method='POST'>
			    <div class='form-group'>
			        <label for='nombre_platillo' class='control-label'>Nombre Platillo</label>			  
			        <input type='text' class='form-control' id='nombre_platillo' name='nombre_platillo' placeholder='Nombre Platillo'>
			    </div>    

			    <div class='form-group'>
			        <label for='descripcion' class='control-label'>Descripcion</label>
			        <input type='text' class='form-control'  id='descripcion' name='descripcion' placeholder='Descripcion'>
			    </div>  

			     <div class='form-group'>
			        <label for='precio' class='control-label'>Precio</label>
			        <input type='text' class='form-control'  id='precio' name='precio' placeholder='Precio'>
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