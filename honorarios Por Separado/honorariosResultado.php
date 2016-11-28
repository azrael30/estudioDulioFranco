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

    		$(".fecha").keypress(function(e){
    			if($(this).val().length==2){
    				$(this).val($(this).val()+'/');
    			}else if($(this).val().length==5){
    				$(this).val($(this).val()+'/');
    			}
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    		});

    		$(".monto").keypress(function(e){

    			if(e.which!=46 &&(e.which<48 || e.which>57)){
    				return false;
    			}
    		});

    		$(".eliminarCobro").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("eliminarCobroHonorario.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}
    				});
	    		});
    		});
    		$(".eliminarExtra").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("eliminarExtra.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}
    				});
	    		});
    		});

    		$("#modificarMonto").submit(function(){
    			if($("#saldado").is(":checked")){
    				var sal = 1;
    			}else{
    				var sal = 0;
    			}
    			var datos = {
    				monto: $("#base").val(),
    				idCliente: $("#idCliente").val(),
    				saldado: sal,
    				mes: $("#mes").val(),
    				anio: $("#anio").val()
    			}
    			$.post("modificarMontoHonorario.php",datos,function(respuesta){
    				if(respuesta!="error"){
    					$("#errorModificarMonto").html("Modificado").fadeIn(2000);
    					location.reload();
    				}else{
    					$("#errorModificarMonto").html("Se ha producido un error. Vuelve a intentarlo");
    				}
    			});
    			return false;
    		});

    		$("#cargarCobro").submit(function(){
    			var datos = {
    				fecha: $("#fechaCobro").val(),
    				monto: $("#montoCobro").val(),
    				idCliente: $("#idCliente").val(),
    				idObligacion: $("#idObligacion").val(),
    				mes: $("#mesSinCero").val(),
    				anio: $("#anio").val(),
    				nroRecibo: $("#nroRecibo").val()
    			}
    			$.post("cargarCobroHonorario.php",datos,function(respuesta){
    				if(respuesta != "error"){
    					location.reload();
    				}else{
    					$("#errorCobro").html("Se ha producido un error. Intentalo nuevamente");
    				}
    			});
    			return false;
    		});

    		$("#cargarExtra").submit(function(){
    			var datos = {
    				descripcion: $("#descripcion").val(),
    				monto: $("#montoExtra").val(),
    				idCliente: $("#idCliente").val(),
    				mes: $("#mesSinCero").val(),
    				anio: $("#anio").val()
    			}
    			$.post("cargarExtra.php",datos,function(respuesta){
    				if(respuesta != "error"){
    					location.reload();
    				}else{
    					$("#errorExtra").html("Se ha producido un error. Intentalo nuevamente");
    				}
    			});
    			return false;
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
			

			$totalCobros = 0;
			$totalExtras = 0;

			$idCliente  = $_GET["cliente"];
			$mes  = $_GET["mes"];
			$mesSinCero  = $_GET["mes"];
			if($mes<10){
				$mes = '0'.$mes;
			}
			$anio  = $_GET["anio"];
			$idPeriodo = $mes.$anio[2].$anio[3];
			
			echo"
				<input class='hidden' id='idCliente' value='$idCliente' type='text'>
				<input class='hidden' id='mes' value='$mes' type='text'>
				<input class='hidden' id='mesSinCero' value='$mesSinCero' type='text'>
				<input class='hidden' id='anio' value='$anio' type='text'>
			";

		?>
		
	</div>
	<div class="principal">
		<div class="superior">
			<?php include "modificar/superior.php"; ?>
		</div>
		<div class="contenido">
			
							<?php

								$sql= "SELECT * FROM clientehonorarioperiodo WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
								$resultado = mysqli_query($conexion,$sql);
								if(mysqli_num_rows($resultado)==0){
									echo"
										<div class='row'>
											<p align='center'>
												No se encuentran honorarios cargados en el sistema. Dirijase a la sección Generador<br>
												<br>
												<a href='honorarios.php' class='btn btn-danger'>Volver al Buscador</a> &nbsp; <a href='generador.php' class='btn btn-primary'>Sección Generador</a>
											</p>
										</div>
										
									";
								}else{
									echo"
										<div id='resultado'>
											<div class='row'>
												<div class='col-sm-1'>
													<a href='honorarios.php'><img id='back' src='img/back.png' width='40px'></a>
												</div>
												<div class='col-sm-11'>
													<div id='titulo'>
									";
									$sql= "SELECT nombre, apellido FROM cliente WHERE idCliente = '$idCliente'";
									$resultado = mysqli_query($conexion,$sql);
									$cliente = mysqli_fetch_assoc($resultado);
									
									$nombre = $cliente['nombre'];
									$apellido = $cliente['apellido'];
									echo"
										<div class='col-sm-12'>
											<h1 align='center'>Honorarios - $mes / $anio</h1>
										</div>
										<div class='col-sm-12'>
											<h2 class='subtitulo' align='center'>$nombre $apellido</h2>
										</div>
									";

									echo"
										</div>
											<div id='impresionCategoria'>
									";

										$sql= "SELECT round(base,2) AS base, saldado FROM clientehonorarioperiodo WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
										$resultado = mysqli_query($conexion,$sql);
										$chp = mysqli_fetch_assoc($resultado);
										$monto = $chp['base'];
										echo"
											<div class='col-sm-12'>
													<form action='' id='modificarMonto'>
														<div class='row'>
															<div class='col-sm-3'>
																<p align='right'>
																	Monto base:
																</p>
															</div>
															<div class='col-sm-3'>
																<p align='left'>
																	<input value ='".$chp['base']."' class='form-control monto' id='base' required type='text'>
																</p>
															</div>
															
															<div class='col-sm-6'>
																<div class='form-group'>
																	
																	<div class='checkbox'>
																		<p align='left'>
																			<label>
																				<input type='checkbox' id='saldado' name='saldado' 
													";

													if($chp['saldado']=="1"){
														echo" checked ";
													}
													echo" value='checked'>
																				 &nbsp; Marcar como saldado
																			</label>
																		</p>
																	</div>
																</div>
															</div>
															
														</div>
														<div class='row'>
															<p align='center'>
																<input class='btn btn-success' type='submit' value='Modificar'>
															</p>
														</div>
													</form>
													<div class='row'>
														<p align='center' id='errorModificarMonto'>
															
														</p>
													</div>
											</div>
										";
									
									echo"
										</div>
									</div>
									
								</div>
								<div class='row'>
									<div class='col-sm-6'>
										<h2 align='center'>
											Extras del período
										</h2>
										<div class='col-sm-12'>
											<div id='cobros'>
									";

									$sql= "SELECT idExtraHonorario, monto, descripcion FROM extrahonorario WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
									$resultado = mysqli_query($conexion,$sql);

									if(mysqli_num_rows($resultado)==0){
										echo"<p align='center'>No hay extras registrados para este período</p>";
										
									}else{
										echo"
											<div class='col-sm-3'>
												<h2 align='right'>Monto</h2>
											</div>
											<div class='col-sm-6'>
												<h2 align='center'>Descripción</h2>
											</div>
											<div class='col-sm-2'>
												<h2 align='center'>Acción</h2>
											</div>
										";
										while($extras = mysqli_fetch_assoc($resultado)){
											$descripcion = $extras['descripcion'];
											$monto = $extras['monto'];
											$id = $extras['idExtraHonorario'];
											echo"
												<div class='col-sm-3'>
													<p align='right'>$$monto</p>
												</div>
												<div class='col-sm-6'>
													<p align='center'>$descripcion</p>
												</div>
												<div class='col-sm-2'>
													<p align='center'>
														<a class='eliminarExtra' id='$id' href='#'>
															<img src='img/cross.png' width='20px'>
														</a>
														<!--<a class='generarRecibo' href='recibo.php?id=$id' target='_blanck'>
															<img src='img/recibo.png' width='20px'>
														</a>-->
													</p>
												</div>
											";
										}
										$sql= "SELECT round(sum(monto),2) AS total FROM extrahonorario WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
										$resultado = mysqli_query($conexion,$sql);
										$extras = mysqli_fetch_assoc($resultado);
										$totalExtras=$extras['total'];
										echo"
											
											<div class='col-sm-6'>
												<p align='right' class='total'>Total: </p>
											</div>
											<div class='col-sm-6'>
												<p align='left' class='total'>$$totalExtras</p>
											</div>
										";
									}

									

									echo"
										</div>
									</div>
									
								</div>
								<div class='col-sm-6'>
									<h2 align='center'>
										Cobros
									</h2>
									<div class='col-sm-12'>
										<div id='cobros'>
									";

									$sql= "SELECT DATE_FORMAT(fecha,'%d/%m/%y') AS fecha, monto, idCobroHonorario, nroRecibo FROM cobrohonorario WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
									$resultado = mysqli_query($conexion,$sql);

									if(mysqli_num_rows($resultado)==0){
										echo"<p align='center'>No hay Cobros registrados para este período</p>";
										//die();
									}else{
										echo"
											<div class='col-sm-3'>
												<h2 align='right'>Fecha</h2>
											</div>
											<div class='col-sm-3'>
												<h2 align='center'>Monto</h2>
											</div>
											<div class='col-sm-3'>
												<h2 align='center'># R</h2>
											</div>
											<div class='col-sm-3'>
												<h2 align='center'>Acción</h2>
											</div>
										";
										while($cobros = mysqli_fetch_assoc($resultado)){
											$fecha = $cobros['fecha'];
											$monto = $cobros['monto'];
											$recibo = $cobros['nroRecibo'];
											$id = $cobros['idCobroHonorario'];
											echo"
												<div class='col-sm-3'>
													<p align='right'>$fecha</p>
												</div>
												<div class='col-sm-3'>
													<p align='center'>$$monto</p>
												</div>
												<div class='col-sm-3'>
													<p align='center'>$recibo</p>
												</div>
												<div class='col-sm-3'>
													<p align='center'>
														<a class='eliminarCobro' id='$id' href='#'>
															<img src='img/cross.png' width='20px'>
														</a>
													</p>
												</div>
											";
										}
										$sql= "SELECT round(sum(monto),2) AS total FROM cobrohonorario WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
										$resultado = mysqli_query($conexion,$sql);
										$cobros = mysqli_fetch_assoc($resultado);
										$totalCobros=$cobros['total'];
										echo"
											<div class='col-sm-6'>
												<p align='right' class='total'>Total: </p>
											</div>
											<div class='col-sm-6'>
												<p align='left' class='total'>$$totalCobros</p>
											</div>
										";

									}

									echo"
										</div>
									</div>
									
								</div>
								
							</div>
							<div class='row'>
								
								<div id='saldo'>
									<hr>";
									$totalPeriodo = $chp['base'] + $totalExtras;
									$deudaCliente = $totalPeriodo - $totalCobros;
									echo"
										<p align='center'>
											Total del Período: ".number_format($totalPeriodo,2,'.','')." <br>
											Deuda del cliente: ".number_format($deudaCliente,2,'.','')."<br>
										</p>
									<hr>
								</div>
								
							</div>
							<div class='row'>
								
								<div class='col-sm-6'>
									<form action='#' id='cargarExtra'>
										<div class='col-sm-12'>
											<h2 align='center'>Cargar Nuevo Extra:</h2>
										</div>
										
										<div class='col-sm-6'>
											<p align='right'>
												$
											</p>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='monto form-control' type='text' id='montoExtra' required placeholder='Monto' >
											</div>
										</div>
										<div class='col-sm-12'>
											<input class='form-control' type='text' id='descripcion' required placeholder='Descripción' >
										</div>
										<div class='col-sm-12'>
											<div class='form-group'>
												<br>
												<p align='center'>
													<input type='submit' class='btn btn-primary' value='Cargar Extra' >
												</p>
											</div>
										</div>
										<div class='col-sm-12'>
											<p align='center' id='errorExtra'></p>
										</div>
									</form>
									</div>



									<div class='col-sm-6'>
									<form action='' id='cargarCobro'>
										<div class='col-sm-12'>
											<h2 align='center'>Cargar Nuevo Cobro:</h2>
										</div>
										<div class='col-sm-6'>
											<p align='right'>
												Fecha:
											</p>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='form-control' id='fechaCobro' type='text' class='fecha' required placeholder='(DD/MM/AAAA)' maxlength='10'
												";
											$sql="SELECT LPAD(DAY(SYSDATE()),2,'0'), LPAD(MONTH(SYSDATE()),2,'0'), YEAR(SYSDATE())";
											$resultado = mysqli_query($conexion,$sql);
											$aux = mysqli_fetch_row($resultado);
											$dia = $aux[0];
											$mes = $aux[1];
											$anio = $aux[2];
											
											$fecha = $dia.'/'.$mes.'/'.$anio;
											echo "value='$fecha'";

											echo"
												>
											</div>
										</div>
										<div class='col-sm-6'>
											<p align='right'>
												$
											</p>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='form-control' id='montoCobro' type='text' required placeholder='Monto' >
											</div>
										</div>
										<div class='col-sm-6'>
											<p align='right'>
												Número de Recibo
											</p>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='form-control' id='nroRecibo' placeholder='#' type='text' >
											</div>
										</div>
										<div class='col-sm-12'>
											<div class='form-group'>
												<p align='center'>
													<input type='submit' class='btn btn-success' value='Cargar Cobro' >
												</p>
											</div>
										</div>
										<div class='col-sm-12'>
											<p align='center' id='errorCobro'></p>
										</div>
									</form>
								</div>
								</div>
							</div><!--resultado-->
									";


								}//fin else
								
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
