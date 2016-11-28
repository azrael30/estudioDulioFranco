<?php

	$idBanco  = $_POST["idBanco"];
	$descripcion= $_POST['descripcion'];
	$direccion = $_POST['direccion'];

	include "conecto.php"; 

	$sql= "INSERT INTO banco(idBanco, descripcion, direccion) VALUES ('$idBanco', '$descripcion', '$direccion')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"ok";
	}else{
		echo"error";
	}

?>