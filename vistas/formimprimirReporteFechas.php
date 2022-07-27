<?php

class fomrimprmirreportefechas{
	public function fomrimprmirreportefechasShow(){
		include_once "../controlador/ControladorCajero.php";
		$fi = $_GET['fi'];
		$ff = $_GET['ff'];
		?>
		<html>
			<head>
				<title>Menu Principal</title>
				<script src='../js/bootstrap.min.js'></script>
				<link href='../css/bootstrap.min.css' rel='stylesheet'>		
			</head>
			<body >
				<div align="center">
					<hr>
					<?php
						$val = new ControladorCajero();
						$objReporte = $val->imprimirReporte($fi,$ff);			
					?>
					<div >
					<h1 class='col-md-12'>Ventas realizadas entre <?php echo $fi; ?> y <?php echo $ff; ?> </h1>
					<table border='1'>
						<tr>
							<th>Fecha</th>
							<th>Total</th>
						</tr>
					<?php foreach ($objReporte as $objReporte) { ?>
						<tr>
							<td><?php echo $objReporte->getFecha(); ?></td>
							<td>S/<?php echo $objReporte->getTotal(); ?></td>
							</td></td>
							<?php $total += $objReporte->getTotal(); ?>	
						<?php } ?>
						<tr>
							<td><strong>Venta total</strong></td>
							<td><strong>S/<?php echo $total; ?></strong></td>
						</tr>
					</table></div>
					<br><br><hr>
					<a class='btn btn-success' href="../controlador/getCajero.php?view=Reporte" class="btn btn-success">Regresar</a>
					<input type="button" class='btn btn-success' name="imprimir" value="Imprimir" onclick="window.print();">
				</div>
			</body>
		</html>
		<?php
	}
}

?>

