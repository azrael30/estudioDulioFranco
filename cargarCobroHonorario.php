<?php

	$idCliente  = $_POST["idCliente"];
	$mes  = $_POST["mes"];
	if($mes<10){
		$mes = '0'.$mes;
	}
	$anio  = $_POST["anio"];
	$idPeriodo = $mes.$anio[2].$anio[3];
	$fecha= $_POST['fecha'];
	$monto= $_POST['monto'];
	$nroRecibo= $_POST['nroRecibo'];



	include "conecto.php"; 

	$sql= "INSERT INTO cobrohonorario(idCliente, idPeriodo, fecha, monto, nroRecibo) VALUES ('$idCliente', '$idPeriodo',  STR_TO_DATE('$fecha','%d/%m/%Y'), '$monto', '$nroRecibo')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"
			<div class='col-sm-12'>
				<p align='center'>
					$idCliente - Período: $mes/$anio - Fecha: $fecha - $$monto - #Recibo: $nroRecibo
				</p>
			</div>
		";
	}else{
		echo"error";
	}

?>