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
		<table width='100%' id='cuentaCorriente'>
			<?php
				$idCliente = $_GET['cliente'];
				$fechaDelSistema = getFechaDelSistema();
				if(isset($_GET['sinLimiteTemporal']) && $_GET['sinLimiteTemporal'] == 'checked'){
					$sinLimiteTemporal = true;
				}else{
					$sinLimiteTemporal = false;
				}
				if(!$sinLimiteTemporal){
					$mesDesde = $_GET['mesDesdeG'];
					$anioDesde = $_GET['anioDesdeG'];
					$mesHasta = $_GET['mesHastaG'];
					$anioHasta = $_GET['anioHastaG'];

					if($mesDesde < 10){
						$desde= "0".$mesDesde.$anioDesde[2].$anioDesde[3];
					}else{
						$desde= $mesDesde.$anioDesde[2].$anioDesde[3];
					}
					if($mesHasta < 10){
						$hasta= "0".$mesHasta.$anioHasta[2].$anioHasta[3];
					}else{
						$hasta= $mesHasta.$anioHasta[2].$anioHasta[3];
					}
				}



				if(isset($_GET['saldoNoCero']) && $_GET['saldoNoCero'] == 'checked'){
					$saldoNoCero = true;
				}else{
					$saldoNoCero = false;
				}
			?>
			<?php
			if(!isset($_GET['cobro'])){
				echo"
					<tr>
					<td colspan='7'>
					<h1 align='center'>". getNombreApellido($idCliente)."</h1>
				";
				if($sinLimiteTemporal){
					echo"<p align='center'>Cuenta Corriente <br> al $fechaDelSistema</p>";
				}else{
					if($desde == $hasta){
						echo"<p align='center'>Cuenta Corriente <br> $desde[0]$desde[1]/$anioDesde</p>";
					}else{
						echo"<p align='center'>Cuenta Corriente <br> Desde $desde[0]$desde[1]/$anioDesde - Hasta $hasta[0]$hasta[1]/$anioHasta</p>";
					}		
				}
				echo"
							<p align='right'>CUIT:". getCuit($idCliente)." &nbsp; </p>
						</td> 
					</tr>
				";
			}
			
			?>

					
			<tr>
				<td width='20%'> <p align="center"> Obligación </p></td>
				<td width='11.428%'> <p align="center"> Período</p></td>
				<td width='11.428%'> <p align="center"> Importe</p></td>
				<td width='11.428%'> <p align="center"> Fecha Pedido</p></td>
				<td width='11.428%'> <p align="center"> Cobro</p></td>
				<td width='11.428%'> <p align="center"> Fecha Cobro</p></td>
				<td width='11.428%'> <p align="center"> Deuda</p></td>
			</tr>
			<?php
				$sql = "SELECT idObligacion, idPeriodo, valor, impuesto, saldado, DATE_FORMAT(vencimiento, '%d/%m/%y') AS fecha FROM occperiodo WHERE idCliente = '$idCliente' ";
				if(!$sinLimiteTemporal){
					$sql.=" AND STR_TO_DATE(idPeriodo,'%m%y') BETWEEN STR_TO_DATE('$desde','%m%y') AND STR_TO_DATE('$hasta', '%m%y')";
				}
				$resultado=mysqli_query($conexion,$sql);
				$importeTotal = 0;
				$interesTotal = 0;
				$cobroTotal = 0;
				$pagoTotal = 0;
				$deudaTotal = 0;

				while($fila=mysqli_fetch_assoc($resultado)){
					$cobro = getSumaCobro($fila['idPeriodo'],$idCliente,$fila['idObligacion']);
					$fechaCobro = getFechaRecibo($fila['idPeriodo'],$idCliente,$fila['idObligacion']);
					$pago = getSumaPago($fila['idPeriodo'],$idCliente,$fila['idObligacion']);
					if($cobro == ""){
						$cobro = 0;
					}
					if($pago == ""){
						$pago = 0;
					}
					if(($fila['valor'] + $fila['impuesto'])>$pago){
						$deuda = $fila['valor'] + $fila['impuesto'] - $cobro;
					}else{
						$deuda = $pago - $cobro;
					}
					
					$saldado = $fila['saldado'];
					$p = $fila['idPeriodo'];
					$periodo = $p[0].$p[1]."/".$p[2].$p[3];
					
					if(!$saldoNoCero){
						echo"
							<tr>
								<td>".getDescripcionObligacion($fila['idObligacion'])."</td>
								<td>".$periodo."</td>
								<td class='numero'>".number_format($fila['valor'],2,'.','')."</td>
								<td>".$fila['fecha']."</td>
								<td class='numero'>".number_format($cobro,2,'.','')."</td>
								<td>$fechaCobro</td>
								<td class='numero'>".number_format($deuda,2,'.','')."</td>
							</tr>
						";
						$importeTotal += $fila['valor'];
						$interesTotal += $fila['impuesto'];
						$cobroTotal += $cobro;
						$pagoTotal += $pago;
						$deudaTotal += $deuda;
					}else{
						if($deuda != 0 && $saldado == 0){
							echo"
								<tr>
									<td>".getDescripcionObligacion($fila['idObligacion'])."</td>
									<td>".$periodo."</td>
									<td class='numero'>".number_format($fila['valor'],2,'.','')."</td>
									<td>".$fila['fecha']."</td>
									<td class='numero'>".$cobro."</td>
									<td>$fechaCobro</td>
									<td class='numero'>".number_format($deuda,2,'.','')."</td>
								</tr>
							";
							$importeTotal += $fila['valor'];
							$interesTotal += $fila['impuesto'];
							$cobroTotal += $cobro;
							$pagoTotal += $pago;
							$deudaTotal += $deuda;
						}
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
									<td colspan='2'><b>TOTAL</b></td>
									<td class='numero'><b>".number_format($importeTotal,2,'.','')."</b></td>
									<td><b>&nbsp;</b></td>
									<td class='numero'><b>".number_format($cobroTotal,2,'.','')."</b></td>
									<td><b>&nbsp;</b></td>
									<td class='numero'><b>".number_format($deudaTotal,2,'.','')."</b></td>
								</tr>
					";
				}
			?>
		</table>
	</div>
</body>
</html>