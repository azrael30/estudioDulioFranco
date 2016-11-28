<?php
	include "session.php";
	include "conecto.php"; 
	require "funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="informe.css">
	<title>Cobros Por Fecha</title>
</head>
<body>
	<div class="pagina">
		<table width='100%' id='cobroPago'>
			<?php
				$idCliente = $_GET['cliente'];
				$fecha = $_GET['fecha'];
				$importeTotal = 0;
				if($idCliente == "todos"){
					echo"
						<tr>
							<td colspan='4'>
								<h1 align='center'> Cobros de Todos los Clientes</h1>  <p align='center'>$fecha</p>
							</td> 
						</tr>
						<tr>
							<td width='30%'> <p align='center'> Cliente</p></td>
							<td width='30%'> <p align='center'> Obligación </p></td>
							<td width='20%'> <p align='center'> Período</p></td>
							<td width='20%'> <p align='center'> Importe</p></td>
						</tr>

					";
					$sql = "SELECT * FROM cobro INNER JOIN recibo ON cobro.nroRecibo = recibo.nroRecibo WHERE recibo.fecha = STR_TO_DATE('$fecha','%d/%m/%Y')";
					$resultado = mysqli_query($conexion,$sql);
					while($fila = mysqli_fetch_assoc($resultado)){
						$p = $fila['idPeriodo'];
						$periodo = $p[0].$p[1]."/".$p[2].$p[3];
						$importeTotal += $fila['valor'];
						echo"
							<tr>
								<td>".getNombreApellido($fila['idCliente'])."</td>
								<td>".getDescripcionObligacion($fila['idObligacion'])."</td>
								<td>$periodo</td>
								<td class='numero'>".number_format($fila['valor'],2,'.','')."</td>
							</tr>
						";
					}
					if(mysqli_num_rows($resultado)==0){
						echo"
							<tr >
								<td colspan='4'>No se encontraron resultados</td>
							</tr>
						";
					}else{
						echo"
							<tr >
								<td colspan='3'><b>Total</b></td>
								<td class='numero'><b>".number_format($importeTotal,2,'.','')."</b></td>
							</tr>
						";
					}
				}else{
					echo"
						<tr>
							<td colspan='4'>
								<h1 align='center'> Cobros de ".getNombreApellido($idCliente)."</h1>  <p align='center'>$fecha</p>
							</td> 
						</tr>
						<tr>
							<td width='40%'> <p align='center'> Obligación </p></td>
							<td width='30%'> <p align='center'> Período</p></td>
							<td width='30%'> <p align='center'> Importe</p></td>
						</tr>

					";
					$sql = "SELECT * FROM cobro INNER JOIN recibo ON cobro.nroRecibo = recibo.nroRecibo WHERE recibo.fecha = STR_TO_DATE('$fecha','%d/%m/%Y') AND cobro.idCliente = '$idCliente'";
					$resultado = mysqli_query($conexion,$sql);
					while($fila = mysqli_fetch_assoc($resultado)){
						$p = $fila['idPeriodo'];
						$periodo = $p[0].$p[1]."/".$p[2].$p[3];
						$importeTotal += $fila['valor'];
						echo"
							<tr>
								<td>".getDescripcionObligacion($fila['idObligacion'])."</td>
								<td>$periodo</td>
								<td class='numero'>".number_format($fila['valor'],2,'.','')."</td>
							</tr>
						";
					}
					if(mysqli_num_rows($resultado)==0){
						echo"
							<tr >
								<td colspan='3'>No se encontraron resultados</td>
							</tr>
						";
					}else{
						echo"
							<tr >
								<td colspan='2'><b>Total</b></td>
								<td class='numero'><b>".number_format($importeTotal,2,'.','')."</b></td>
							</tr>
						";
					}
				}
			?>
			
		</table>
	</div>
</body>
</html>