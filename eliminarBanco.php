<?php
	$codigo  = $_POST["id"];

	include "conecto.php"; 

	$sql= "DELETE FROM banco WHERE idBanco = '$codigo'";
	if(mysqli_query($conexion,$sql)){
		echo"Eliminado";
	}else{
		echo"ERROR";
	}
?>