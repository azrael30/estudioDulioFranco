<?php
	include "session.php";
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

		$mes  = $_POST["mes"];
		if($mes<10){
			$mes = '0'.$mes;
		}
		$anio  = $_POST["anio"];
		
		$idPeriodo = $mes.$anio[2].$anio[3];

		$idObligacion = $_POST['obligacion'];

		$monto = $_POST['monto'];
		$vencimiento = $_POST['vencimiento'];

		$clientesCargados[] = "";

		if(!empty($_POST["clientes"])){
			foreach ($_POST["clientes"] as $idCliente) {
				$sql="SELECT * FROM obligacioncliente WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND habilitado = 1";
				$resultado = mysqli_query($conexion,$sql);
				if(mysqli_num_rows($resultado)>0){
					$sqlCarga="INSERT INTO occperiodo(idPeriodo, valor, impuesto, vencimiento, idObligacion, idCliente) VALUES('$idPeriodo', '$monto', 0, STR_TO_DATE('$vencimiento','%d/%m/%Y'), '$idObligacion', '$idCliente')";
					$resultadoCarga = mysqli_query($conexion,$sqlCarga);
					if($resultadoCarga){
						array_push($clientesCargados,$idCliente);
					}
				}
			}
		}else{
			$resultadoCarga = false;
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
			<?php
				if($resultadoCarga){
					echo"
						<div class='row'>
							<h1 align='center'>
								Período Generado:
							</h1>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<p align='right'>Período: </p>
							</div>
							<div class='col-sm-6'>
								<p align='left'>$mes/$anio</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<p align='right'>Obligación: </p>
							</div>
							<div class='col-sm-6'>
								<p align='left'>".getDescripcionObligacion($idObligacion)."</p>
							</div>
						</div>
					";

					if($idObligacion != "honorario"){
						if($vencimiento!=""){
							echo"
								<div class='row'>
									<div class='col-sm-6'>
										<p align='right'>Vencimiento: </p>
									</div>
									<div class='col-sm-6'>
										<p align='left'>$vencimiento</p>
									</div>
								</div>
							";
						}
						
						echo"
							<div class='row'>
								<div class='col-sm-6'>
									<p align='right'>Valor: </p>
								</div>
								<div class='col-sm-6'>
									<p align='left'>$monto</p>
								</div>
							</div>
						";
					}
					

					echo"
						<div class='row'>
							<div class='col-sm-12'>
								<h2 align='center'>Clientes: </h2>
							</div>
						</div>
						<div class='row'>
							<p align='center'>
					";

					foreach ($clientesCargados as $idCliente) {
						echo getNombreApellido($idCliente);
						echo "<br>";
					}

					echo"	
							</p>
						</div>
						<div class='row'>
							<br>
							<p align='center'>
								<a href='generador.php' class='btn btn-success'>Generar otro</a>
							</p>
						</div>
						";
				}else{
					echo"
						<div class='row'>
							<p align='center'>
								Se ha producido un error. Por favor intentalo nuevamente. <br><br>
								<a href='generador.php' class='btn btn-success'>Volver</a>
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
