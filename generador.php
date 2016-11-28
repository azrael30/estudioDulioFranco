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
<title>Generar Obligación</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="estilospanel.css">
    <script src="js/jquery.js"></script>
    <script>
    	$(document).ready(function(){
    		$("#calcularSubtotal").hide();
    		var parte = window.location.pathname.split( '/' );
    		$("a").each(function(){
    			if( $(this).attr("href")==parte[1] || $(this).attr("href")==parte[2] || $(this).attr("href")==parte[3] || $(this).attr("href")==parte[4] ){
    				$(this).addClass("activated");
    			}
    		});

    		$(".anio").keypress(function(e){
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    		});

    		$(".monto").keypress(function(e){
    			if(e.which<46 || e.which>57){
    				return false;
    			}
    		});

    		$(".vencimiento").keypress(function(e){
    			if($(this).val().length==2){
    				$(this).val($(this).val()+'/');
    			}else if($(this).val().length==5){
    				$(this).val($(this).val()+'/');
    			}
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    		});

    		$("#seleccionarTodosCheckbox").change(function(){
    			
    			if($("#seleccionarTodosCheckbox").is(':checked')){
    				$("input").prop("checked", "checked");
    			}else{
    				$("input").prop("checked", "");
    			}
    			
    		});
    		$("#clientes2").change(function(){
    			$("#calcularSubtotal").fadeIn();
    			$("#subtotal").html("0");
    			var codigo = {
    				idCliente: $("#clientes2").val()
    			}
    			$.post("imprimirObligaciones.php",codigo,function(respuesta){
    				$("#sectorObligaciones").html(respuesta);
    				$(".monto").keypress(function(e){
		    			if(e.which<45 || e.which>57){
		    				return false;
		    			}
    				});
    				$("#calcularSubtotal").click(function(){
    					importe_total = 0
						$(".obli").each(
							function(index, value) {
								if($(this).val()!= ""){
									importe_total = importe_total + eval($(this).val());
								}
								
							}
						);
						$("#subtotal").html(importe_total);
    				});
    			});
    		});

    		/*$("#obligacion").change(function(){
    			if($("#honorario").is(':selected')){
    				$("#monto").attr("disabled","enabled");
    				$("#vencimiento").attr("disabled","enabled");
    			}else{
    				$("#monto").removeAttr("disabled");
    				$("#vencimiento").removeAttr("disabled");
    			}
    		});*/
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
		<div class="contenido">
			<div class="col-sm-6">
				<div class="row">
					<h2 align="center">
						Generar por Obligación
					</h2>
				</div>
				<form action="generar.php" method="post" id="generador">
					<div class="row">

							<div class="col-sm-4">
								<p align="right">Período: </p>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<select name="mes" class="mes" required class='form-control'>
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
									<input class='anio form-control' name='anio' required type="text" placeholder='Año (AAAA)' maxlength='4' 
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
							<div class="col-sm-4">
								<p align="right">Obligación: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<select name="obligacion" id="obligacion" required class='form-control'>
										
										<?php
											$sql= "SELECT * FROM obligacion";
											$resultado = mysqli_query($conexion,$sql);
											while($obligaciones = mysqli_fetch_assoc($resultado)){
												$idObligacion = $obligaciones['idObligacion'];
												$descripcionObligacion = $obligaciones['descripcion'];
												echo"<option value='$idObligacion'>$idObligacion - $descripcionObligacion</option>";
											}
										
											
										?>
									</select>	
								</div>
							</div>
					</div>
					<div class="row">

							<div class="col-sm-4">
								<p align="right">Monto: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<input type="text" required class="monto form-control" value="1" name="monto">
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-sm-4">
								<p align="right">Vencimiento: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<input class='vencimiento form-control' type="text" name='vencimiento' placeholder='DD/MM/AAAA' maxlength='10'>
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-sm-4">
								<p align="right">Clientes: </p>
							</div>
							<div class="col-sm-8">
								<div class='form-group'>
									<div class='checkbox'>
										<label>
											<input type='checkbox' id='seleccionarTodosCheckbox'>
											Seleccionar TODOS
										</label>
									</div>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							
						</div>
						<div class="col-sm-10">
								<?php
									$sql= "SELECT * FROM cliente WHERE habilitado = 1";
									$resultado = mysqli_query($conexion,$sql);
									while($clientes = mysqli_fetch_assoc($resultado)){
										$idCliente = $clientes['idCliente'];
										$nombreCliente = $clientes['nombre'];
										$apellidoCliente = $clientes['apellido'];
										echo"
											<div class='subtitulo'>
								                <div class='checkbox'>
								                    <label>
								                        <input type='checkbox' name='clientes[]' class='clientes' value='$idCliente'>
								                        $idCliente - $nombreCliente $apellidoCliente
								                    </label>
								                </div>
								            </div>
								        ";
									}
								?>
						</div>
					</div>
					<div class="row">
						<p align="center">
							<input type="submit" value='Cargar' class='btn btn-success'>
						</p>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<h2 align="center">
						Generar por Cliente
					</h2>
				</div>
				<form action="generarPorCliente.php" method="post">
					<div class="row">

							<div class="col-sm-4">
								<p align="right">Período: </p>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<select name="mes" required class='form-control'>
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
									<input class='anio form-control' name='anio' required type="text" placeholder='Año (AAAA)' maxlength='4' 
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
					<!--<div class="row">
							<div class="col-sm-4">
								<p align="right">Vencimiento: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<input class='vencimiento form-control' type="text" name='vencimiento' placeholder='DD/MM/AAAA' maxlength='10' >
								</div>
							</div>
					</div>-->
					<div class="row">
							<div class="col-sm-4">
								<p align="right">Clientes: </p>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<select name="clientes" id="clientes2" required class='form-control'>
										<option value=''>Seleccionar cliente</option>
										<?php
											$sql= "SELECT * FROM cliente";
											$resultado = mysqli_query($conexion,$sql);
											while($clientes = mysqli_fetch_assoc($resultado)){
												$idCliente = $clientes['idCliente'];
												$nombre = $clientes['nombre'];
												$apellido = $clientes['apellido'];
												echo"<option value='$idCliente'>$idCliente - $apellido $nombre</option>";
											}
										
											
										?>
									</select>	
								</div>
							</div>
					</div>
					<div class="row">
							<div class="col-sm-4">
								<p align="right">Obligaciones: </p>
							</div>
					</div>
					<div class="row">
						<div id="sectorObligaciones">
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-7">
							<p align="right">
								<a href="#" class="btn btn-primary" id="calcularSubtotal">Calcular Subtotal</a>
							</p>
						</div>
						<div class="col-sm-5">
							<p id="subtotal"></p>
						</div>
					</div>
					<div class="row">
						<p align="center">
							<input type="submit" value='Cargar' class='btn btn-success'>
						</p>
					</div>
				</form>
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
