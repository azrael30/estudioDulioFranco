<?php

	$idCliente  = $_POST["idCliente"];
	$idObligacion  = $_POST["idObligacion"];
	$mes  = $_POST["mes"];
	if($mes<10){
		$mes = '0'.$mes;
	}
	$anio  = $_POST["anio"];
	$idPeriodo = $mes.$anio[2].$anio[3];
	$monto= $_POST['monto'];
	$username= $_POST['username'];
	$saldado= $_POST['saldado'];



	include "conecto.php"; 

	$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)==0){
		echo"no existe";
		die();
	}

	$sql= "INSERT INTO cobroprovisorio(idCliente, idObligacion, idPeriodo, username, valor, saldado) VALUES ('$idCliente', '$idObligacion', '$idPeriodo',  '$username', '$monto', '$saldado')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"
			<div class='col-sm-12'>
				<p align='center'>
					$idObligacion - $mes/$anio - $$monto
				</p>
			</div>
		";
	}else{
		echo"error";
	}

?>