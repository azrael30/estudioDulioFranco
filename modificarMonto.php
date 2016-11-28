<?php
	if(isset($_POST["monto"])){
		$monto  = $_POST["monto"];
		$impuesto= $_POST['impuesto'];
	}
	$vencimiento = $_POST['vencimiento'];
	$idCliente  = $_POST["idCliente"];
	$idObligacion  = $_POST["idObligacion"];
	$saldado = $_POST['saldado'];
	$mes  = $_POST["mes"];
	$anio  = $_POST["anio"];
	$idPeriodo = $mes.$anio[2].$anio[3];

	include "conecto.php"; 

	$sql= "UPDATE occperiodo SET valor = '$monto', impuesto = '$impuesto', saldado = $saldado, vencimiento = STR_TO_DATE('$vencimiento','%d/%m/%Y') WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo "monto: $monto, impuesto: $impuesto, vencimiento: $vencimiento, idCliente: $idCliente, idObligacion: $idObligacion, idPeriodo: $idPeriodo";
	}else{
		echo"error";
	}

?>