
		<body>
			    <nav class='navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0'>
			      <a class='navbar-brand col-sm-3 col-md-2 mr-0' href='#'>Cevicheria</a>
			     
			      <ul class='navbar-nav px-3'>
			        <li class='nav-item text-nowrap'>
			          <a class='nav-link' href='../controlador/getAdministrador.php?view=CerrarSesion'>Cerrar Sesion</a>
			        </li>
			      </ul>
			    </nav>

			    <div class='container-fluid'>
			      <div class='row'>
			        <nav class='col-md-2 d-none d-md-block bg-light sidebar'>
			          <div class='sidebar-sticky'>
			            <ul class='nav flex-column'>
			              <li class='nav-item'>
			                <a class='nav-link active' href='../controlador/getMesero.php?view=Inicio'>
			                  <span data-feather='home'></span>
			                  Inicio <span class='sr-only'>(current)</span>
			                </a>
			              </li>
		<?php	              
		if ( $_SESSION['tipo_usuario'] == 1 ){
		?>	
			<li class='nav-item'>
			            <a class='nav-link' href='../controlador/getAdministrador.php?view=GestionarMesas'>
			                <span data-feather='file-text'></span>
			                Gestionar Mesas
			            </a>
			        </li>
			        <li class='nav-item'>
			            <a class='nav-link' href='../controlador/getAdministrador.php?view=GestionarPlatillos'>
			                <span data-feather='file-text'></span>
			                Gestionar Platillos
			            </a>
			        </li>
			        <li class='nav-item'>
			            <a class='nav-link' href='../controlador/getAdministrador.php?view=GestionarUsuarios'>
			                <span data-feather='file-text'></span>
			                Gestionar Usuarios
			            </a>
			        </li>
		<?php	        
		}if ($_SESSION['tipo_usuario'] == 2 || $_SESSION['tipo_usuario'] == 1 ) {
		?>	
			<li class='nav-item'>
			    <a class='nav-link' href='../controlador/getMesero.php?view=ventas'>
			        <span data-feather='file'></span>Ventas
			    </a>
			</li>
		<?php	       
		}if ($_SESSION['tipo_usuario'] == 3 || $_SESSION['tipo_usuario'] == 1 ) {
		?>	
			<li class='nav-item'>
			           <a class='nav-link' href='../controlador/getCajero.php?view=GestionarProformas'>
			                  <span data-feather='shopping-cart'></span>
			                  Gestionar Proformas
			                </a>
			</li>
			<li class='nav-item'>
			                <a class='nav-link' href='../controlador/getCajero.php?view=GestionarBoleta'>
			                  <span data-feather='shopping-cart'></span>
			                  Gestionar Boletas
			                </a>
			</li>
			<li class='nav-item'>
			                <a class='nav-link' href='../controlador/getCajero.php?view=Reporte'>
			                  <span data-feather='shopping-cart'></span>
			                  Reportes
			                </a>
			</li>
		<?php
		}if ($_SESSION['tipo_usuario'] == 4 || $_SESSION['tipo_usuario'] == 1 ) {		
		?>	
			<li class='nav-item'>
			           <a class='nav-link' href='../controlador/getAlmacenero.php?view=GestionarInsumos'>
			                  <span data-feather='shopping-cart'></span>
			                  Gestionar Insumos
			                </a>
			</li>
		<?php	
		 }		 
		?>  </ul>           
			 </div>
			        </nav>
			        <main role='main' class='col-md-9 ml-sm-auto col-lg-10 pt-3 px-4'>
			          <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom'>
			           <h1 class='h2'> Usuario: <?php echo $_SESSION['usuario']?> </h1>		   
			          </div>