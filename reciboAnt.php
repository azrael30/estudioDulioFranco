<?php
	include "session.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php 
		include "conecto.php"; 
		require "funciones.php";
?>
<?php
	$idRecibo = $_GET['id'];
	$usuario = $_SESSION['login_user'];
	if(getTipoUsuario($usuario)!=0){
		$sql = "SELECT * FROM recibo WHERE nroRecibo = '$idRecibo' AND username = '$usuario'";
		$resultado = mysqli_query($conexion,$sql);
		if(mysqli_num_rows($resultado)==0){
			die("ERROR");
		}
	}
	
?>
<title>Recibo No. <?php echo $idRecibo; ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="estilospanel.css">
    <script src="js/jquery.js"></script>
    <script>
    	$(document).ready(function(){
    		
    	});
    </script>
</head>

<body class='recibo'>
	
	<?php
		
		$sql = "SELECT anulado, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM recibo WHERE nroRecibo ='$idRecibo'";
		$resultado = mysqli_query($conexion,$sql);
		$recibo = mysqli_fetch_assoc($resultado);
		$fecha = $recibo['fecha'];
		$anulado = $recibo['anulado'];
		$sql="SELECT idCliente FROM cobro WHERE nroRecibo = '$idRecibo'";
		$resultado = mysqli_query($conexion,$sql);
		$cliente = mysqli_fetch_assoc($resultado);
		$idCliente = $cliente['idCliente'];		
				
	?>
	<div class="containerRecibo">
		<div class="row">
			<div class="col-xs-7">
				<h3>NOMBRE y APELLIDO</h3>
			</div>
			<div class="col-xs-5">
				<h3 align='right'>RECIBO No. <?php echo $idRecibo; ?></h3>
				<p align='right'><b>FECHA:</b> <?php echo $fecha; ?></p>
			</div>
		</div>
		<!--<div class="row">
			<hr>
		</div>-->
		<div class="row">
			<div class="col-xs-7">
				<p><b>Señor/a:</b> &nbsp; <?php echo getNombreApellido($idCliente); ?></p>
			</div>
			<div class="col-xs-5">
				<p align='right'><b>CUIT:</b> &nbsp; <?php echo getCuit($idCliente); ?></p>
			</div>
		</div>
		<div class="row">
			<hr>
		</div>
		<?php
			if($anulado==1){
				echo"
					<div class='row'>
						<h1 align='center'>- ANULADO -</h1>
					</div>
					<div class='row'>
						<hr>
					</div>
					<div class='row'>
						<hr>
					</div>
				";
				die();
			}else{
				$total = 0;
				$sql = "SELECT * FROM cobro WHERE nroRecibo = '$idRecibo'";
				$resultado = mysqli_query($conexion,$sql);
				$alternado = 0;
				while($cobro = mysqli_fetch_assoc($resultado)){
					$obligacion = getDescripcionObligacion($cobro['idObligacion']);
					$idPeriodo = $cobro['idPeriodo'];
					$periodo = $idPeriodo[0].$idPeriodo[1]."/".$idPeriodo[2].$idPeriodo[3];
					$valor = $cobro['valor'];
					echo"
						<div class='row alternado-$alternado'>
							<div class='col-xs-8'>
								$obligacion - $periodo
							</div>
							<div class='col-xs-4'>
								<p align='right'>
									".number_format($valor,2,'.','')."
								</p>
							</div>
						</div>
					";
					$total += $valor;
					if($alternado == 0){
						$alternado = 1;
					}else{
						$alternado = 0;
					}
				}
				echo"
					<div class='row'>
						<hr>
					</div>
					<div class='row'>
						<div class='col-xs-8'>
							<b>TOTAL:</b>
						</div>
						<div class='col-xs-4'>
							<p align='right'>
								<b>".number_format($total,2,'.','')."</b>
							</p>
						</div>
					</div>
					<div class='row'>
						<br> <br>
					</div>
					<div class='row'>
						<div class='col-xs-1'>
							
						</div>
						<div class='col-xs-4'>
							<hr> <br>
							<p class='sub' align='center'>FIRMA</p>
						</div>
						<div class='col-xs-2'>
							
						</div>
						<div class='col-xs-4'>
							<hr> <br>
							<p class='sub' align='center'>ACLARACIÓN
						<div class='col-xs-1'>
							
						</div>
					</div>
				";
			}
		?>

		
	</div>
    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
