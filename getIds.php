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
		$mes=$idPeriodo[0].$idPeriodo[1];
		$anio=$idPeriodo[2].$idPeriodo[3];
	}


	include "conecto.php"; 


	$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)==0){
		echo"no existe";
		die();
	}
	

	$sql= "SELECT nombre, apellido FROM cliente WHERE idCliente = '$idCliente'";
	$resultado = mysqli_query($conexion,$sql);
	$cliente = mysqli_fetch_assoc($resultado);
	$sql= "SELECT * FROM obligacion WHERE idObligacion = '$idObligacion'";
	$resultado = mysqli_query($conexion,$sql);
	$obligacion = mysqli_fetch_assoc($resultado);
	$nombre = $cliente['nombre'];
	$apellido = $cliente['apellido'];
	$descripcion = $obligacion['descripcion'];
	echo"
		<div class='col-sm-12'>
			<h1 align='center'>$descripcion - $mes / $anio</h1>
		</div>
		<div class='col-sm-12'>
			<h2 class='subtitulo' align='center'>$nombre $apellido</h2>
		</div>
	";
	

	
?>