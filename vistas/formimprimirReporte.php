<?php
include_once "../controlador/ControladorCajero.php";
?>

<html>
	<head>
		<title>Menu Principal</title>
		<script src='../js/bootstrap.min.js'></script>
		<link href='../css/bootstrap.min.css' rel='stylesheet'>
		
	</head>
	<body onLoad="window.print()">
		<div id="h">		
			<?php
				$val = new ControladorCajero();
				$objReporte = $val->imprimirReporte();			
			?>	
			<div>
				<h1 class='col-md-12'>Ventas realizadas entre <?php echo $fechainicial; ?> y <?php echo $fechafinal; ?> </h1>
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
		</div>
	</body>


</html>