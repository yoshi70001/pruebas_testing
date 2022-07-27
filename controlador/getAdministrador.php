<?php

$view = $_GET['view'];

switch ($view){

	case 'GestionarMesas':
		session_start();
		include_once "../vistas/formmesa.php";
		$form = new formmesa();
		$form->formmesaShow();
		break;

	case 'VistaAgregarMesa':
		session_start();
		include_once "../vistas/formagregarMesa.php";
		$form = new formagregarmesa();
		$form->formagregarmesaShow();
		break;

	case 'AgregarMesa':
		session_start();
		$n = $_POST['numero_mesa'];
		$c = $_POST['capacidad'];
		if ( $c > 0 && $n > 0 ){
				include_once "../modelo/mesa.php";
				$m = new Mesa();
				$m->agregarMesa($n,$c);

				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Mesa agregada correctamente", "getAdministrador.php?view=GestionarMesas");
		}else{
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al agregar la mesa -> solos valores positivos", "getAdministrador.php?view=GestionarMesas");
		}		

		break;

	case 'VistaEditarMesa':
		session_start();
		include_once "../vistas/formeditarMesa.php";
		$id = $_GET['id'];
		$form = new formeditarmesa();
		$form->formeditarmesaShow($id);
		break;
	
	case 'EditarMesa':
		session_start();
		$n = $_POST['numero_mesa'];
		$c = $_POST['capacidad'];
		$e = $_POST['estado'];
		$id = $_POST['idmesa'];

		if ( is_numeric($c) ){

			if ( $c > 0 ){
				include_once "../modelo/mesa.php";
				$m = new Mesa();
				$m->editarMesa($c , $e , $id );
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Mesa editada correctamente", "getAdministrador.php?view=GestionarMesas");
			}else{
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al editar la mesa -> solo valores positivos ", "getAdministrador.php?view=GestionarMesas");
			}
			
		}else{
			include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al editar la mesa -> campos vacios / solo valores numericos ", "getAdministrador.php?view=GestionarMesas");
		}

		break;

	case 'GestionarPlatillos':
		session_start();
		include_once "../vistas/formplatillo.php";
		$form = new formplatillo();
		$form->formplatilloShow();
		break;	

	case 'VistaAgregarPlatillo':
		session_start();
		include_once "../vistas/formagregarPlatillo.php";
		$form = new formagregarplatillo();
		$form->formagregarplatilloShow();
		break;	

	case 'AgregarPlatillo':
		$n = $_POST['nombre_platillo'];
		$d = $_POST['descripcion'];
		$pre = $_POST['precio'];

		if ( strlen($n) > 4 && strlen($d) > 4 && strlen($pre) ){
			if ( $pre > 0 ){
				include_once "../modelo/platillo.php";
				$p = new Platillo();
				$p->agregarPlatillo($n ,$d , $pre );
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Se agrego el platillo con exito ", "getAdministrador.php?view=GestionarPlatillos");
			}else{
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al agregar el platillo -> el precio no puede ser negativo", "getAdministrador.php?view=GestionarPlatillos");
			}
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al agregar el platillo -> longitud no aceptada  ", "getAdministrador.php?view=GestionarPlatillos");
		}
		break;

	case 'VistaEditarPlatillo':
		session_start();
		include_once "../vistas/formeditarplatillo.php";
		$id = $_GET['id'];
		$form = new formeditarplatillo();
		$form->formeditarplatilloShow($id);
		break;

	case 'EditarPlatillo':
		$n = $_POST['nombre_platillo'];
		$d = $_POST['descripcion'];
		$pre = $_POST['precio'];
		$id = $_POST['idplatillo'];

		if ( strlen($n) > 4 && strlen($d) > 4 && is_numeric($pre) ){
			if ( $pre > 0 ){
				include_once "../modelo/platillo.php";
				$p = new Platillo();
				$p->editarPlatillo($n ,$d , $pre ,$id);
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Se edito el platillo con exito", "getAdministrador.php?view=GestionarPlatillos");
			}else{
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al editar el platillo -> el precio no puede ser negativo ", "getAdministrador.php?view=GestionarPlatillos");
			}
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al editar el platillo -> longitud no aceptada ", "getAdministrador.php?view=GestionarPlatillos");
		}
		break;

	case 'buscarplatillo':
		session_start();	
		include_once "../vistas/formbuscarplatillo.php";
		$nombre = $_POST['buscarplatillo'];
		if ( strlen($nombre) > 0 ){
			$form = new formbuscarplatillo();
			$form->formbuscarplatilloShow($nombre);
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("No ingreso el nombre de un platillo","getAdministrador.php?view=GestionarPlatillos");
		}
		
		break;	

	case 'GestionarUsuarios':
		session_start();
		include_once "../vistas/formusuario.php";
		$form = new formusuario();
		$form->formusuarioShow();
		break;	

	case 'VistaAgregarUsuario':
		session_start();
		include_once "../vistas/formagregarusuario.php";
		$form = new formagregarusuario();
		$form->formAgregarusuarioShow();
		break;

	case 'AgregarUsuario':
		$u = $_POST['usuario'];
		$c = $_POST['clave'];
		$n = $_POST['nombres'];
		$a = $_POST['apellidos'];
		$d = $_POST['dni'];
		$t = $_POST['tipo'];

		if ( strlen($u) != 0 && strlen($c) != 0 && strlen($n) != 0 && strlen($a) != 0 && strlen($d) != 0  ){
			if (  strlen($u) > 4 && strlen($c) > 4 ){
				if ( strlen($n) > 4 && strlen($a) > 4  ){
					if (  strlen($d) == 8 ) {
						include_once "../modelo/usuario.php";
						$usuario = new Usuario();
						if ( $usuario->existeDNI($d) == 0 ){
							$usuario->agregarUsuario($u,md5($c),$n,$a,$d,$t);	
							include_once "../vistas/formmensaje.php";
							$mensaje = new formMensaje();
							$mensaje->formMensajeShow("Usuario agregado correctamente", "getAdministrador.php?view=GestionarUsuarios");		
						}else{
							include_once "../vistas/formmensaje.php";
							$mensaje = new formMensaje();
							$mensaje->formMensajeShow("Error al agregar el usuario -> el dni esta en uso ", "getAdministrador.php?view=GestionarUsuarios");
						}
					}else{
						include_once "../vistas/formmensaje.php";
						$mensaje = new CC_MenformMensajesaje();
						$mensaje->formMensajeShow("Error al agregar el usuario -> el dni no es valido ", "getAdministrador.php?view=GestionarUsuarios");
					}	
				}else{
					include_once "../vistas/formmensaje.php";
					$mensaje = new formMensaje();
					$mensaje->formMensajeShow("Error al agregar el usuario -> Nombres o apellidos son muy cortos", "getAdministrador.php?view=GestionarUsuarios");
				}
			}else{
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al agregar el usuario -> el usuario o la clave son invalidos", "getAdministrador.php?view=GestionarUsuarios");
			}
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al agregar el usuario -> no ha introducido nada en los campos obligatorios", "getAdministrador.php?view=GestionarUsuarios");
		}
		break;	

	case 'VistaEditarUsuario':
		session_start();
		include_once "../vistas/formeditarusuario.php";
		$id = $_GET['id'];
		$form = new formeditarusuario();
		$form->formeditarusuarioShow($id);
		break;	

	case 'EditarUsuario':
		$id = $_POST['idusuario'];
		$u = $_POST['usuario'];
		$c = $_POST['clave'];
		$n = $_POST['nombres'];
		$a = $_POST['apellidos'];
		$e = $_POST['estado'];		
		if ( strlen($u) != 0 && strlen($c) != 0 && strlen($n) != 0 && strlen($a) != 0  ){
			if (  strlen($u) > 4 && strlen($c) > 4 ){
				if ( strlen($n) > 4 && strlen($a) > 4  ){	
						include_once "../modelo/usuario.php";			
						$usuario = new Usuario();
						$usuario->editarUsuario($u,md5($c),$n,$a,$e,$id);
						include_once "../vistas/formmensaje.php";
						$mensaje = new formMensaje();
						$mensaje->formMensajeShow("Actualizacion completada del usuario", "getAdministrador.php?view=GestionarUsuarios");
				}else{
					include_once "../vistas/formmensaje.php";
					$mensaje = new formMensaje();
					$mensaje->formMensajeShow("Error al editar el usuario -> Nombres o apellidos son muy cortos", "getAdministrador.php?view=GestionarUsuarios");
				}	
			}else{
				include_once "../vistas/formmensaje.php";
				$mensaje = new formMensaje();
				$mensaje->formMensajeShow("Error al editar el usuario -> el usuario o la clave son invalidos", "getAdministrador.php?view=GestionarUsuarios");
			}
		}else{
			include_once "../vistas/formmensaje.php";
			$mensaje = new formMensaje();
			$mensaje->formMensajeShow("Error al editar el usuario -> no ha introducido nada en los campos obligatorios", "getAdministrador.php?view=GestionarUsuarios");
		}
		break;	

	case 'CerrarSesion':
		session_start();
		unset($_SESSION["usuario"]); 
		session_destroy();
		include_once "../modelo/conexion.php";
		$con = Conexion::obtenerConexion();	
		unset($con);
		header("Location: ../index.php");			
}

?>