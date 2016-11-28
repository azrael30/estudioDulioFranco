<?php
	$idCliente = $_GET["idCliente"];

	include "conecto.php"; 

	$sql= "SELECT obligacioncliente.idObligacion, obligacion.descripcion FROM obligacioncliente INNER JOIN obligacion ON obligacioncliente.idObligacion = obligacion.idObligacion WHERE obligacioncliente.idCliente = '$idCliente'  AND obligacioncliente.habilitado = 1";
	$resultado = mysqli_query($conexion,$sql);
	while($obligaciones = mysqli_fetch_assoc($resultado)){
		$idObligacion = $obligaciones['idObligacion'];
		$descripcionObligacion = $obligaciones['descripcion'];
		echo"<option value='$idObligacion'>$idObligacion - $descripcionObligacion</option>";
	}
?>