<?php
	include "session.php";
	include "funciones.php";
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
    		$("#modificar").hide();
    		$("#verMas").hide();
    		var parte = window.location.pathname.split( '/' );
    		$("a").each(function(){
    			if( $(this).attr("href")==parte[1] || $(this).attr("href")==parte[2] || $(this).attr("href")==parte[3] || $(this).attr("href")==parte[4] ){
    				$(this).addClass("activated");
    			}
    		});

    		$(".eliminar").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("eliminarCliente.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}
    				});
	    		});
    		});

    		$(".monto").keypress(function(e){

    			if(e.which!=46 &&(e.which<48 || e.which>57)){
    				return false;
    			}
    		});

    		$(".modificar").click(function(){
    			var codigo = {
    				id : $(this).attr("id")
    			}
	    		$.get("modificarCliente.php",codigo,imprimirModificacionCliente);
    		});

    		$(".verMas").click(function(){
    			var codigo = {
    				id : $(this).attr("id")
    			}
	    		$.get("verInfoCliente.php",codigo,imprimirInfoCliente);
    		});

    		$(".back").click(function(){
    			location.reload();
    		});
    		
    	});

		function imprimirInfoCliente(html){
			$("#listado").fadeOut(1);
			$("#verMas").append(html).fadeIn(1000);
    	}

		function imprimirModificacionCliente(html){
			$("#listado").fadeOut(1);
			$("#modificar").append(html).fadeIn(1000);
			$("#cuit").keypress(function(e){
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    			if($(this).val().length==2){
    				$(this).val($(this).val()+'-');
    			}else if($(this).val().length==11){
    				$(this).val($(this).val()+'-');
    			}
    		});
    		$(".telefono").keypress(function(e){
    			if(e.which==45){

    			}else if(e.which<48 || e.which>57){
    				return false;
    			}
    		});
    		$("#fechaNacimiento").keypress(function(e){
    			if($(this).val().length==2){
    				$(this).val($(this).val()+'/');
    			}else if($(this).val().length==5){
    				$(this).val($(this).val()+'/');
    			}
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    		});
		}

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
					Listado de clientes
				</h1>
			</div>
			<div class="row">
				<?php
					$sql = "SELECT * FROM cliente WHERE habilitado = 1 ORDER BY idCliente";
					$resultado = mysqli_query($conexion,$sql);
					echo"
						<div class='row'>
							<div class='col-sm-1'>
								<p align='center'>
								</p>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									ID
								</h2>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									Apellido
								</h2>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									Nombre
								</h2>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									CUIT
								</h2>
							</div>
							<div class='col-sm-2'>
								<h2 align='center'>
									Acciones
								</h2>
							</div>
							<div class='col-sm-1'>
								<p align='center'>
								</p>
							</div>
						</div>
						";
					while($clientes = mysqli_fetch_assoc($resultado)){
						$cuit = $clientes['CUIT'];
						$cuitAimprimir = $cuit[0].$cuit[1]."-".$cuit[2].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9]."-".$cuit[10];
						echo"
							<div class='row'>
								<div class='col-sm-1'>
									<p align='center'>
									</p>
								</div>
								<div class='col-sm-2'>
									<p align='center' class='listadoClientes'>
										".$clientes['idCliente']."
									</p>
								</div>
								
								<div class='col-sm-2'>
									<p align='center' class='listadoClientes'>
										".$clientes['apellido']."
									</p>
								</div>
								<div class='col-sm-2'>
									<p align='center' class='listadoClientes'>
										".$clientes['nombre']."
									</p>
								</div>
								<div class='col-sm-2'>
									<p align='center' class='listadoClientes'>
										".$cuitAimprimir."
									</p>
								</div>
								<div class='col-sm-2'>
									<p align='center'>
										<a class='verMas' href='#' id='".$clientes['idCliente']."'>
											<img src='img/mas.png' width='25px' alt='Ver Más'>
										</a>
										<a class='modificar' href='#' id='".$clientes['idCliente']."'>
											<img src='img/modificar.png' width='25px' alt='Modificar'>
										</a>
										<a class='eliminar' href='#' id='".$clientes['idCliente']."'>
											<img src='img/cross.png' width='25px' alt='Eliminar'>
										</a>
									</p>
								</div>
								<div class='col-sm-1'>
									<p align='center'>
									</p>
								</div>
							</div>
						";
					}
				?>
			</div>
			
		</div>
		<div class="contenido" id="modificar">
			<div class="row">
				<div class="col-sm-1">
					<img class='back' src="img/back.png" width='40px'>
				</div>
				<div class="col-sm-11">
					<h1 align='center'>Modificar Cliente</h1>
				</div>
					
			</div>
		</div>
		<div class="contenido" id="verMas">
			<div class="row">
				<div class="col-sm-1">
					<img class='back' src="img/back.png" width='40px'>
				</div>
			</div>
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
