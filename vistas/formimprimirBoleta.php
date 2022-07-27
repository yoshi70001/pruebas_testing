<?php

class formimprimirboleta{
	public function formimprimirboletaShow(){
		date_default_timezone_set('America/Lima');
	    $f = date('Y-m-d');
		include_once "../controlador/ControladorCajero.php";
		$id = $_GET['id'];
		$val = new ControladorCajero();
		$objComandaBuscado = $val->listarDetallesBoleta($id);
		?>
		<!-- -->
		<!DOCTYPE html>
		<html lang="es">
		<head>
		<meta charset="UTF-8">
		<title>Emitir Boleta</title>
		<link rel="stylesheet" href="../css/main.css">
		</head>
		<body>
		<div class="control-bar">
		<div class="container">
		<div class="row">
		<div class="col-2-4">
		<div class="slogan">Boleta </div>
		</div>
		<div class="col-4 text-right">
		<a href="../controlador/getCajero.php?view=GestionarBoleta" class="btn btn-success">Regresar</a>	
		<a href="javascript:window.print()">Imprimir</a>
		</div>
		</div>
		</div>
		</div>
		<header class="row">
		<div class="logoholder text-center">
		<img width="90" height="90" src="../imagenes/logo.png">
		</div>
		<div class="me">
		<p >
		<strong>Cevicheria Mamá cuchara papa tenedor</strong><br>
		Av. Alameda Sur, Bello Horizonte<br>
		Chorrillos, Lima 15067.<br>
		</p>
		</div>
		<div class="bank">

		</div>
		</header>
		<div class="row section">
		<div class="col-2">
		<h1 >Boleta</h1>
		</div>
		<div class="col-2 text-right details">
		<p >
		<strong>Fecha: <?php echo $f; ?></strong><br>
		<strong>RUC 100067907791</strong>
		</div>
		</div>
		<div class="row section" style="margin-top:-1rem">
		<div class="col-1">
		</div>
		</div>
		<div class="invoicelist-body">
		<table>
		<thead >
		<th width="35%">Platillo</th>
		<th width="10%">Cant.</th>
		<th width="25%">Precio</th>
		<th class="taxrelated">Subtotal</th>
		</thead>
		<tbody>
		<?php foreach ($objComandaBuscado as $objComandaBuscado ) { ?>
			<tr>
				<td><?php echo $objComandaBuscado->getProducto(); ?></td>
				<td><?php echo $objComandaBuscado->getCantidad(); ?></td>
				<td>S/<?php echo $objComandaBuscado->getPrecio(); ?></td>
				<td>S/<?php echo $objComandaBuscado->getSubtotal(); ?></td>			
			</tr>
		<?php $total +=$objComandaBuscado->getSubtotal(); ?>		
		<?php } ?>	
		</tbody>
		</table>
		</div>
		<div class="invoicelist-footer">
		<table >
		<tr class="taxrelated">
		</tr>
		<tr>
		<td><strong>Total:</strong></td>
		<td id="total_price"><?php echo $total;?></td>
		</tr>
		</table>
		</div>
		<footer class="row">

		</footer>

		<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
		<script src="assets/js/main.js"></script>
		</body>
		</html>

		<!-- -->
		
		<?php
	}
}

?>
