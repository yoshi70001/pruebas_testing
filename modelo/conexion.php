<?php

class Conexion
{
	static private $instancia = null;

	static public function obtenerConexion()
	{
		if ( self::$instancia == null )
		{
			self::$instancia = new mysqli("bndodas9y3zvfrxpyfpj-mysql.services.clever-cloud.com",
			"uae3ldlksdmzqlkj","PqbL2aFD0A8gwtqAj7oL","bndodas9y3zvfrxpyfpj");
		}

		return self::$instancia;
	}
}

?>