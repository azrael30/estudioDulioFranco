<?php
	$obligacion = $_POST["obligacion"];
	$idCategoria  = $_POST["id"];
	$descripcion= $_POST['descripcion'];
	$monto = $_POST['monto'];

	include "conecto.php"; 

	$sql= "INSERT INTO categoria(idCategoria, descripcion, valor, idObligacion) VALUES ('$idCategoria', '$descripcion', '$monto', '$obligacion')";
	$resultado = mysqli_query($conexion,$sql);

	if($resultado){
		echo"ok";
	}else{
		echo"error";
	}

?>