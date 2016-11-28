<?php

	$idBanco  = $_POST["id"];
	$descripcion= $_POST['descripcion'];
	$direccion = $_POST['direccion'];

	include "conecto.php"; 

	$sql= "UPDATE banco SET descripcion = '$descripcion', direccion = '$direccion' WHERE idBanco = '$idBanco'";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"ok";
	}else{
		echo"error";
	}

?>