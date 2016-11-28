<?php

	$idObligacion  = $_POST["id"];
	$descripcion= $_POST['descripcion'];
	$categorizar = $_POST['categorizar'];

	include "conecto.php"; 

	$sql= "UPDATE obligacion SET descripcion = '$descripcion', categorizar = '$categorizar' WHERE idObligacion = '$idObligacion'";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"ok";
	}else{
		echo"error";
	}

?>