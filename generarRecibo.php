<?php //598
	$idCliente  = $_POST["idCliente"];
	
	$username  = $_POST["username"];

	$comentario  = $_POST["comentario"];

	include "conecto.php";
	include "funciones.php";

	$fecha  = getFechaDelSistema();

	$bandera = 0;
	mysqli_autocommit($conexion,FALSE);
	/*$sql= "SELECT * FROM cobroprovisorio WHERE idCliente = '$idCliente' AND username = '$username'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)==0){
		echo"error";
		mysqli_rollback($conexion);
		die();
	}*/

	$nroRecibo = getNumeroReciboProximo();

	$sqlp= "INSERT INTO recibo(nroRecibo, username, fecha, comentario) VALUES ('$nroRecibo','$username', STR_TO_DATE('$fecha','%d/%m/%Y'), '$comentario')";
	$resultadop = mysqli_query($conexion,$sqlp);
	if(!$resultadop){
		echo"error";
		mysqli_rollback($conexion);
		die();
	}


		$idPeriodo = $_POST['idPeriodo'];

		$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
		$resultado = mysqli_query($conexion,$sql);
		while($oc = mysqli_fetch_assoc($resultado)){
			$idObligacion = $oc['idObligacion'];
			if(isset($_POST[$idObligacion])){
				$valor = $_POST[$idObligacion];
			}else{
				$valor ="";
			}

			if($valor != ""){
				$bandera++;
				$sqli="INSERT INTO cobro(idPeriodo,idObligacion,idCliente,valor,nroRecibo) VALUES('$idPeriodo','$idObligacion','$idCliente','$valor','$nroRecibo')";
				$resultadoi=mysqli_query($conexion,$sqli);
				if(!$resultadoi){
					echo"error";
					mysqli_rollback($conexion);
					die();
				}
			}
			
			
		}
		
		
		/*if($saldado==1){
			$sqli = "UPDATE occperiodo SET saldado = 1 WHERE idPeriodo = '$idPeriodo' AND idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
			$resultadoi = mysqli_query($conexion,$sqli);
			if(!$resultadoi){
			echo"error";
			mysqli_rollback($conexion);
			die();
		}*/

	if($bandera==0){
		mysqli_rollback($conexion);
		die("No hay Nada cargado");
	}
	if(mysqli_commit($conexion)){
		echo"<script language='javascript'>window.location='recibos.php'</script>";
	}
	mysqli_close($conexion);
	
?>