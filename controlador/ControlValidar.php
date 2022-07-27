<?php
session_start();

$u = $_POST['usuario'];

$p = $_POST['clave'];

if ( strlen(trim($u)) != 0 && strlen(trim($p)) != 0 ){

	include_once "../modelo/usuario.php";
	$modelo = new Usuario();
	$r = $modelo->ValidarUsuario($u , md5($p) );

	if ( $r == 1 ){

		include_once "../vistas/formprincipal.php";
		$form = new formprincipal();
		$form->formprincipalShow();

	}else{
		include_once "../vistas/formmensaje.php";
		$mensaje = new formMensaje();
		$mensaje->formMensajeShow("Usuario no encontrado", "../index.php");
	}

}else{
	include_once "../vistas/formmensaje.php";
	$mensaje = new formMensaje();
	$mensaje->formMensajeShow("Usuario o Contraseña vacios", "../index.php");


}








?>