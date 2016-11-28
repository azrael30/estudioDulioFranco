<?php
	if(isset($_POST["monto"])){
		$monto  = $_POST["monto"];
	}
	$idCliente  = $_POST["idCliente"];
	$saldado = $_POST['saldado'];
	$mes  = $_POST["mes"];
	$anio  = $_POST["anio"];
	$idPeriodo = $mes.$anio[2].$anio[3];

	include "conecto.php"; 

	$sql= "UPDATE clientehonorarioperiodo SET base = '$monto', saldado = $saldado WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo "monto: $monto, idCliente: $idCliente, idPeriodo: $idPeriodo";
	}else{
		echo"error";
	}

?>