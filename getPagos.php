<?php
	$codigo  = $_GET["codigo"];


	if($codigo == "busquedaNormal"){
		$idCliente  = $_GET["cliente"];
		$idObligacion  = $_GET["obligacion"];
		$mes  = $_GET["mes"];
		if($mes<10){
			$mes = '0'.$mes;
		}
		$anio  = $_GET["anio"];
		$idPeriodo = $mes.$anio[2].$anio[3];
	}else{
		$idCliente = $codigo[0].$codigo[1].$codigo[2].$codigo[3].$codigo[4].$codigo[5];
		if(strlen($codigo)==13){
			$idObligacion = $codigo[6].$codigo[7].$codigo[8];
			$idPeriodo = $codigo[9].$codigo[10].$codigo[11].$codigo[12];
		}else{
			$idObligacion = $codigo[6].$codigo[7].$codigo[8].$codigo[9];
			$idPeriodo = $codigo[10].$codigo[11].$codigo[12].$codigo[13];
		}
	}

	

	include "conecto.php"; 

	$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)==0){
		echo"no existe";
		die();
	}

	$sql= "SELECT DATE_FORMAT(fecha,'%d/%m/%y') AS fecha, valor, idPago, idBanco FROM pago WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);

	if(mysqli_num_rows($resultado)==0){
		echo"<p align='center'>No hay Pagos registrados para este período</p>";
		die();
	}

	echo"
		<div class='col-sm-4'>
			<h2 align='right'>Fecha</h2>
		</div>
		<div class='col-sm-3'>
			<h2 align='center'>Valor</h2>
		</div>
		<div class='col-sm-2'>
			<h2 align='center'>Acción</h2>
		</div>
		<div class='col-sm-3'>
			<h2 align='center'>Banco</h2>
		</div>
	";
	while($pagos = mysqli_fetch_assoc($resultado)){
		$fecha = $pagos['fecha'];
		$valor = $pagos['valor'];
		$id = $pagos['idPago'];
		$banco = $pagos['idBanco'];
		echo"
			<div class='col-sm-4'>
				<p align='right'>$fecha</p>
			</div>
			<div class='col-sm-3'>
				<p align='center'>$$valor</p>
			</div>
			<div class='col-sm-2'>
				<p align='center'>
					<a class='eliminar' href='$id'>
						<img src='img/cross.png' width='20px'>
					</a>
				</p>
			</div>
			<div class='col-sm-3'>
				<p align='center'>$banco</p>
			</div>
		";
	}
	$sql= "SELECT round(sum(valor),2) FROM pago WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);
	$valor = mysqli_fetch_row($resultado);
	echo"
		<div class='col-sm-4'>
			<p align='right' class='total'>Total: </p>
		</div>
		<div class='col-sm-3'>
			<p align='center' class='total'>$$valor[0]</p>
		</div>
		<div class='col-sm-5'>
			
		</div>
	";

?>