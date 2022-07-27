<?php

class formMensaje{

	public function formMensajeShow($m , $url){
		?>
		<html>
		<head>
			<title>Mensajes</title>
			<link href='../css/bootstrap.min.css' rel='stylesheet'>
		</head>
		<body>		
			<div align='center'>
				<hr>			
				
				<div class="alert alert-success" role="alert">
				  <h2 class="alert-heading"><?php echo $m;?></h2>	 
				  <hr>
				  <p class="mb-0"><a class="btn btn-primary" href='<?php echo $url;?>' role="button">Regresar</a></p>
				</div>	
				<br>

			<div>
		</body>
		<foot>
			
		</foot>
		</html>		
		<?php
	}
}


?>