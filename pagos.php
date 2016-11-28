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
<title>Pagos</title>
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

    			if(e.which!=46 &&(e.which<48 || e.which>57)){
    				return false;
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

    		$("#cliente").change(function(){
    			var idCliente = {
    				idCliente: $("#cliente").val()
    			}
    			$.get("getObligaciones.php",idCliente,imprimirOpciones);
    		});

    		$("#pagosCargados").hide();

    		$("#cargarPago").submit(function(){
    			var datos = {
    				idCliente : $("#cliente").val(),
    				idObligacion : $("#obligacion").val(),
    				mes : $("#mes").val(),
    				anio : $("#anio").val(),
    				fecha : $("#fecha").val(),
    				monto : $("#monto").val(),
    				banco : $("#banco").val()
    			}
    			$.post("cargarPago.php",datos,mostrarResultado);

    			return false;
    		});

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
				$("#pagosCargados").show().append(respuesta);
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
					<div id="pagosCargados">
						<h2 align='center'>Pagos Cargados: </h2>
					</div>
				</div>
				<div class="row">
					<h1 align="center">
						Cargar Pagos
					</h1>
				</div>
				<form id='cargarPago' action="#">
					<div class="row">
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-9">
							<div class="col-sm-4">
								<p align="right">Cliente: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<select name="cliente" id="cliente" required class='form-control'>
										<option value="0">Seleccionar Cliente</option>
										<?php
											$sql= "SELECT * FROM cliente WHERE habilitado = 1";
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
						<div class="col-sm-2">
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-9">
							<div class="col-sm-4">
								<p align="right">Obligación: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<select name="obligacion" id="obligacion" required class='form-control'>
										<?php/*
											$sql= "SELECT * FROM obligacion";
											$resultado = mysqli_query($conexion,$sql);
											while($obligaciones = mysqli_fetch_assoc($resultado)){
												$idObligacion = $obligaciones['idObligacion'];
												$descripcionObligacion = $obligaciones['descripcion'];
												echo"<option value='$idObligacion'>$idObligacion - $descripcionObligacion</option>";
											}
										*/?>
									</select>	
								</div>
							</div>
							
						</div>
						<div class="col-sm-2">
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-9">
							<div class="col-sm-4">
								<p align="right">Período: </p>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<select name="mes" id="mes" required class='form-control'>
										<?php
											$sqlA="SELECT MONTH(SYSDATE())";
											$resultadoA = mysqli_query($conexion,$sqlA);
											$aux = mysqli_fetch_row($resultadoA);
											$mes = $aux[0];
											echo"<option "; if($mes == 1){echo" selected ";} echo" value='1'>01</option>";
										echo"<option "; if($mes == 2){echo" selected ";} echo" value='2'>02</option>";
										echo"<option "; if($mes == 3){echo" selected ";} echo" value='3'>03</option>";
										echo"<option "; if($mes == 4){echo" selected ";} echo" value='4'>04</option>";
										echo"<option "; if($mes == 5){echo" selected ";} echo" value='5'>05</option>";
										echo"<option "; if($mes == 6){echo" selected ";} echo" value='6'>06</option>";
										echo"<option "; if($mes == 7){echo" selected ";} echo" value='7'>07</option>";
										echo"<option "; if($mes == 8){echo" selected ";} echo" value='8'>08</option>";
										echo"<option "; if($mes == 9){echo" selected ";} echo" value='9'>09</option>";
										echo"<option "; if($mes == 10){echo" selected ";} echo" value='10'>10</option>";
										echo"<option "; if($mes == 11){echo" selected ";} echo" value='11'>11</option>";
										echo"<option "; if($mes == 12){echo" selected ";} echo" value='12'>12</option>";
										?>
									</select>	
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<input class='form-control' required type="text" placeholder='Año (AAAA)' maxlength='4' minlength='4'  id='anio'
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
						<div class="col-sm-2">
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-9">
							<div class="col-sm-4">
								<p align="right">Fecha: </p>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<input class='fecha form-control' required type="text" placeholder='Fecha (DD/MM/AAAA)' maxlength='10' minlength='10'  id='fecha'
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
							<div class="col-sm-4">
								<div class="form-group">
									<input class='monto form-control' type="text" id='monto' required placeholder='Monto' >
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-9">
							<div class="col-sm-4">
								<p align="right">Centro de Pago: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<select name="banco" id="banco" required class='form-control'>
										<option value="0">Seleccionar Centro de Pago</option>
										<?php
											$sql= "SELECT * FROM banco";
											$resultado = mysqli_query($conexion,$sql);
											while($bancos = mysqli_fetch_assoc($resultado)){
												$idBanco = $bancos['idBanco'];
												$descripcion = $bancos['descripcion'];
												echo"
													<option value='$idBanco'>$idBanco - $descripcion</option>
										        ";
											}
										?>
									</select>
								</div>
							</div>
							
						</div>
						<div class="col-sm-2">
							
						</div>
					</div>
					<div class="row">
						<p align="center" id='noExiste'>
						</p>
					</div>
					<div class="row">
						<p align="center">
							<input type="submit" value='Cargar' class='btn btn-success'>
						</p>
					</div>
				</form>
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
