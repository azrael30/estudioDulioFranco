<?php
	$codigo  = $_POST["id"];

	include "conecto.php"; 

	$sql= "DELETE FROM cliente WHERE idCliente = '$codigo'";
	if(mysqli_query($conexion,$sql)){
		echo"Eliminado";
	}else{
		$sql="UPDATE cliente SET habilitado = 0 WHERE idCliente = '$codigo'";
		if(mysqli_query($conexion,$sql)){
			echo"Eliminado";
		}else{
			echo "ERROR";
		}
	}
?>