<?php
	$id = $_GET['id'];
	include "conecto.php"; 

	$sql= "SELECT cliente.nombre, cliente.apellido, obligacion.descripcion, cobro.valor, DATE_FORMAT(cobro.fecha,'%d/%m/%y') AS fecha, cobro.idPeriodo FROM cobro INNER JOIN cliente ON cobro.idCliente = cliente.idCliente INNER JOIN obligacion ON obligacion.idObligacion = cobro.idObligacion WHERE idCobro = '$id'";
	$resultado = mysqli_query($conexion,$sql);
	$cobro = mysqli_fetch_assoc($resultado);
	$idPeriodo = $cobro['idPeriodo'];
	$mes = $idPeriodo[0].$idPeriodo[1];
	$anio = $idPeriodo[2].$idPeriodo[3];

	if(mysqli_num_rows($resultado)==0){
		echo"ERROR";
		die();
	}else{
		echo"Recibí $".$cobro['valor']." de ".$cobro['apellido']." ".$cobro['nombre']." en concepto de ".$cobro['descripcion']." correspondientes al período $mes/$anio el día ".$cobro['fecha'];
	}
?>