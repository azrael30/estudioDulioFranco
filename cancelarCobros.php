<?php
	$idCliente  = $_POST["idCliente"];
	$username  = $_POST["username"];

	include "conecto.php"; 

	$sql= "DELETE FROM cobroprovisorio WHERE idCliente = '$idCliente' AND username = '$username'";
	if(mysqli_query($conexion,$sql)){
		echo"ok";
	}else{
		echo"cliente: $idCliente username: $username";
	}
?>