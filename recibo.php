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

<body class='recibo' style="overflow-y: hidden; overflow-x: hidden">
	
	<?php
		
		$sql = "SELECT anulado, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha, comentario FROM recibo WHERE nroRecibo ='$idRecibo'";
		$resultado = mysqli_query($conexion,$sql);
		$recibo = mysqli_fetch_assoc($resultado);
		$fecha = $recibo['fecha'];
		$anulado = $recibo['anulado'];
		$comentario = $recibo['comentario'];	

		$sql="SELECT idCliente FROM cobro WHERE nroRecibo = '$idRecibo'";
		$resultado = mysqli_query($conexion,$sql);
		$cliente = mysqli_fetch_assoc($resultado);
		$idCliente = $cliente['idCliente'];	

				
	?>
	<div class="containerRecibo" style=" overflow-y: hidden; overflow-x: hidden">
		<?php
			$print = "
				
				<div class='row'>
					<div class='col-xs-4'>
						<p><b> &nbsp;  &nbsp;  &nbsp; Señor/a:</b> &nbsp; ".getNombreApellido($idCliente)."</p>
					</div>
					<div class='col-xs-4'>
						<p align='center'><b>RECIBO No. $idRecibo</b></p>
					</div>
					<div class='col-xs-4'>
						<p align='right'><b>FECHA:</b> $fecha</p>
					</div>
				</div>
				<div class='rowh'>
					<hr>
				</div>
			";
		?>
		<?php
			if($anulado==1){
				$print.="
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
				echo $print;
				die();
			}else{
				$total = 0;
				$sql = "SELECT * FROM cobro WHERE nroRecibo = '$idRecibo'";
				$resultado = mysqli_query($conexion,$sql);
				$alternado = 0;
				$filas = 12;
				while($cobro = mysqli_fetch_assoc($resultado)){
					$filas --;
					$obligacion = getDescripcionObligacion($cobro['idObligacion']);
					$idPeriodo = $cobro['idPeriodo'];
					$periodo = $idPeriodo[0].$idPeriodo[1]."/".$idPeriodo[2].$idPeriodo[3];
					$valor = $cobro['valor'];
					$print.="
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
				while($filas > 0){
					$filas--;
					$print.="
						<div class='row alternado-$alternado'>
							<div class='col-xs-8'>
								<p>&nbsp;</p>
							</div>
							<div class='col-xs-4'>
								<p>&nbsp;</p>
							</div>
						</div>
					";
					if($alternado == 0){
						$alternado = 1;
					}else{
						$alternado = 0;
					}
				}
				$print.="
					<div class='rowh'>
						<hr>
					</div>
					<div class='row'>
						<div class='col-xs-8'>
							<b> &nbsp;  &nbsp;  &nbsp; TOTAL:</b>
						</div>
						<div class='col-xs-4'>
							<p align='right'>
								<b>".number_format($total,2,'.','')."</b>
							</p>
						</div>
					</div>
					<div class='row'>
						
						<p align='center'>".$comentario."</p>
						<br>
						<br><br>
					</div>
					<!--<div class='row'>
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
					</div>-->
				";
			}
		?>
		<?php

			echo $print;
			echo"<div class='rowh'><hr></div>";
			echo $print;
		?>

		
	</div>
    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
