<?php
class formagregarinsumo{
	public function formagregarinsumoShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
		<form action='../controlador/getAlmacenero.php?view=AgregarInsumo' method='POST'>
			    <div class='form-group'>
			        <label for='nombre_insumo' class='control-label'>Nombre Insumo</label>			  
			        <input type='text' class='form-control' id='nombre_insumo' name='nombre_insumo' placeholder='Nombre Insumo'>
			    </div>    
			    <div class='form-group'>
			        <label for='cantidad' class='control-label'>Cantidad</label>
			        <input type='text' class='form-control'  id='cantidad' name='cantidad' placeholder='Cantidad'>
			    </div>  
			     <div class='form-group'>
			        <label for='unidad' class='control-label'>Unidad</label>
			        <input type='text' class='form-control'  id='unidad' name='unidad' placeholder='kg'>
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