<?php
class formeditarinsumo{
	public function formeditarinsumoShow($id){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		include_once "../controlador/ControladorAlmacenero.php";
		$lista = new ControladorAlmacenero();
		$objInsumoBuscado = $lista->editarInsumo($id);	
		?>
		<form action='../controlador/getAlmacenero.php?view=EditarInsumo' method='POST'>
			<div class='form-group'>
			   	<input type='hidden' name='id' value='<?php echo $objInsumoBuscado->getIdinsumo(); ?>'>
			    <label for='nombre_insumo' class='control-label'>Nombre Insumo</label>			  
			    <input type='text' value='<?php echo $objInsumoBuscado->getNombre(); ?>' class='form-control' id='nombre_insumo' name='nombre_insumo' >
			</div>    
			<div class='form-group'>
			    <label for='cantidad' class='control-label'>Cantidad</label>
			    <input type='text' value='<?php echo $objInsumoBuscado->getCantidad(); ?>' class='form-control'  id='cantidad' name='cantidad' >
			</div>  
			    <div class='form-group'>
			    <label for='unidad' class='control-label'>Unidad</label>
			    <input type='text' value='<?php echo $objInsumoBuscado->getUnidad(); ?>'  class='form-control'  id='unidad' name='unidad' >
			</div>             			                                                           		                            
			<div class='form-group'> 
			    <button type='submit' class='btn btn-primary'>Editar</button>
			</div>   	    
		</form>
		<?php 	
		include_once "../vistas/foot.php";
	}
}

?>