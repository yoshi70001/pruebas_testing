<?php

class formagregarmesa{

	public function formagregarmesaShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
			<form action='../controlador/getAdministrador.php?view=AgregarMesa' method='POST'>
			    <div class='form-group'>
			        <label for='numero_mesa' class='control-label'>Numero de Mesa</label>			  
			        <input type='text' class='form-control' id='numero_mesa' name='numero_mesa' >
			    </div>    

			    <div class='form-group'>
			        <label for='capacidad' class='control-label'>Capacidad</label>
			        <input type='number' class='form-control'  id='capacidad' name='capacidad' placeholder='Capacidad'>
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