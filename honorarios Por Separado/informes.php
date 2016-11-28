<?php
	include "session.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel de Control - Inicio</title>
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
    		$("#limiteTemporalG").click(function(){
    			if($(this).is(':checked')){
    				$("#mesDesdeG").attr("disabled","enabled");
    				$("#anioDesdeG").attr("disabled","enabled");
    				$("#mesHastaG").attr("disabled","enabled");
    				$("#anioHastaG").attr("disabled","enabled");
    			}else{
    				$("#mesDesdeG").removeAttr("disabled");
    				$("#anioDesdeG").removeAttr("disabled");
    				$("#mesHastaG").removeAttr("disabled");
    				$("#anioHastaG").removeAttr("disabled");
    			}
    		});
    		$("#limiteTemporalE").click(function(){
    			if($(this).is(':checked')){
    				$("#fechaDesdeE").attr("disabled","enabled");
    				$("#fechaHastaE").attr("disabled","enabled");
    			}else{
    				$("#fechaDesdeE").removeAttr("disabled");
    				$("#fechaHastaE").removeAttr("disabled");
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
    	});
    </script>
</head>

<body>
	<?php 
		include "conecto.php"; 
		
		require "funciones.php";
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
				<form action="cuentaCorrientePorCliente.php" method='get' target='_blank' id='cuentaCorrientePorCliente'>
					<div class="row">
						<h1 align='center'>Cuenta Corriente por Cliente:</h1>
					</div>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<p align="right">
								<div class="form-group">
									<select name="cliente" id="cliente" required class='form-control'>
										<option value="">Seleccionar Cliente</option>
										<?php
											$sql= "SELECT * FROM cliente";
											$resultado = mysqli_query($conexion,$sql);
											while($clientes = mysqli_fetch_assoc($resultado)){
												$idCliente = $clientes['idCliente'];
												$nombreCliente = $clientes['nombre'];
												$apellidoCliente = $clientes['apellido'];
												echo"
													<option value='$idCliente'>$idCliente - $nombreCliente $apellidoCliente</option>
										        ";
											}
										?>
									</select>
								</div>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class='form-group'>
								
								<div class='checkbox'>
									<p align="center">
										<label>
											<input name='sinLimiteTemporal' value='checked' id='limiteTemporalG' type='checkbox'>
											 &nbsp; Sin límite temporal
										</label>
									</p>
								</div>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>Desde: </p>
						</div>
						<div class="col-sm-3">
								<div class="form-group">
									<select name="mesDesdeG" id="mesDesdeG" class='form-control'>
										<?php
											$sqlA="SELECT MONTH(SYSDATE())";
											$resultadoA = mysqli_query($conexion,$sqlA);
											$aux = mysqli_fetch_row($resultadoA);
											$mes = $aux[0];
											echo"<option "; if($mes == 1){echo" selected ";} echo" value='1'>Enero</option>";
											echo"<option "; if($mes == 2){echo" selected ";} echo" value='2'>Febrero</option>";
											echo"<option "; if($mes == 3){echo" selected ";} echo" value='3'>Marzo</option>";
											echo"<option "; if($mes == 4){echo" selected ";} echo" value='4'>Abril</option>";
											echo"<option "; if($mes == 5){echo" selected ";} echo" value='5'>Mayo</option>";
											echo"<option "; if($mes == 6){echo" selected ";} echo" value='6'>Junio</option>";
											echo"<option "; if($mes == 7){echo" selected ";} echo" value='7'>Julio</option>";
											echo"<option "; if($mes == 8){echo" selected ";} echo" value='8'>Agosto</option>";
											echo"<option "; if($mes == 9){echo" selected ";} echo" value='9'>Septiembre</option>";
											echo"<option "; if($mes == 10){echo" selected ";} echo" value='10'>Octubre</option>";
											echo"<option "; if($mes == 11){echo" selected ";} echo" value='11'>Noviembre</option>";
											echo"<option "; if($mes == 12){echo" selected ";} echo" value='12'>Dciembre</option>";	
										?>
									</select>	
								</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
									<input class='form-control' type="text" placeholder='Año (AAAA)' maxlength='4' minlength='4' name='anioDesdeG' id='anioDesdeG'
										<?php
											$sqlA="SELECT YEAR(SYSDATE())";
											$resultadoA = mysqli_query($conexion,$sqlA);
											$aux = mysqli_fetch_row($resultadoA);
											$anio = $aux[0];
											echo "value='$anio'";

										?>
									>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>Hasta: </p>
						</div>
						<div class="col-sm-3">
								<div class="form-group">
									<select name="mesHastaG" id="mesHastaG" class='form-control'>
										<?php
											$sqlA="SELECT MONTH(SYSDATE())";
											$resultadoA = mysqli_query($conexion,$sqlA);
											$aux = mysqli_fetch_row($resultadoA);
											$mes = $aux[0];
											echo"<option "; if($mes == 1){echo" selected ";} echo" value='1'>Enero</option>";
											echo"<option "; if($mes == 2){echo" selected ";} echo" value='2'>Febrero</option>";
											echo"<option "; if($mes == 3){echo" selected ";} echo" value='3'>Marzo</option>";
											echo"<option "; if($mes == 4){echo" selected ";} echo" value='4'>Abril</option>";
											echo"<option "; if($mes == 5){echo" selected ";} echo" value='5'>Mayo</option>";
											echo"<option "; if($mes == 6){echo" selected ";} echo" value='6'>Junio</option>";
											echo"<option "; if($mes == 7){echo" selected ";} echo" value='7'>Julio</option>";
											echo"<option "; if($mes == 8){echo" selected ";} echo" value='8'>Agosto</option>";
											echo"<option "; if($mes == 9){echo" selected ";} echo" value='9'>Septiembre</option>";
											echo"<option "; if($mes == 10){echo" selected ";} echo" value='10'>Octubre</option>";
											echo"<option "; if($mes == 11){echo" selected ";} echo" value='11'>Noviembre</option>";
											echo"<option "; if($mes == 12){echo" selected ";} echo" value='12'>Dciembre</option>";	
										?>
									</select>	
								</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
									<input class='form-control' type="text" placeholder='Año (AAAA)' maxlength='4' minlength='4' name='anioHastaG' id='anioHastaG'
										<?php
											$sqlA="SELECT YEAR(SYSDATE())";
											$resultadoA = mysqli_query($conexion,$sqlA);
											$aux = mysqli_fetch_row($resultadoA);
											$anio = $aux[0];
											echo "value='$anio'";

										?>
									>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class='form-group'>
								
								<div class='checkbox'>
									<p align="center">
										<label>
											<input type='checkbox' name='saldoNoCero' value='checked'>
											 &nbsp; Sólo saldo diferente a cero
										</label>
									</p>
								</div>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<p align="center">
								<input type="submit" value='Generar' class='btn btn-success'>
							</p>
						</div>
					</div>
				</form>

				<div class="row">
					<hr>
				</div>
				<form action="saldoDelEstudio.php" method='get' target='_blank' id='saldoEstudio'>
					<div class="row">
						<h1 align='center'>Saldo del Estudio:</h1>
					</div>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<div class='form-group'>
								
								<div class='checkbox'>
									<p align="center">
										<label>
											<input name='sinLimiteTemporal' id='limiteTemporalE' value='checked' type='checkbox'>
											 &nbsp; Sin límite temporal
										</label>
									</p>
								</div>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>Desde: </p>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
									<input class='fecha form-control' name='desde' required type="text" placeholder='(DD/MM/AAAA)' maxlength='10' minlength='10' id='fechaDesdeE'
										<?php
											$sqlF="SELECT LPAD(DAY(SYSDATE()),2,'0') AS dia,LPAD(MONTH(SYSDATE()),2,'0') AS mes,YEAR(SYSDATE()) AS anio";
											$resultadoF = mysqli_query($conexion,$sqlF);
											$fecha = mysqli_fetch_assoc($resultadoF);
											$dia = $fecha['dia'];
											$mes = $fecha['mes'];
											$anio = $fecha['anio'];
											echo "value='$dia/$mes/$anio'";

										?>
									>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>Hasta: </p>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
									<input class='fecha form-control' name='hasta' required type="text" placeholder='(DD/MM/AAAA)' maxlength='10' minlength='10' id='fechaHastaE'
										<?php
											$sqlF="SELECT LPAD(DAY(SYSDATE()),2,'0') AS dia,LPAD(MONTH(SYSDATE()),2,'0') AS mes,YEAR(SYSDATE()) AS anio";
											$resultadoF = mysqli_query($conexion,$sqlF);
											$fecha = mysqli_fetch_assoc($resultadoF);
											$dia = $fecha['dia'];
											$mes = $fecha['mes'];
											$anio = $fecha['anio'];
											echo "value='$dia/$mes/$anio'";

										?>
									>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<p align="center">
								<input type="submit" value='Generar' class='btn btn-primary'>
							</p>
						</div>
					</div>
				</form>
				<div class="row">
					<hr>
				</div>
				<div class="row">
						<h1 align='center'>Listado de Clientes y Obligaciones</h1>
					</div>
				<div class="row">
						<div class="form-group">
							<p align="center">
								<a href="listadoDeClientes.php" target="_blanck" class='btn btn-success'>Generar</a>
							</p>
						</div>
				</div>
				<div class="row">
					<hr>
				</div>

				<form action="cobroPorFecha.php" method='get' target='_blank' id='cobrosPorFecha'>
					<div class="row">
						<h1 align='center'>Cobros por Fecha:</h1>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>
								Clientes:
							</p>
						</div>
						<div class="col-sm-6">
							
								<div class="form-group">
									<select name="cliente" id="cliente" required class='form-control'>
										<option value="todos">Todos</option>
										<?php
											$sql= "SELECT * FROM cliente";
											$resultado = mysqli_query($conexion,$sql);
											while($clientes = mysqli_fetch_assoc($resultado)){
												$idCliente = $clientes['idCliente'];
												$nombreCliente = $clientes['nombre'];
												$apellidoCliente = $clientes['apellido'];
												echo"
													<option value='$idCliente'>$idCliente - $nombreCliente $apellidoCliente</option>
										        ";
											}
										?>
									</select>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>
								Fecha:
							</p>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
									<input class='fecha form-control' name='fecha' required type="text" placeholder='(DD/MM/AAAA)' maxlength='10' minlength='10'  id='fecha'
										<?php
											$sqlF="SELECT LPAD(DAY(SYSDATE()),2,'0') AS dia,LPAD(MONTH(SYSDATE()),2,'0') AS mes,YEAR(SYSDATE()) AS anio";
											$resultadoF = mysqli_query($conexion,$sqlF);
											$fecha = mysqli_fetch_assoc($resultadoF);
											$dia = $fecha['dia'];
											$mes = $fecha['mes'];
											$anio = $fecha['anio'];
											echo "value='$dia/$mes/$anio'";

										?>
									>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<p align="center">
								<input type="submit" value='Generar' class='btn btn-primary'>
							</p>
						</div>
					</div>
				</form>
				<div class="row">
					<hr>
				</div>
				<form action="pagoPorFecha.php" method='get' target='_blank' id='pagosPorFecha'>
					<div class="row">
						<h1 align='center'>Pagos por Fecha:</h1>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>
								Clientes:
							</p>
						</div>
						<div class="col-sm-6">
							
								<div class="form-group">
									<select name="cliente" id="cliente" required class='form-control'>
										<option value="todos">Todos</option>
										<?php
											$sql= "SELECT * FROM cliente";
											$resultado = mysqli_query($conexion,$sql);
											while($clientes = mysqli_fetch_assoc($resultado)){
												$idCliente = $clientes['idCliente'];
												$nombreCliente = $clientes['nombre'];
												$apellidoCliente = $clientes['apellido'];
												echo"
													<option value='$idCliente'>$idCliente - $nombreCliente $apellidoCliente</option>
										        ";
											}
										?>
									</select>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<p align='right'>
								Fecha:
							</p>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
									<input class='fecha form-control' name='fecha' required type="text" placeholder='(DD/MM/AAAA)' maxlength='10' minlength='10'  id='fecha'
										<?php
											$sqlF="SELECT LPAD(DAY(SYSDATE()),2,'0') AS dia,LPAD(MONTH(SYSDATE()),2,'0') AS mes,YEAR(SYSDATE()) AS anio";
											$resultadoF = mysqli_query($conexion,$sqlF);
											$fecha = mysqli_fetch_assoc($resultadoF);
											$dia = $fecha['dia'];
											$mes = $fecha['mes'];
											$anio = $fecha['anio'];
											echo "value='$dia/$mes/$anio'";

										?>
									>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<p align="center">
								<input type="submit" value='Generar' class='btn btn-success'>
							</p>
						</div>
					</div>
				</form>

		<?php
			if(getTipoUsuario($_SESSION['login_user'])=='0'){
				echo"
				<div class='row'>
					<hr>
				</div>
				<form action='honorariosPorCliente.php' method='post' target='_blank' id='honorariosPorCliente'>
					<div class='row'>
						<h1 align='center'>Honorarios por Cliente:</h1>
					</div>
					<div class='row'>
						<div class='col-sm-3'>
							<p align='right'>
								Clientes:
							</p>
						</div>
						<div class='col-sm-6'>
							
								<div class='form-group'>
									<select name='cliente' id='cliente' required class='form-control'>
										<option value='todos'>Todos los clientes</option>
				";
											$sql= "SELECT * FROM cliente";
											$resultado = mysqli_query($conexion,$sql);
											while($clientes = mysqli_fetch_assoc($resultado)){
												$idCliente = $clientes['idCliente'];
												$nombreCliente = $clientes['nombre'];
												$apellidoCliente = $clientes['apellido'];
												echo"
													<option value='$idCliente'>$idCliente - $nombreCliente $apellidoCliente</option>
										        ";
											}
				echo"
									</select>
								</div>
						</div>
					</div>
					<div class='row'>
						<div class='form-group'>
							<p align='center'>
								<input type='submit' value='Generar' class='btn btn-primary'>
							</p>
						</div>
					</div>
				</form>
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
