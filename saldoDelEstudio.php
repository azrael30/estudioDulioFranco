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
	<title>Cuenta Corriente por Cliente</title>
</head>
<body>
	<div class="pagina">
		<table width='100%' id='saldoDelEstudio'>
			<?php
				if(isset($_GET['sinLimiteTemporal']) && $_GET['sinLimiteTemporal'] == 'checked'){
					$sinLimiteTemporal = true;
				}else{
					$sinLimiteTemporal = false;
				}
				if(!$sinLimiteTemporal){
					$desde = $_GET['desde'];
					$hasta = $_GET['hasta'];
				}
				$importeTotal = 0;
				$interesTotal = 0;
				$cobroTotal = 0;
				$pagoTotal = 0;
				$saldoTotal = 0;
			?>
			<tr>
				<td colspan="8">
					<?php
						if($sinLimiteTemporal){
							echo"<h1 align='center'>Saldo del Estudio</h1><p align='center'>al ".getFechaDelSistema()."</p>";
						}else{
							if($desde == $hasta){
								echo"<h1 align='center'>Saldo del Estudio </h1><p align='center'> $desde</p>";
							}else{
								echo"<h1 align='center'>Saldo del Estudio </h1><p align='center'> Desde $desde - Hasta $hasta</p>";
							}
							
						}
					?>
				</td> 
			</tr>
			<tr>
				<td width='20%'> <p align="center"> Cliente</p></td>
				<td width='17%'> <p align="center"> Obligación </p></td>
				<td width='10.5%'> <p align="center"> Período</p></td>
				<td width='10.5%'> <p align="center"> Importe</p></td>
				<td width='10.5%'> <p align="center"> Interés</p></td>
				<td width='10.5%'> <p align="center"> Cobro</p></td>
				<td width='10.5%'> <p align="center"> Pago</p></td>
				<td width='10.5%'> <p align="center"> Saldo</p></td>
			</tr>
			<?php
				$sql = "SELECT DISTINCT occperiodo.idCliente, occperiodo.idObligacion, occperiodo.idPeriodo, occperiodo.valor, occperiodo.impuesto, occperiodo.saldado FROM occperiodo 

					INNER JOIN pago ON occperiodo.idCliente = pago.idCliente AND occperiodo.idObligacion = pago.idObligacion AND occperiodo.idPeriodo = pago.idPeriodo 

					WHERE pago.fecha BETWEEN STR_TO_DATE('$desde','%d/%m/%Y') AND STR_TO_DATE('$hasta', '%d/%m/%Y') 

					UNION

					SELECT DISTINCT occperiodo.idCliente, occperiodo.idObligacion, occperiodo.idPeriodo, occperiodo.valor, occperiodo.impuesto, occperiodo.saldado FROM occperiodo 

					INNER JOIN cobro ON occperiodo.idCliente = cobro.idCliente AND occperiodo.idObligacion = cobro.idObligacion AND occperiodo.idPeriodo = cobro.idPeriodo 

					WHERE cobro.fecha BETWEEN STR_TO_DATE('$desde','%d/%m/%Y') AND STR_TO_DATE('$hasta', '%d/%m/%Y') 

					ORDER BY idObligacion, idCliente";
				if($sinLimiteTemporal){
					$sql="SELECT * FROM occperiodo ORDER BY idObligacion, idCliente";
				}
				$resultado=mysqli_query($conexion,$sql);
				while($fila=mysqli_fetch_assoc($resultado)){
					$cobro = getSumaCobro($fila['idPeriodo'],$fila['idCliente'],$fila['idObligacion']);
					$pago = getSumaPago($fila['idPeriodo'],$fila['idCliente'],$fila['idObligacion']);
					if($cobro == ""){
						$cobro = 0;
					}
					if($pago == ""){
						$pago = 0;
					}
					$saldo = $pago - $cobro;
					$saldado = $fila['saldado'];
					$p = $fila['idPeriodo'];
					$periodo = $p[0].$p[1]."/".$p[2].$p[3];

					
								
					if($saldo != 0 && $saldado == 0){
						$importeTotal += $fila['valor'];
						$interesTotal += $fila['impuesto'];
						$cobroTotal += $cobro;
						$pagoTotal += $pago;
						$saldoTotal += $saldo;
						echo"
							<tr>
								<td>".$fila['idCliente']."</td>
								<td>".$fila['idObligacion']."</td>
								<td>".$periodo."</td>
								<td class='numero'>".number_format($fila['valor'],2,'.','')."</td>
								<td class='numero'>".number_format($fila['impuesto'],2,'.','')."</td>
								<td class='numero'>".number_format($cobro,2,'.','')."</td>
								<td class='numero'>".number_format($pago,2,'.','')."</td>
								<td class='numero'>".number_format($saldo,2,'.','')."</td>
							</tr>
						";
					}
					
				}
				if(mysqli_num_rows($resultado)==0){
					echo"
						<tr >
							<td colspan='6'>No se encontraron resultados</td>
						</tr>
					";
				}else{
					echo"
							<tr>
								<td colspan='3'><b>Total</b></td>
								<td class='numero'><b>".number_format($importeTotal,2,'.','')."</b></td>
								<td class='numero'><b>".number_format($interesTotal,2,'.','')."</b></td>
								<td class='numero'><b>".number_format($cobroTotal,2,'.','')."</b></td>
								<td class='numero'><b>".number_format($pagoTotal,2,'.','')."</b></td>
								<td class='numero'><b>".number_format($saldoTotal,2,'.','')."</b></td>
							</tr>
						";
				}
			?>
		</table>
	</div>
</body>
</html>