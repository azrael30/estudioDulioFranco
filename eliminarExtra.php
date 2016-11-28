<?php
	$codigo  = $_POST["id"];

	include "conecto.php"; 

	$sql= "DELETE FROM extrahonorario WHERE idExtraHonorario = '$codigo'";
	if(mysqli_query($conexion,$sql)){
		echo"Eliminado";
	}else{
		echo"ERROR";
	}
?>