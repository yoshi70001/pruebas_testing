<?php
class ControladorMesero{

	//METODO PARA CREAR LA COMANDA

	public function crear($id){
		include_once "../modelo/comanda.php";
		$modelo = new Comanda();
		$objComanda = $modelo->crearComanda($id);
	}

	//METODO PARA LISTAR TODOS LOS PLATILLOS

	public function listarPlatillosC(){
		include_once "../modelo/platillo.php";
		$modelo = new Platillo();
		return $modelo->listarPlatillos();
	}
	// METODO PARA MOSTRAR LOS DETALLES DEL PRODUCTO

	public function verDetalle($idmesa){

		include_once "../modelo/detalle_comanda.php";
		$objDetalle = new DetalleComanda();	
		return $objDetalle->VerDetalleComanda($idmesa);
	}

	public function ListarMesas(){

		include_once "../modelo/mesa.php";
		$modelo = new Mesa();
		$objListadoMesa = $modelo->VerListadoMesa();
		$c = 1;
		$d = 1;
		foreach ($objListadoMesa as $objListadoMesa) {

			if (  $d ==  2*$c-1  ){
				echo "<div class='row'>";
				$c = $c + 2 ;  
			}			
			echo   "<div class='card container' style='width: 18rem;'>
						<div class='card-body'>
						<h5 class='card-title'>Mesa ".$objListadoMesa->getNum_mesa()."</h5>";

			if ( $objListadoMesa->getEstado() == 1 ){

				echo "<p class='text-success'>Disponible</p>";	

			}else{

				echo "<p class='text-danger'>No Disponible </p>";

			}			    

			echo"	<p>Capacidad: ".$objListadoMesa->getCapacidad()." personas</p>
						<form action='../controlador/getMesero.php?id=".$objListadoMesa->getNum_mesa()."&view=CrearComanda' method='POST'>
							<input type='submit' class='btn btn-primary' value='Agregar Comanda'>
						</form>
						<p></p>
						</div>
					</div>";				
			
			if ($d % 4 == 0 ){

				echo "</div><br><br>";
			}   
				
			$d++;								
		}

	}

}
?>