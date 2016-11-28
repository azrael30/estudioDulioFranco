<?php
	include 'conecto.php';
	include 'funciones.php';
	$idObligacion = $_GET['id'];
	$sql="SELECT * FROM obligacion WHERE idObligacion ='$idObligacion'";
	$resultado = mysqli_query($conexion,$sql);
	$obligacion=mysqli_fetch_assoc($resultado);
	$descripcion = $obligacion['descripcion'];
	$categorizar = $obligacion['categorizar'];
		echo"
			<form id='formularioModificarObligacion'>
				<div class='row'>
					<div class='col-sm-4'>
						<p align='right'>
							Código:
						</p>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<input disabled class='form-control' id='modIdObligacion' type='text'  maxlength='4' value='$idObligacion'>
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
					<div class='col-sm-4'></div>
						<div class='col-sm-6'>
							<p align='center'>
                                <div class='form-group'>
                                    <div class='checkbox'>
                                        <label>
                                            <input type='checkbox' id='modCategorias' name='categorias' value='si'
		";
		if($categorizar == 1){
			echo" checked ";
		}
		echo"
											>
                                            Usar categorización
                                        </label>
                                    </div>
                                </div>
                            </p>
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