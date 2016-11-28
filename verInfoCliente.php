<?php
	include 'conecto.php';
	include 'funciones.php';
	$idCliente = $_GET['id'];
	$sql="SELECT DATE_FORMAT(fechaNacimiento,'%d/%m/%Y') AS fechaNacimiento, apellido, celular, companiaCelular, CUIT, idCliente, mail, nacionalidad, nombre, telefonoFijo FROM cliente WHERE idCliente ='$idCliente'";
	$resultado = mysqli_query($conexion,$sql);
	$cliente=mysqli_fetch_assoc($resultado);
	$cuit = $cliente['CUIT'];
	$cuitAimprimir = $cuit[0].$cuit[1]."-".$cuit[2].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9]."-".$cuit[10];

	echo"
		<div class='row'>
			<h1 align='center'>".$cliente['nombre']." ".$cliente['apellido']."</h1>
		</div>
		<div class='row'>
			<div class='col-sm-6'>
				<p align='right'>
					Código de Cliente:
				</p>
			</div>
			<div class='col-sm-6'>
				<p align='left'>
					".$cliente['idCliente']."
				</p>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-6'>
				<p align='right'>
					CUIT:
				</p>
			</div>
			<div class='col-sm-6'>
				<p align='left'>
					".$cuitAimprimir."
				</p>
			</div>
		</div>
		";
		if($cliente['fechaNacimiento']!=""){
			echo"
			<div class='row'>
				<div class='col-sm-6'>
					<p align='right'>
						Fecha de Nacimiento:
					</p>
				</div>
				<div class='col-sm-6'>
					<p align='left'>
						".$cliente['fechaNacimiento']."
					</p>
				</div>
			</div>
			";
		}
		
		if($cliente['nacionalidad']!=""){
			echo"
			<div class='row'>
				<div class='col-sm-6'>
					<p align='right'>
						Nacionalidad:
					</p>
				</div>
				<div class='col-sm-6'>
					<p align='left'>
						".$cliente['nacionalidad']."
					</p>
				</div>
			</div>
			";
		}
		
		if($cliente['mail']!=""){
			echo"
			<div class='row'>
				<div class='col-sm-6'>
					<p align='right'>
						Correo electrónico:
					</p>
				</div>
				<div class='col-sm-6'>
					<p align='left'>
						".$cliente['mail']."
					</p>
				</div>
			</div>
			";
		}
		
		if($cliente['telefonoFijo']!=""){
			echo"
			<div class='row'>
				<div class='col-sm-6'>
					<p align='right'>
						Teléfono Fijo:
					</p>
				</div>
				<div class='col-sm-6'>
					<p align='left'>
						".$cliente['telefonoFijo']."
					</p>
				</div>
			</div>
			";
		}
		
		if($cliente['celular']!=""){
			echo"
			<div class='row'>
				<div class='col-sm-6'>
					<p align='right'>
						Celular:
					</p>
				</div>
				<div class='col-sm-6'>
					<p align='left'>
						".$cliente['celular']."
					</p>
				</div>
			</div>
			";
		}
		
		if($cliente['companiaCelular']!=""){
			echo"
			<div class='row'>
				<div class='col-sm-6'>
					<p align='right'>
						Compañía telefónica:
					</p>
				</div>
				<div class='col-sm-6'>
					<p align='left'>
						".$cliente['companiaCelular']."
					</p>
				</div>
			</div>
			";
		}
		echo"
			<div class='row'>
				<h2 align='center'>Obligaciones Asignadas: </h2>
			</div>
			<div class='row'>
				<p align='center'>
					".getObligacionesDe($idCliente)."
				</p>
				
			</div>
		";
		
		
								/*$sql = 'SELECT * FROM obligacion';
								$resultado = mysqli_query($conexion, $sql);
								if(mysqli_num_rows($resultado)==0){
									echo"
										<p align='center'> No hay obligaciones cargadas</p>
									";
								}else{
									while($obligacion = mysqli_fetch_assoc($resultado)){
										$idObligacion = $obligacion['idObligacion'];
										$descripcion = $obligacion['descripcion'];
										$sqlOCC="SELECT * FROM obligacioncliente WHERE idObligacion = '$idObligacion' AND idCliente = '$idCliente'";
										$resultadoOCC = mysqli_query($conexion, $sqlOCC);
										$aux = mysqli_fetch_assoc($resultadoOCC);
										$idCategoriaAsignada = $aux['idCategoria'];
										$obligacionAsignada = mysqli_num_rows($resultadoOCC);
										echo"
											<div class='form-group'>
						                        <div class='checkbox'>
						                            <label>
						                                <input type='checkbox' id='obligaciones' name='obligaciones' value='$idObligacion'
						                    ";

						                if($obligacionAsignada>0){
						                	echo" checked ";
						                	
						                }

						                echo">
						                                $idObligacion - $descripcion
						                            </label>
						                        </div>
						                    </div>
						                ";
						                if(getCategorizar($idObligacion)==1){
						                	$sqlC="SELECT * FROM categoria WHERE idObligacion = '$idObligacion'";
						                	$resultadoC=mysqli_query($conexion,$sqlC);
						                	echo"
												<select class='form-control selectObligacion' name='categoria$idObligacion' >
						                	";
						                	while($categorias = mysqli_fetch_assoc($resultadoC)){
						                		$idCategoria = $categorias['idCategoria'];
						                		$descripcionCategoria = $categorias['descripcion'];
						                		
						                		echo"
													<option value='$idCategoria'";
												if($idCategoriaAsignada == $idCategoria){
													echo" selected ";
												}
												echo">$idCategoria - $descripcionCategoria</option>
												";
						                	}
						                	echo"
												</select>
						                	";
											
										}
						                    
										
									}
								}*/
							
?>