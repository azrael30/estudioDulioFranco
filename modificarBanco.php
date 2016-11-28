<?php
	include 'conecto.php';
	include 'funciones.php';
	$idBanco = $_GET['id'];
	$sql="SELECT * FROM banco WHERE idBanco ='$idBanco'";
	$resultado = mysqli_query($conexion,$sql);
	$banco=mysqli_fetch_assoc($resultado);
	$descripcion = $banco['descripcion'];
	$direccion = $banco['direccion'];
		echo"
			<form id='formularioModificarBanco'>
				<div class='row'>
					<div class='col-sm-4'>
						<p align='right'>
							Código:
						</p>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<input disabled class='form-control' id='modIdBanco' type='text'  maxlength='50' value='$idBanco'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-4'>
						<p align='right'>
							Descripción:
						</p>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<input id='modDescripcion' class='form-control' type='text'  maxlength='100' value='$descripcion'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-4'>
						<p align='right'>
							Dirección:
						</p>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<input id='modDireccion' class='form-control' type='text'  maxlength='100' value='$direccion'>
						</div>
					</div>
				</div>
				
				<div class='row'>
					<p align='center' id='errorMod'></p>
				</div>
				<div class='row'>
					<p align='center'>
						<input type='submit' value='Modificar' class='btn btn-danger'>
					</p>
				</div>
			</form>";
?>