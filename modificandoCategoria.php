<?php

	$idCategoria  = $_POST["id"];
	$descripcion= $_POST['descripcion'];
	$monto = $_POST['monto'];

	include "conecto.php"; 

	$sql= "UPDATE categoria SET descripcion = '$descripcion', valor = '$monto' WHERE idCategoria = '$idCategoria'";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"ok";
	}else{
		echo"error";
	}

?>