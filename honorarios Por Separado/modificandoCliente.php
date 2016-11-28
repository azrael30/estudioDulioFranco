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
    	});
    </script>
</head>

<body>
	<?php 
		include "conecto.php"; 
		
		require "funciones.php";
	?>
	<?php
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$idCliente = $_POST["idCliente"];
		$cuit = $_POST["cuit"];
		$cuitSQL = $cuit[0].$cuit[1].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9].$cuit[10].$cuit[12];
		$fechaNacimiento = $_POST["fechaNacimiento"];
		$nacionalidad = $_POST["nacionalidad"];
		$mail = $_POST["mail"];
		$telefonoFijo = $_POST["telefonoFijo"];
		$celular = $_POST["celular"];
		$compania = $_POST["compania"];
		$honorarioBase = $_POST["honorarioBase"];
		$sql = "UPDATE cliente SET apellido = '$apellido', celular = '$celular', companiaCelular = '$compania', honorarioBase = '$honorarioBase', CUIT = '$cuitSQL', fechaNacimiento = STR_TO_DATE('$fechaNacimiento', '%d/%m/%Y'), mail = '$mail', nacionalidad = '$nacionalidad', nombre = '$nombre', telefonoFijo = '$telefonoFijo' WHERE idCliente = '$idCliente'";
		$resultado = mysqli_query($conexion,$sql);
		if(!empty($_POST["obligaciones"]) && $resultado == true){
			foreach ($_POST["obligaciones"] as $idObligacion) {
				$sqlCheck = "SELECT * FROM obligacioncliente WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
				$resultadoCheck = mysqli_query($conexion,$sqlCheck);
				if(mysqli_num_rows($resultadoCheck)==0){//la obligacion no esta asociada al cliente
					if(getCategorizar($idObligacion)==1){
						$idCategoria = $_POST["categoria$idObligacion"];
						$sqli = "INSERT INTO obligacioncliente(idCliente, idObligacion, idCategoria) VALUES ('$idCliente', '$idObligacion', '$idCategoria')";
					}else{
						$sqli = "INSERT INTO obligacioncliente(idCliente, idObligacion, idCategoria) VALUES ('$idCliente', '$idObligacion', NULL)";
					}
				}else{//está asociada al cliente, puede que esté deshabilitada. Hay que habilitarla
					if(getCategorizar($idObligacion)==1){
						$idCategoria = $_POST["categoria$idObligacion"];
						$sqli = "UPDATE obligacioncliente SET habilitado = 1, idCategoria = '$idCategoria' WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
					}else{
						$sqli = "UPDATE obligacioncliente SET habilitado = 1 WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
					}
					
				}
				
				$resultadoi = mysqli_query($conexion,$sqli);
			}
		}

		$sql = "SELECT * FROM obligacioncliente WHERE idCliente = '$idCliente'";
		$resultado = mysqli_query($conexion,$sql);
		while($obligacioncliente = mysqli_fetch_assoc($resultado)){
			$cont = 0;
			foreach ($_POST["obligaciones"] as $idObligacion) {
				if($idObligacion == $obligacioncliente['idObligacion']){
					$cont++;
				}
			}
			if($cont==0){
				$sqlDeshabilitar = "UPDATE obligacioncliente SET habilitado = 0 WHERE idCliente = '$idCliente' AND idObligacion = '".$obligacioncliente['idObligacion']."'";
				$resultadoDeshabilitar = mysqli_query($conexion, $sqlDeshabilitar);
			}
		}
		
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
			<div class="row">
				<?php
					if($resultado){
						$sql="SELECT DATE_FORMAT(fechaNacimiento,'%d/%m/%Y') AS fechaNacimiento, apellido, celular, honorarioBase, companiaCelular, CUIT, idCliente, mail, nacionalidad, nombre, telefonoFijo FROM cliente WHERE idCliente ='$idCliente'";
						$resultado = mysqli_query($conexion,$sql);
						$cliente=mysqli_fetch_assoc($resultado);
						$cuit = $cliente['CUIT'];
						$cuitAimprimir = $cuit[0].$cuit[1]."-".$cuit[2].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9]."-".$cuit[10];

						echo"
							<div class='row'>
								<h1 align='center'>Cliente Modificado: </h1>
							</div>
							<div class='row'>
								<h2 align='center'>".$cliente['nombre']." ".$cliente['apellido']."</h2>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<p align='right'>
										Código de Cliente:
									</p>
								</div>
								<div class='col-sm-6'>
									<p align='left'>
										".$cliente['idCliente']."
									</p>
								</div>
							</div>
							<div class='row'>
								<div class='col-sm-6'>
									<p align='right'>
										CUIT:
									</p>
								</div>
								<div class='col-sm-6'>
									<p align='left'>
										".$cuitAimprimir."
									</p>
								</div>
							</div>
							";
							if($cliente['fechaNacimiento']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Fecha de Nacimiento:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['fechaNacimiento']."
										</p>
									</div>
								</div>
								";
							}
							
							if($cliente['nacionalidad']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Nacionalidad:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['nacionalidad']."
										</p>
									</div>
								</div>
								";
							}
							
							if($cliente['mail']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Correo electrónico:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['mail']."
										</p>
									</div>
								</div>
								";
							}
							
							if($cliente['telefonoFijo']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Teléfono Fijo:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['telefonoFijo']."
										</p>
									</div>
								</div>
								";
							}
							
							if($cliente['celular']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Celular:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['celular']."
										</p>
									</div>
								</div>
								";
							}
							
							if($cliente['companiaCelular']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Compañía telefónica:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['companiaCelular']."
										</p>
									</div>
								</div>
								";
							}
							if($cliente['honorarioBase']!=""){
								echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>
											Honorario Base:
										</p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>
											".$cliente['honorarioBase']."
										</p>
									</div>
								</div>
								";
							}
							echo"
								<div class='row'>
									<h2 align='center'>Obligaciones Asignadas: </h2>
								</div>
								<div class='row'>
									<p align='center'>
										".getObligacionesDe($idCliente)."
									</p>
									
								</div>
							";
							echo"
								<div class='row'>
									<p align='center'>
										<a href='modificacionBajaCliente.php' class='btn btn-success'>Volver</a>
									</p>
								</div>
							";
					}else{
						echo"
							<div class='row'>
								<p align='center'>
									Se ha producido un error. <br> <br>
									<a href='ingresarCliente.php' class='btn btn-success'>Vuelve a intentarlo</a>
								</p>
							</div>
						";
					}
				?>
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
