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
	<title>Listado de Clientes y Obligaciones</title>
</head>
<body>
	<div class="pagina">
		<table width='100%' id='cuentaCorriente'>
			<?php
				$fechaDelSistema = getFechaDelSistema();
				$sql = "SELECT * FROM obligacion";
				$resultado = mysqli_query($conexion,$sql);
				$cantObligaciones = mysqli_num_rows($resultado);
				$colspan = $cantObligaciones +1 ;
				$width = 85 / $cantObligaciones;
				echo"
					<tr>
						<td colspan='$colspan'>
							<h1 align='center'>Listado de Clientes y Obligaciones</h1>
							<p align='center'>al $fechaDelSistema</p>
						</td> 
					</tr>
				";
				echo"<tr>";
				echo"<td width='15%'>Cliente</td>";	
				while($obligacion = mysqli_fetch_assoc($resultado)){
					echo"<td width='$width%'>".$obligacion['idObligacion']."</td>";
					$obligaciones[] = $obligacion['idObligacion'];
				}		

				echo"</tr>";
				$sql2 = "SELECT * FROM cliente";
				$resultado2 = mysqli_query($conexion,$sql2);
				while($cliente = mysqli_fetch_assoc($resultado2)){
					$idCliente = $cliente['idCliente'];
					echo"<tr>";
					echo "<td width='15%'>".$idCliente."</td>";
					foreach ($obligaciones as $obl) {
						echo"<td width='$width%'>";
						$sql3 = "SELECT * FROM obligacioncliente WHERE idObligacion = '$obl' AND idCliente = '$idCliente' AND habilitado = 1";
						$resultado3 = mysqli_query($conexion,$sql3);
						if(mysqli_num_rows($resultado3)>0){
							echo"<img src='img/tickInforme.png' width='20px'>";
						}
						echo"</td>";
					}
					echo"</tr>";
				}
			?>
			
			
		</table>
	</div>
</body>
</html>