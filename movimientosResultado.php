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
	    			$.post("eliminarCobro.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}
    				});
	    		});
    		});
    		$(".eliminarPago").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("eliminarPago.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}
    				});
	    		});
    		});

			$("#eliminarOCC").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminarOCC");
    			$(".eliminarOCC").click(function(){
    				var codigo = {
    					idCliente : $("#idCliente").val(),
    					idPeriodo : $("#idPeriodo").val(),
    					idObligacion : $("#idObligacion").val()
    				}
    				var t = $(this);
	    			$.post("eliminarOCC.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}else{
    						$("#errorModificarMonto").html("Debe eliminar todos los cobros y pagos primero!");
    					}
    				});
	    		});
    		});
    		$(".eliminarPago").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("eliminarPago.php",codigo,function resultadoEliminacion(respuesta){
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
    				monto: $("#monto").val(),
    				impuesto: $("#impuesto").val(),
    				vencimiento: $("#vencimiento").val(),
    				idCliente: $("#idCliente").val(),
    				idObligacion: $("#idObligacion").val(),
    				saldado: sal,
    				mes: $("#mes").val(),
    				anio: $("#anio").val()
    			}
    			$.post("modificarMonto.php",datos,function(respuesta){
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
    			$.post("cargarCobro.php",datos,function(respuesta){
    				if(respuesta != "error"){
    					location.reload();
    				}else{
    					$("#errorCobro").html("Se ha producido un error. Intentalo nuevamente");
    				}
    			});
    			return false;
    		});

    		$("#cargarPago").submit(function(){
    			var datos = {
    				fecha: $("#fechaPago").val(),
    				monto: $("#montoPago").val(),
    				idCliente: $("#idCliente").val(),
    				idObligacion: $("#idObligacion").val(),
    				mes: $("#mesSinCero").val(),
    				anio: $("#anio").val(),
    				banco: $("#banco").val()
    			}
    			$.post("cargarPago.php",datos,function(respuesta){
    				if(respuesta != "error"){
    					location.reload();
    				}else{
    					$("#errorPago").html("Se ha producido un error. Intentalo nuevamente");
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
			
			$codigo  = $_GET["codigo"];

			$totalCobros = 0;
			$totalPagos = 0;

			if($codigo == "busquedaNormal"){
				$idCliente  = $_GET["cliente"];
				$idObligacion  = $_GET["obligacion"];
				$mes  = $_GET["mes"];
				$mesSinCero  = $_GET["mes"];
				if($mes<10){
					$mes = '0'.$mes;
				}
				$anio  = $_GET["anio"];
				$idPeriodo = $mes.$anio[2].$anio[3];
			}else{
				$idCliente = $codigo[0].$codigo[1].$codigo[2].$codigo[3].$codigo[4].$codigo[5];
				if(strlen($codigo)==13){
					$idObligacion = $codigo[6].$codigo[7].$codigo[8];
					$idPeriodo = $codigo[9].$codigo[10].$codigo[11].$codigo[12];
				}else{
					$idObligacion = $codigo[6].$codigo[7].$codigo[8].$codigo[9];
					$idPeriodo = $codigo[10].$codigo[11].$codigo[12].$codigo[13];
				}
				$mes=$idPeriodo[0].$idPeriodo[1];
				$anio=$idPeriodo[2].$idPeriodo[3];
			}
			echo"
				<input class='hidden' id='idCliente' value='$idCliente' type='text'>
				<input class='hidden' id='idObligacion' value='$idObligacion' type='text'>
				<input class='hidden' id='mes' value='$mes' type='text'>
				<input class='hidden' id='mesSinCero' value='$mesSinCero' type='text'>
				<input class='hidden' id='anio' value='$anio' type='text'>
				<input class='hidden' id='idPeriodo' value='$idPeriodo' type='text'>
			";

		?>
		
	</div>
	<div class="principal">
		<div class="superior">
			<?php include "modificar/superior.php"; ?>
		</div>
		<div class="contenido">
			
							<?php

								$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
								$resultado = mysqli_query($conexion,$sql);
								if(mysqli_num_rows($resultado)==0){
									echo"
										<div class='row'>
											<p align='center'>
												El período no se encuentra en el sistema. Dirijase a la sección Generador<br>
												<br>
												<a href='movimientos.php' class='btn btn-danger'>Volver al Buscador</a> &nbsp; <a href='generador.php' class='btn btn-primary'>Sección Generador</a>
											</p>
										</div>
										
									";
								}else{
									echo"
										<div id='resultado'>
											<div class='row'>
												<div class='col-sm-1'>
													<a href='movimientos.php'><img id='back' src='img/back.png' width='40px'></a>
												</div>
												<div class='col-sm-11'>
													<div id='titulo'>
									";
									$sql= "SELECT nombre, apellido FROM cliente WHERE idCliente = '$idCliente'";
									$resultado = mysqli_query($conexion,$sql);
									$cliente = mysqli_fetch_assoc($resultado);
									$sql= "SELECT * FROM obligacion WHERE idObligacion = '$idObligacion'";
									$resultado = mysqli_query($conexion,$sql);
									$obligacion = mysqli_fetch_assoc($resultado);
									$nombre = $cliente['nombre'];
									$apellido = $cliente['apellido'];
									$descripcion = $obligacion['descripcion'];
									echo"
										<div class='col-sm-12'>
											<h2 align='center'>$descripcion - $mes / $anio</h2>
										</div>
										
									";

									echo"
										</div>
											<div id='impresionCategoria'>
									";

									$sql= "SELECT * FROM obligacion WHERE idObligacion = '$idObligacion'";
									$resultado = mysqli_query($conexion,$sql);
									$obligacion = mysqli_fetch_assoc($resultado);
									$categorizar = $obligacion['categorizar'];
									if($categorizar == 1){
										$sql = "SELECT * FROM categoria WHERE idObligacion = '$idObligacion'";
										$resultado = mysqli_query($conexion,$sql);
										$categoria = mysqli_fetch_assoc($resultado);
										echo"
											<div class='col-sm-12'>
												<p class='subtitulo' align='center'>$nombre $apellido &nbsp; &nbsp; - &nbsp; &nbsp; Categoria: ".$categoria['idCategoria']." - ".$categoria['descripcion']." - <b>$".$categoria['valor']."</b></p>
											</div>
										";
										$monto = $categoria['valor'];
										$impuesto = 0;

										$sql= "SELECT DATE_FORMAT(vencimiento,'%d/%m/%Y') AS vencimiento, saldado FROM occperiodo WHERE idObligacion = '$idObligacion' AND idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
										$resultado = mysqli_query($conexion,$sql);
										$occ = mysqli_fetch_assoc($resultado);
										echo"
											<div class='col-sm-12'>
													<form action='' id='modificarMonto'>
														
														<div class='row'>
															<div class='col-sm-2'>
																<p align='right'>
																	Vencimiento:
																</p>
															</div>
															<div class='col-sm-3'>
																<p align='left'>
																	<input maxlength='10'
													";
													if($occ['vencimiento']!="00/00/0000"){
														echo" value ='".$occ['vencimiento']."' ";
													}
													 
													 echo" 			class='fecha form-control'  id='vencimiento' placeholder='DD/MM/AAAA' type='text'>
																</p>
															</div>
														<!--</div>
														<div class='row'>
															<div class='col-sm-3'></div>-->
															<div class='col-sm-4'>
																<div class='form-group'>
																	
																	<div class='checkbox'>
																		<p align='center'>
																			<label>
																				<input type='checkbox' id='saldado' name='saldado' 
													";

													if($occ['saldado']=="1"){
														echo" checked ";
													}
													echo" value='checked'>
																				 &nbsp; Marcar como saldado
																			</label>
																		</p>
																	</div>

																</div>
															</div>
														<!--</div>
														<div class='row'>-->
															<div class='col-sm-3'>
																<p align='left'>
																	<input class='btn btn-success' type='submit' value='Modificar'>
																</p>
															</div>
															
														</div>
													</form>
													<div class='row'>
														<p align='center' id='errorModificarMonto'>
															
														</p>
													</div>
											</div>
										";
									}else{
										$sql= "SELECT valor, impuesto, DATE_FORMAT(vencimiento,'%d/%m/%Y') AS vencimiento, saldado FROM occperiodo WHERE idObligacion = '$idObligacion' AND idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
										$resultado = mysqli_query($conexion,$sql);
										$occ = mysqli_fetch_assoc($resultado);
										$monto = $occ['valor'];
										$impuesto = $occ['impuesto'];
										echo"
											<div class='col-sm-12'>
												<p class='subtitulo' align='center'>$nombre $apellido</p>
											</div>
										";
										echo"
											<div class='col-sm-12'>
													<form action='' id='modificarMonto'>
														<div class='row'>
															<div class='col-sm-3'>
																<p align='right'>
																	Monto:
																</p>
															</div>
															<div class='col-sm-3'>
																<p align='left'>
																	<input value ='".$occ['valor']."' class='form-control' id='monto' required type='text'>
																</p>
															</div>
														
															<div class='col-sm-2'>
																<p align='right'>
																	Interés:
																</p>
															</div>
															<div class='col-sm-3'>
																<p align='left'>
																	<input value ='".$occ['impuesto']."' class='form-control' id='impuesto' type='text'>
																</p>
															</div>
														</div>
														<div class='row'>
															<div class='col-sm-3'>
																<p align='right'>
																	Vencimiento:
																</p>
															</div>
															<div class='col-sm-3'>
																<p align='left'>
																	<input maxlength='10'
													";
													if($occ['vencimiento']!="00/00/0000"){
														echo" value ='".$occ['vencimiento']."' ";
													}
													 
													 echo" 			class='fecha form-control'  id='vencimiento' placeholder='DD/MM/AAAA' type='text'>
																</p>
															</div>

															<div class='col-sm-6'>
																<div class='form-group'>
																	
																	<div class='checkbox'>
																		<p align='center'>
																			<label>
																				<input type='checkbox' id='saldado' name='saldado' 
													";

													if($occ['saldado']=="1"){
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
																 &nbsp; <a class='btn btn-danger' id='eliminarOCC' href='#'>
																	Eliminar
																</a>
															</p>
														</div>
													</form>
													<div class='row'>
														<p align='center' id='errorModificarMonto'>
															
														</p>
													</div>
											</div>
										";
									}
									echo"
										</div>
									</div>
									
								</div>
								<div class='row'>
									<div class='col-sm-6'>
										<h2 class='mtop' align='center'>
											Cobros
										</h2>
										<div class='col-sm-12'>
											<div id='cobros' class='obligacion' >
									";

									$sql= "SELECT idCobro, valor, nroRecibo FROM cobro WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
									$resultado = mysqli_query($conexion,$sql);

									if(mysqli_num_rows($resultado)==0){
										echo"<p align='center'>No hay Cobros registrados para este período</p>";
										
									}else{
										echo"
											<div class='col-sm-6'>
												<h2 align='right'># Recibo</h2>
											</div>
											<div class='col-sm-6'>
												<h2 align='left'>Valor</h2>
											</div>
											
										";
										while($cobros = mysqli_fetch_assoc($resultado)){
											$valor = $cobros['valor'];
											$id = $cobros['idCobro'];
											$nroRecibo = $cobros['nroRecibo'];
											echo"
												<div class='col-sm-6'>
													<p align='right'>$nroRecibo</p>
												</div>
												<div class='col-sm-6'>
													<p align='left'>$$valor</p>
												</div>
												
											";
										}
										$sql= "SELECT round(sum(valor),2) AS total FROM cobro WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
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
								<div class='col-sm-6'>
									<h2 class='mtop' align='center'>
										Pagos
									</h2>
									<div class='col-sm-12'>
										<div id='pagos' class='obligacion' >
									";

									$sql= "SELECT DATE_FORMAT(fecha,'%d/%m/%y') AS fecha, valor, idPago, idBanco FROM pago WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
									$resultado = mysqli_query($conexion,$sql);

									if(mysqli_num_rows($resultado)==0){
										echo"<p align='center'>No hay Pagos registrados para este período</p>";
										//die();
									}else{
										echo"
											<div class='col-sm-4'>
												<h2 align='right'>Fecha</h2>
											</div>
											<div class='col-sm-3'>
												<h2 align='center'>Valor</h2>
											</div>
											<div class='col-sm-2'>
												<h2 align='center'>Acción</h2>
											</div>
											<div class='col-sm-3'>
												<h2 align='center'>Banco</h2>
											</div>
										";
										while($pagos = mysqli_fetch_assoc($resultado)){
											$fecha = $pagos['fecha'];
											$valor = $pagos['valor'];
											$id = $pagos['idPago'];
											$banco = $pagos['idBanco'];
											echo"
												<div class='col-sm-4'>
													<p align='right'>$fecha</p>
												</div>
												<div class='col-sm-3'>
													<p align='center'>$$valor</p>
												</div>
												<div class='col-sm-2'>
													<p align='center'>
														<a class='eliminarPago' id='$id' href='#'>
															<img src='img/cross.png' width='20px'>
														</a>
													</p>
												</div>
												<div class='col-sm-3'>
													<p align='center'>$banco</p>
												</div>
											";
										}
										$sql= "SELECT round(sum(valor),2) AS total FROM pago WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
										$resultado = mysqli_query($conexion,$sql);
										$pagos = mysqli_fetch_assoc($resultado);
										$totalPagos=$pagos['total'];
										echo"
											<div class='col-sm-4'>
												<p align='right' class='total'>Total: </p>
											</div>
											<div class='col-sm-3'>
												<p align='center' class='total'>$$totalPagos</p>
											</div>
											<div class='col-sm-5'>
												
											</div>
										";

									}

									echo"
										</div>
									</div>
									
								</div>
								
							</div>
							<div class='row'>
								<hr>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<!--<form action='' id='cargarCobro'>
										<div class='col-sm-12'>
											<h2 class='subtitulo' align='center'>Cargar Nuevo Cobro:</h2>
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
											<div class='form-group'>
												<input class='monto form-control' id='montoCobro' type='text' required placeholder='Monto' >
											</div>
										</div>
										
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='form-control' id='nroRecibo' placeholder='# Recibo' type='text' >
											</div>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<p align='center'>
													<input type='submit' class='btn btn-success' value='Cargar Cobro' >
												</p>
											</div>
										</div>
										<div class='col-sm-12'>
											<p align='center' id='errorCobro'></p>
										</div>
									</form>-->
								</div>
								<div class='col-sm-6'>
									<form action='#' id='cargarPago'>
										<div class='col-sm-12'>
											<h2 class='subtitulo' align='center'>Cargar Nuevo Pago:</h2>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='form-control' type='text' id='fechaPago' class='fecha' required placeholder='(DD/MM/AAAA)' maxlength='10'
													value=$fecha
												>
											</div>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<input class='monto form-control' type='text' id='montoPago' required placeholder='Monto' >
											</div>
										</div>
										<div class='col-sm-6'>
											<select required name='banco' id='banco' class='form-control'>
												<option value=''>Centro de Pago</option>
											";

										$sql="SELECT * FROM banco";
										$resultado = mysqli_query($conexion,$sql);
										while($bancos = mysqli_fetch_assoc($resultado)){
											$idBanco = $bancos['idBanco'];
											$descripcionBanco = $bancos['descripcion'];
											echo"
												<option value='$idBanco'>$idBanco - $descripcionBanco</option>
											";
										}

									echo"
										</select>
										</div>
										<div class='col-sm-6'>
											<div class='form-group'>
												<p align='center'>
													<input type='submit' class='btn btn-primary' value='Cargar Pago' >
												</p>
											</div>
										</div>
										<div class='col-sm-12'>
											<p align='center' id='errorPago'></p>
										</div>
									</form>
									</div>
								</div>
								<div class='row'>
								
									<div id='saldo'>
										<hr >";
										$deudaCliente = $monto + $impuesto - $totalCobros;
										$saldoEstudio = $totalPagos - $totalCobros;
										echo"
											<p align='center'>
												Deuda del cliente: ".number_format($deudaCliente,2,'.','')." <br>
												Saldo del Estudio: ".number_format($saldoEstudio,2,'.','')."
											</p>
										
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
