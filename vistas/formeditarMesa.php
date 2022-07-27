<?php
class formeditarmesa{
	public function formeditarmesaShow($id){
		include_once "../controlador/ControladorAdministrador.php";
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		$m = new ControladorAdministrador();
		$objMesaBuscado = $m->formEditarMesa($id);
		?>
		<form action='../controlador/getAdministrador.php?view=EditarMesa' method='POST'>
			<div class='form-group'>
			    <label for='numero_mesa' class='control-label'>Numero de Mesa</label>
			    <input type='hidden' name='idmesa' value='<?php echo $objMesaBuscado->getIdmesa(); ?>'>
			    <input type='text' disabled class='form-control' value='<?php echo $objMesaBuscado->getNum_mesa(); ?>' id='numero_mesa' name='numero_mesa' placeholder='Numero de Mesa'>
			</div>    
			<div class='form-group'>
			    <label for='capacidad' class='control-label'>Capacidad</label>
			    <input type='text' class='form-control' value='<?php echo $objMesaBuscado->getCapacidad(); ?>' id='capacidad' name='capacidad' placeholder='Capacidad'>
			</div>

		<?php if ( $objMesaBuscado->getEstado() == 1){ ?>

			<div class='form-group'>
			        <label for='estado' class='control-label'>Estado</label>
			        <select class='form-control' name='estado' id='estado'>
			            <option selected value='1'>Disponible</option>
			            <option  value='0'>No Disponible</option>			   
			        </select>                    
			    </div>";

		<?php }elseif ($objMesaBuscado->getEstado() == 0) { ?>
			
			<div class='form-group'> 
			    <label for='estado' class='control-label'>Estado</label>
			    <select class='form-control' name='estado' id='estado'>
			        <option value='1'>Disponible</option>
			        <option selected value='0'>No Disponible</option>			   
			    </select>                    
			</div>
		<?php } ?>	                        			                                                           	                            
			<div class='form-group'> 
			    <button type='submit' class='btn btn-primary'>Editar</button>
			</div>   		    
			</form>
		<?php 
		include_once "../vistas/foot.php";
	}
}


?>