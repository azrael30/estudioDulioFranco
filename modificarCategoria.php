<?php
	include 'conecto.php';
	include 'funciones.php';
	$idCategoria = $_GET['id'];
	$sql="SELECT * FROM categoria WHERE idCategoria ='$idCategoria'";
	$resultado = mysqli_query($conexion,$sql);
	$categoria=mysqli_fetch_assoc($resultado);
	$descripcion = $categoria['descripcion'];
	$monto = $categoria['valor'];
		echo"
			<form id='formularioModificarCategoria'>
				<div class='row'>
					<div class='col-sm-4'>
						<p align='right'>
							Código:
						</p>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<input disabled class='form-control' id='modIdCategoria' type='text'  maxlength='5' value='$idCategoria'>
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
							Monto:
						</p>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<input id='modMonto' class='form-control monto' type='text'  maxlength='100' value='$monto'>
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