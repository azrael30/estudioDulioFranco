<?php
	include "session.php";
	include "funciones.php";
	if(getTipoUsuario($_SESSION['login_user'])=='2'){
		header('Location: index.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Movimientos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="estilospanel.css">
    <script src="js/jquery.js"></script>
    <script>
    	$(document).ready(function(){
    		var parte = window.location.pathname.split( '/' );
    		$("a").each(function(){
    			if( $(this).attr("href")==parte[1] || $(this).attr("href")==parte[2] || $(this).attr("href")==parte[3] || $(this).attr("href")==parte[4] ){
    				$(this).addClass("activated");
    			}
    		});

    		$(".monto").keypress(function(e){

    			if(e.which!=45 &&(e.which<48 || e.which>57)){
    				return false;
    			}
    		});

    		$("#generar").hide();
    		
    		$("#generarPrevio").click(function(){
    			$("#generarPrevio").hide();
    			$("#generar").fadeIn();
    		});
    		/*$("#generar").click(function(){
    			$(this).html("¿Generar Recibo?");
    			$(this).addClass("generar2");
    			$(".generar2").click(function(){
    				var papa = {
    					idCliente : $("#cliente").val(),
    					fecha : $("#fecha").val(),
    					username : $("#username").val()
    				}
	    			$.post("generarRecibo.php",papa,function(respuesta){
	    				if(respuesta != "error"){
	    					window.open('recibo.php?id='+respuesta,'_blank');
	    					location.reload();
	    				}else{
	    					alert("ERROR");
	    					location.reload();
	    				}
    					
    				});
	    		});
    		});*/



    	});

		function mostrarResultado(respuesta){
			if(respuesta=="no existe"){
				$("#noExiste").show();
				$("#noExiste").html("La obligación no se encuentra generada para el cliente en ese período. Dirijase a la sección Generador");
			}else if(respuesta=="error"){
				$("#noExiste").show();
				$("#noExiste").html("Se ha producido un error, intentalo nuevamente.");
			}else{
				$("#noExiste").fadeOut();
				$("#cobrosCargados").append(respuesta);
				monto : $("#monto").val('');
			}
		}

    	function imprimirOpciones(html){
    		$("#obligacion").html(html);
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
		
		<div class="contenido">
			<div id="busqueda">
				<div class="row">
					<div class='col-sm-1'>
						<a href='cobros.php'><img id='back' src='img/back.png' width='40px'></a>
					</div>
					<div class="col-sm-11">
						<h2 align='center'><?php echo getNombreApellido($_GET['cliente']); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<?php

							echo "
								<iframe style='background-color: #FFF' height='300px' width='100%' src='cuentaCorrientePorCliente.php?cliente=".$_GET['cliente']."&sinLimiteTemporal=checked&saldoNoCero=checked&cobro=si' frameborder='0'></iframe>";
							
						?>
					</div>
					<div class="col-xs-4">
						<form action="generarRecibo.php" method="post">
							
							<div class="hidden">
								<?php
									$idCliente = $_GET['cliente'];
									$mes = $_GET['mes'];
									$anio = $_GET['anio'];
									if($mes<10){
										$mes = '0'.$mes;
									}
									$idPeriodo = $mes.$anio[2].$anio[3];
									echo"<input type='text' name='idCliente' value='".$_GET['cliente']."'>";
									echo"<input type='text' name='idPeriodo' value='".$idPeriodo."'>";
									echo"<input type='text' name='fecha' value='".getFechaDelSistema()."'>";
									echo"<input type='text' name='username' value='".$_SESSION['login_user']."'>";
								?>
								
							</div>
							<?php
								
								$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
								$resultado = mysqli_query($conexion,$sql);
								while($oc = mysqli_fetch_assoc($resultado)){
									$idObligacion = $oc['idObligacion'];
									$fijo = $oc['valor'];
									echo"
											<div class='col-sm-7'>
											<p align='right'>
												".getDescripcionObligacion($idObligacion)." 
											</p>	
											</div>
							                <div class='col-sm-5'>
							                	<input type='text' class='monto form-control' value='$fijo' placeholder='Monto ".getDescripcionObligacion($idObligacion)."' name='$idObligacion'>
							                </div>
							        ";
								}

							?>
							<div class="col-sm-12">

								<div class="form-group">
									<textarea maxlength="200" name="comentario" id="comentario" class="form-control" rows="3" placeholder="Comentarios" ></textarea>
								</div>
								
								<p align='center'>
									<a href="#" id='generarPrevio' class='btn btn-success'>Generar Recibo</a>
									<input id="generar" type="submit" class='btn btn-success' value='Confirmar'> &nbsp; 
									<a href="cobros.php" id='cancelar' class='btn btn-danger'>Cancelar</a>
								</p>
							</div>
						</form>
					</div>
				</div>
				
				
			</div><!--busqueda-->
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
