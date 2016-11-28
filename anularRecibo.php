<?php
	$nroRecibo  = $_POST["id"];

	include "conecto.php"; 

	$sql= "DELETE FROM cobro WHERE nroRecibo = '$nroRecibo'";
	if(mysqli_query($conexion,$sql)){
		$sql= "UPDATE recibo SET anulado = 1 WHERE nroRecibo = '$nroRecibo'";
		if(mysqli_query($conexion,$sql)){
			echo"Anulado";
		}else{
			echo"ERROR";
		}
	}else{
		echo"ERROR";
	}
?>