<?php

	$idCliente  = $_POST["idCliente"];
	$idObligacion  = $_POST["idObligacion"];
	$mes  = $_POST["mes"];
	if($mes<10){
		$mes = '0'.$mes;
	}
	$anio  = $_POST["anio"];
	$idPeriodo = $mes.$anio[2].$anio[3];
	$fecha= $_POST['fecha'];
	$monto= $_POST['monto'];
	$banco= $_POST['banco'];


	include "conecto.php"; 

	$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)==0){
		echo"no existe";
		die();
	}

	$sql= "INSERT INTO pago(idCliente, idObligacion, idPeriodo, fecha, valor, idBanco) VALUES ('$idCliente', '$idObligacion', '$idPeriodo',  STR_TO_DATE('$fecha','%d/%m/%Y'), '$monto', '$banco')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"
			<div class='col-sm-12'>
				<p align='center'>
					$idCliente - $idObligacion - Período: $mes/$anio - Fecha: $fecha - $$monto - $banco
				</p>
			</div>
		";
	}else{
		echo"error";
	}

?>