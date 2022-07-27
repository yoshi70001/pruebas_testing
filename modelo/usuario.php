<?php
include_once "conexion.php";

class Usuario {

	private $idusuario;
	private $usuario;
	private $contraseña;
	private $nombres;
	private $apellidos;
	private $dni;
	private $tipo_usuario;
	private $idestado_usuario;

	public function getIdusuario(){
		return $this->idusuario; 
	}

	public function setIdusuario( $idusuario){
		$this->idusuario = $idusuario;
	}

	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($u){
		$this->usuario = $u;
	}

	public function getContraseña(){
		return $this->contraseña;
	}

	public function setContraseña( $c ){
		$this->contraseña = $c ;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($n){
		$this->nombres = $n;
	}

	public function setApellidos($a){
		$this->apellidos = $a;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setDni($d){
		$this->dni = $d;
	}

	public function getDni(){
		return $this->dni;
	}

	public function setTipo_usuario($t){
		$this->tipo_usuario = $t;
	}

	public function getTipo_usuario(){
		return $this->tipo_usuario;
	}

	public function setEstado_usuario($e){
		$this->idestado_usuario = $e;
	}

	public function getEstado_usuario(){
		return $this->idestado_usuario;
	}

	
	public function ValidarUsuario($u , $p ){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM usuario WHERE usuario='$u' AND clave ='$p'";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		if ( $row = mysqli_fetch_array($resultado) ){

			$_SESSION['usuario'] = $row[1];
			$_SESSION['contraseña'] =$row[2];
			$_SESSION['nombres'] = $row[3];
			$_SESSION['apellidos'] =$row[4];
			$_SESSION['tipo_usuario'] =$row[6];

			return 1;

		}else{

			return 0;
			
		}
		
	}

	public function BuscarUsuario($id){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM usuario WHERE idusuario=$id";

		$resultado = mysqli_query($con,$sql);

		$user = new Usuario();

		if ( $row = mysqli_fetch_array($resultado) ){


			$user->setIdusuario($row['idusuario']);
			$user->setUsuario($row['usuario']);
			$user->setContraseña($row['clave']);
			$user->setNombres($row['nombres']);
			$user->setApellidos($row['apellidos']);
			$user->setDni($row['dni']);
			$user->setTipo_usuario($row['idtipo_usuario']);
			$user->setEstado_usuario($row['estado']);

		}

		return $user;
		
	}

	public function agregarUsuario($u , $c , $n , $a , $d , $tipo ){

		$con = Conexion::obtenerConexion();

		$sql = "INSERT INTO usuario ( usuario , clave , nombres , apellidos , dni , idtipo_usuario , estado) VALUES ( '$u' , '$c' , '$n' , '$a' , '$d' , '$tipo' , 1  ) ";
		
		$resultado = mysqli_query($con,$sql);

		return $resultado;

	}

	public function editarUsuario($u,$c,$n,$a,$e,$id){

		$con = Conexion::obtenerConexion();

		$sql = "UPDATE usuario SET usuario ='$u' , clave='$c' , nombres='$n' , apellidos='$a' , estado='$e' WHERE idusuario='$id' ";

		$resultado = mysqli_query($con,$sql);

		return $resultado;

	}

	public function existeDNI($dni){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT dni FROM usuario WHERE dni= '$dni' ";

		$resultado = mysqli_query($con,$sql);

		$bandera = 0;

		if ( $row = mysqli_fetch_array($resultado)  ){

			$bandera = 1;
		}	
		
		// DEVUELVE 0 SI NO EXISTE EL DNI DE LO CONTRARIO 1;

		return $bandera;
	}


	public function listarUsuario(){

		$con = Conexion::obtenerConexion();

		$sql = "SELECT * FROM usuario";

		$resultado = mysqli_query($con,$sql);

		$datos = array();

		while ( $row = mysqli_fetch_array($resultado) ){

			$user = new Usuario();

			$user->setIdusuario($row[0]);
			$user->setUsuario($row[1]);
			$user->setContraseña($row[2]);
			$user->setNombres($row[3]);
			$user->setApellidos($row[4]);
			$user->setDni($row[5]);
			$user->setTipo_usuario($row[6]);
			$user->setEstado_usuario($row[7]);

			array_push($datos, $user);

		}

		return $datos;
				
	}


}

?>