<?php

class formreportes{
	public function formreportesShow(){
		include_once "../vistas/head.php";
		include_once "../vistas/body.php";
		?>
		<div class='row'  >
			<h2 class='col-md-12'>Buscar Venta</h2>
			<form method='POST' class='col-md-4' action='../controlador/getCajero.php?view=BuscarReporte'>
					<table>
						<tr>
							<th class='col-md-4'>Fecha Inicio</th>
							<td class='col-md-4'><input type='date' name='finicio'></td>
						</tr>
						<tr>
							<th class='col-md-4'>Fecha Final</th>
							<td class='col-md-4'><input type='date' name='ffinal'></td>
						</tr>
						<tr>
							<th class='col-md-4'><input type='submit' value='Buscar'></th>
							<td></td>
						</tr>
					</table>	
			</form>
		</div>
		<?php
		include_once "../vistas/foot.php";
	}
}


?>