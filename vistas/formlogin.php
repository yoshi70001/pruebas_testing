<?php

class formLogin{

	public function formLoginShow(){

		?>
				<html lang='es'>
				  <head>
				    <meta charset='utf-8'>
				    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
				    <meta name='description' content=''>
				    <meta name='author' content=''>
				    <link rel='icon' href='/docs/4.0/assets/img/favicons/favicon.ico'>

				    <title>Iniciar Sesion</title>
				    <link href='css/bootstrap.min.css' rel='stylesheet'>

				    <link href='css/signin.css' rel='stylesheet'>
				  </head>

				  <body class='text-center'>
				    <form class='form-signin' id='formulario-login' method='POST' action='controlador/ControlValidar.php'>
				      <img class='mb-4' src='https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg' alt='' width='72' height='72'>
				      <h1 class='h3 mb-3 font-weight-normal'>Iniciar Sesion</h1>
				      <label for='usuario' class='sr-only'>Usuario</label>
				      <input type='text' id='usuario' name='usuario' class='form-control' placeholder='Usuario' autofocus>
				      <label for='clave' class='sr-only'>Contraseña</label>
				      <input type='password' id='clave' name='clave' class='form-control' placeholder='Clave'>
				 
				      <button class='btn btn-lg btn-primary btn-block' type='submit'>Iniciar Sesion</button>
				      
				      <p class='mt-5 mb-3 text-muted'>&copy; 2022</p>
				    </form>
				  </body>
				</html>
		<?php
	}
}

?>