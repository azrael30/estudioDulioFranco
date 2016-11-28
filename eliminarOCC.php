<?php
	$idCliente  = $_POST["idCliente"];
	$idObligacion  = $_POST["idObligacion"];
	$idPeriodo  = $_POST["idPeriodo"];


	include "conecto.php"; 

	$sql= "DELETE FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	if(mysqli_query($conexion,$sql)){
		echo"Eliminado";
	}else{
		echo "ERROR";
	}
?>