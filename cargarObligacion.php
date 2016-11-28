<?php

	$idObligacion  = $_POST["id"];
	$descripcion= $_POST['descripcion'];
	$categorizar = $_POST['categorizar'];

	include "conecto.php"; 

	$sql= "INSERT INTO obligacion(idObligacion, descripcion, categorizar) VALUES ('$idObligacion', '$descripcion', '$categorizar')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"ok";
	}else{
		echo"error";
	}

?>