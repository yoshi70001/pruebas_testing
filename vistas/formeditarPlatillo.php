<?php
class formeditarplatillo{
	public function formeditarplatilloShow($id){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		include_once "../controlador/ControladorAdministrador.php";
		$m = new ControladorAdministrador();
		$objPlatilloBuscado = $m->EditarPlatillo($id);
		?>
		<form action='../controlador/getAdministrador.php?view=EditarPlatillo' method='POST'>
			    <div class='form-group'>
			        <label for='nombre_platillo' class='control-label'>Nombre Platillo</label>
			        <input type='hidden' name='idplatillo' value='<?php echo $objPlatilloBuscado->getPlatillo(); ?>'>			  
			        <input type='text' class='form-control' id='nombre_platillo' value='<?php echo $objPlatilloBuscado->getNombrePlatillo(); ?>' name='nombre_platillo' placeholder='Nombre Platillo'>
			    </div>    

			    <div class='form-group'>
			        <label for='descripcion' class='control-label'>Descripcion</label>
			        <input type='text' class='form-control'  id='descripcion' value='<?php echo $objPlatilloBuscado->getDescripcion(); ?>' name='descripcion' placeholder='Descripcion'>
			    </div>  

			     <div class='form-group'>
			        <label for='precio' class='control-label'>Precio</label>
			        <input type='text' class='form-control'  id='precio' value='<?php echo $objPlatilloBuscado->getPrecio(); ?>' name='precio' placeholder='Precio'>
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