<?php
	include "session.php";
	include "funciones.php";

	if(isset($_GET['verTodos'])){
		$verTodos = $_GET['verTodos'];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargar Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="estilospanel.css">
    <script src="js/jquery.js"></script>
    <script>
    	$(document).ready(function(){

    		$(".eliminar").click(function(){
    			$(this).html("¿Anular?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("anularRecibo.php",codigo,function(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Anulado'){
    						location.reload();
    					}else{
    						alert("ERROR");
    					}
    				});
	    		});
    		});

    		$(".verMas").click(function(){
    			var id = $(this).attr("id");
	    		window.open('recibo.php?id='+id,'_blank');
    		});
    		
    	});


    </script>
</head>

<body>
	<?php 
		include "conecto.php"; 
	?>
	
	<div class="lateral">
		<?php
			include "modificar/logoInside.php";
		?> 
		<hr>
		<?php
			$tipoUsuario= getTipoUsuario($login_session);
			switch ($tipoUsuario) {
						case 0:
							include "modificar/menu0.php";
							break;
						case 1:
							include "modificar/menu1.php";
							break;
						default:
							include "modificar/menu2.php";
							break;
					}
			
		?>
		
	</div>
	<div class="principal">
		<div class="superior">
			<?php include "modificar/superior.php"; ?>
		</div>
		<div id="listado" class="contenido">
			<div class="row">
				<h1 align="center">
					Listado de Recibos
				</h1>
			</div>
			<div class="row">
				<?php
					if(getTipoUsuario($_SESSION['login_user'])!='0'){
						$sql = "SELECT nroRecibo, anulado, username, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM recibo WHERE username = '".$_SESSION['login_user']."' ORDER BY nroRecibo DESC";
					}else{
						$sql = "SELECT nroRecibo, anulado, username, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM recibo ORDER BY nroRecibo DESC";
					}
					if(!isset($verTodos)){
						$sql .= " LIMIT 20";
					}
					$resultado = mysqli_query($conexion,$sql);
					echo"
						<div class='row'>

							<div class='col-sm-2'>
								<h2 align='center'>
									# Recibo
								</h2>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									Fecha
								</h2>
							</div>
							<div class='col-sm-3'>
								<h2 align='center'>
									Cliente
								</h2>
							</div>
							<div class='col-sm-3'>
								<h2 align='center'>
									Responsable
								</h2>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									Acciones
								</h2>
							</div>
						</div>
						";
					while($recibo = mysqli_fetch_assoc($resultado)){
						$idRecibo = $recibo['nroRecibo'];
						$sqli="SELECT idCliente FROM cobro WHERE nroRecibo = '$idRecibo'";
						$resultadoi = mysqli_query($conexion,$sqli);
						$cliente = mysqli_fetch_assoc($resultadoi);
						$idCliente = $cliente['idCliente'];		
						if($recibo['anulado']== 0){
							echo"
								<div class='row'>
									<div class='col-sm-2'>
										<p align='center' class='listadoClientes'>
											".$recibo['nroRecibo']."
										</p>
									</div>
									
									<div class='col-sm-2'>
										<p align='center' class='listadoClientes'>
											".$recibo['fecha']."
										</p>
									</div>
									<div class='col-sm-3'>
										<p align='center' class='listadoClientes'>
											".getNombreApellido($idCliente)."
										</p>
									</div>
									<div class='col-sm-3'>
										<p align='center' class='listadoClientes'>
											".$recibo['username']."
										</p>
									</div>
									<div class='col-sm-2'>
										<p align='center'>
											<a class='verMas' href='#' id='".$recibo['nroRecibo']."'>
												<img src='img/mas.png' width='25px' alt='Ver Más'>
											</a>";
											if(getTipoUsuario($_SESSION['login_user'])=='0'){
											echo"
												<a class='eliminar' href='#' id='".$recibo['nroRecibo']."'>
													<img src='img/cross.png' width='25px' alt='Eliminar'>
												</a>";
											}
											echo"
										</p>
									</div>
								</div>
							";
						}else{
							echo"
								<div class='row'>
									<div class='col-sm-2'>
										<p align='center' class='listadoClientes'>
											".$recibo['nroRecibo']."
										</p>
									</div>
									<div class='col-sm-2'>
										<p align='center' class='listadoClientes'>
											".$recibo['fecha']."
										</p>
									</div>
									<div class='col-sm-3'>
										<p align='center' class='listadoClientes'>
											ANULADO
										</p>
									</div>
									<div class='col-sm-3'>
										<p align='center' class='listadoClientes'>
											".$recibo['username']."
										</p>
									</div>
									<div class='col-sm-2'>
										<p align='center'>
											<a class='verMas' href='#' id='".$recibo['nroRecibo']."'>
												<img src='img/mas.png' width='25px' alt='Ver Más'>
											</a>
										</p>
									</div>
								</div>
							";
						}
						
					}
				?>
			</div>
			<?php
				if(!isset($verTodos)){
					echo"
						<div class='row'>
							<p align='center'>
								<a href='recibos.php?verTodos=1' class='btn btn-primary'>Ver Todos</a>
							</p>
						</div>
					";
				}
			?>
			
		</div>
		
		<div class="inferior">
			<h4 align="right">
	    		<a target="_blank" class="footer" href="http://www.dulio.com.ar">&copy; 2016 - DWD (Dulio Web Design)</a>
	    	</h4>
		</div>
	</div>
    
    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
