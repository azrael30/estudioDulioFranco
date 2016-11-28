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
	
	$sqlP= "SELECT sum(valor) FROM pago WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultadoP = mysqli_query($conexion,$sqlP);
	$pago = mysqli_fetch_row($resultadoP);

	$sqlC= "SELECT sum(valor) FROM cobro WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultadoC = mysqli_query($conexion,$sqlC);
	$cobro = mysqli_fetch_row($resultadoC);

	$deuda = $pago[0] - $cobro[0];

	if($deuda < 0){
		$saldo = $deuda * (-1);
		$deuda = 0;
	}else{
		$saldo = 0;
	}






//eliminar!!!
	$deuda=100;
	$saldo=0;






	echo"
		<p><hr></p>
		
		<div class='col-sm-7'>
			<p align='right'>
				Deuda del cliente:
			</p>
		</div>
		<div class='col-sm-5'>
			<p align='left'>
				$$deuda
			</p>
		</div>
		<div class='col-sm-7'>
			<p align='right'>
				Saldo del estudio: 
			</p>
		</div>
		<div class='col-sm-5'>
			<p align='left'>
				$$saldo
			</p>
		</div>
		<div class='col-sm-12'>
		<hr>
		</div>
		
		
	";

?>