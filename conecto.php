<?php
	require("conexion.php");
	
	$conexion= mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
	mysqli_set_charset($conexion,"utf8");
?>