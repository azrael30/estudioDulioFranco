<?php

	$idCliente  = $_POST["idCliente"];
	$mes  = $_POST["mes"];
	if($mes<10){
		$mes = '0'.$mes;
	}
	$anio  = $_POST["anio"];
	$idPeriodo = $mes.$anio[2].$anio[3];
	$monto= $_POST['monto'];
	$descripcion= $_POST['descripcion'];


	include "conecto.php"; 

	$sql= "INSERT INTO extrahonorario(idCliente, idPeriodo, monto, descripcion) VALUES ('$idCliente', '$idPeriodo', '$monto', '$descripcion')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"
			<div class='col-sm-12'>
				<p align='center'>
					$idCliente - Período: $mes/$anio - $$monto - $descripcion
				</p>
			</div>
		";
	}else{
		echo"error";
	}

?>