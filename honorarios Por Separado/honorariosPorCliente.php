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
	<title>Honorarios</title>
</head>
<body>
	<div class="pagina">
		<table width='100%' id='cuentaCorriente'>
			<?php
				$idCliente = $_POST['cliente'];
				$fechaDelSistema = getFechaDelSistema();
			?>
			<tr>
				<?php
					if($idCliente == "todos"){
						echo"<td colspan='5'>";
					}else{
						echo"<td colspan='4'>";
					}

				?>
				
					<?php
						if($idCliente == "todos"){
							echo"<h1 align='center'>Honorarios</h1>";
						}else{
							echo"<h1 align='center'>Honorarios".getNombreApellido($idCliente)."</h1>";
						}

					?>
					
					<?php
						echo"<p align='center'> al $fechaDelSistema</p>";
					
						if($idCliente != "todos"){
							echo"<p align='right'>CUIT:".getCuit($idCliente)." &nbsp; </p>";
						}
						
					?>
				</td> 
			</tr>
			<?php
				if($idCliente == "todos"){
					echo"
						<tr>
							<td width='20%'> <p align='center'> Cliente</p></td>
							<td width='20%'> <p align='center'> Período</p></td>
							<td width='20%'> <p align='center'> Monto</p></td>
							<td width='20%'> <p align='center'> Cobro</p></td>
							<td width='20%'> <p align='center'> Deuda</p></td>
						</tr>
					";
				}else{
					echo"
						<tr>
							<td width='25%'> <p align='center'> Período</p></td>
							<td width='25%'> <p align='center'> Monto</p></td>
							<td width='25%'> <p align='center'> Cobro</p></td>
							<td width='25%'> <p align='center'> Deuda</p></td>
						</tr>
					";
				}
			?>
			
			<?php
				$sql = "SELECT * FROM clientehonorarioperiodo WHERE saldado = 0 ";
				if($idCliente !="todos"){
					$sql.=" AND idCliente = '$idCliente'";
				}else{
					$sql.=" ORDER BY idCliente, idPeriodo";
				}
				$resultado=mysqli_query($conexion,$sql);
				$montoTotal = 0;
				$cobroTotal = 0;
				$extraTotal = 0;
				$deudaTotal = 0;

				while($fila=mysqli_fetch_assoc($resultado)){
					if($idCliente == "todos"){
						$id = $fila['idCliente'];
					}else{
						$id = $idCliente;
					}
					$cobro = getSumaCobroHonorario($fila['idPeriodo'],$id);
					$extra = getSumaExtraHonorario($fila['idPeriodo'],$id);
					if($cobro == ""){
						$cobro = 0;
					}
					if($extra == ""){
						$extra = 0;
					}
					$monto = $fila['base'] + $extra;
					$deuda = $monto - $cobro;
					
					$p = $fila['idPeriodo'];
					$periodo = $p[0].$p[1]."/".$p[2].$p[3];

					if($deuda != 0){
						if($idCliente == "todos"){
							echo"
								<tr>
									<td>".getNombreApellido($id)."</td>
									<td>".$periodo."</td>
									<td class='numero'>".number_format($monto,2,'.','')."</td>
									<td class='numero'>".number_format($cobro,2,'.','')."</td>
									<td class='numero'>".number_format($deuda,2,'.','')."</td>
								</tr>
							";
						}else{
							echo"
								<tr>
									<td>".$periodo."</td>
									<td class='numero'>".number_format($monto,2,'.','')."</td>
									<td class='numero'>".number_format($cobro,2,'.','')."</td>
									<td class='numero'>".number_format($deuda,2,'.','')."</td>
								</tr>
							";
						}
						
						$montoTotal += $monto;
						$cobroTotal += $cobro;
						$deudaTotal += $deuda;
					}
				}
				if(mysqli_num_rows($resultado)==0){
					echo"
						<tr >
							<td colspan='4'>No se encontraron resultados</td>
						</tr>
					";
				}else{
					if($idCliente == "todos"){
						echo"
								<tr>
									<td colspan='2'><b>TOTAL</b></td>
									<td class='numero'><b>".number_format($montoTotal,2,'.','')."</b></td>
									<td class='numero'><b>".number_format($cobroTotal,2,'.','')."</b></td>
									<td class='numero'><b>".number_format($deudaTotal,2,'.','')."</b></td>
								</tr>
						";
					}else{
						echo"
								<tr>
									<td colspan='1'><b>TOTAL</b></td>
									<td class='numero'><b>".number_format($montoTotal,2,'.','')."</b></td>
									<td class='numero'><b>".number_format($cobroTotal,2,'.','')."</b></td>
									<td class='numero'><b>".number_format($deudaTotal,2,'.','')."</b></td>
								</tr>
						";
					}
					
				}
			?>
		</table>
	</div>
</body>
</html>