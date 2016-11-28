<?php
	include "conecto.php"; 
	include "funciones.php";
	$idCliente = $_POST['idCliente'];
	$sql= "SELECT * FROM obligacioncliente WHERE habilitado = 1 AND idCliente = '$idCliente'";
	$resultado = mysqli_query($conexion,$sql);
	while($oc = mysqli_fetch_assoc($resultado)){
		$idObligacion = $oc['idObligacion'];
		$fijo = $oc['valor'];
		echo"
				<div class='col-sm-7'>
				<p align='right'>
					".getDescripcionObligacion($idObligacion)." 
				</p>	
				</div>
                <div class='col-sm-5'>
                	<input type='text' class='monto form-control obli' value='$fijo' placeholder='Monto ".getDescripcionObligacion($idObligacion)."' name='$idObligacion'>
                </div>
        ";
	}
?>