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
			<form action='modificandoCliente.php' method='post' id='modificarCliente'>
				<div class='row'>
					<div class='col-sm-3'>
						<p>
							Código:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input disabled class='form-control' type='text'  maxlength='10' value='".$cliente['idCliente']."'>
							<input type='text' class='hidden' name='idCliente' value='".$cliente['idCliente']."'>
						</div>
					</div>
					<div class='col-sm-3'>
						<p>
							CUIT:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' required type='text' name='cuit' id='cuit'  maxlength='13' value='".$cuitAimprimir."'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-3'>
						<p>
							Nombre:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' required type='text' name='nombre' maxlength='100' value='".$cliente['nombre']."'>
						</div>
					</div>
					<div class='col-sm-3'>
						<p>
							Apellido:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' required type='text' name='apellido' maxlength='100' value='".$cliente['apellido']."'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-3'>
						<p>
							Nacimiento:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' type='text' name='fechaNacimiento' id='fechaNacimiento' placeholder='(DD/MM/AAAA)' maxlength='10' value='".$cliente['fechaNacimiento']."'>
						</div>
					</div>
					<div class='col-sm-3'>
						<p>
							Nacionalidad:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' type='text' name='nacionalidad' maxlength='100' value='".$cliente['nacionalidad']."'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-3'>
						<p>
							E-mail:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' type='email' name='mail' id='mail' maxlength='100' value='".$cliente['mail']."'>
						</div>
					</div>
					<div class='col-sm-3'>
						<p>
							Teléfono Fijo:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control telefono' name='telefonoFijo' type='text' id='telefonoFijo' maxlength='40' value='".$cliente['telefonoFijo']."'>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-3'>
						<p>
							Celular:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control telefono' type='text' name='celular' id='celular' maxlength='40' value='".$cliente['celular']."'>
						</div>
					</div>
					<div class='col-sm-3'>
						<p>
							Compañía de telefonía:
						</p>
					</div>
					<div class='col-sm-3'>
						<div class='form-group'>
							<input class='form-control' type='text' id='compania' name='compania' maxlength='50' value='".$cliente['companiaCelular']."'>
						</div>
					</div>
				</div>
				
				<div class='row'>
					<br>
					<p align='center'>
						Obligaciones asignadas:
					</p>
				</div>
				<div class='row'>
					<div class='container'>
						
							"; 
								$sql = 'SELECT * FROM obligacion';
								$resultado = mysqli_query($conexion, $sql);
								if(mysqli_num_rows($resultado)==0){
									echo"
										<p align='center'> No hay obligaciones cargadas</p>
									";
								}else{
									while($obligacion = mysqli_fetch_assoc($resultado)){
										$idObligacion = $obligacion['idObligacion'];
										$descripcion = $obligacion['descripcion'];
										$sqlOCC="SELECT * FROM obligacioncliente WHERE idObligacion = '$idObligacion' AND idCliente = '$idCliente' AND habilitado = 1";
										$resultadoOCC = mysqli_query($conexion, $sqlOCC);
										$aux = mysqli_fetch_assoc($resultadoOCC);
										$idCategoriaAsignada = $aux['idCategoria'];
										$obligacionAsignada = mysqli_num_rows($resultadoOCC);
										echo"
										<div class='col-sm-4'>
											<div class='form-group'>
						                        <div class='checkbox'>
						                            <label>
						                                <input type='checkbox' id='obligaciones' name='obligaciones[]' value='$idObligacion'
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
						                
						                	echo"
						                		<input type='text' class='form-control selectObligacion' name='fijo$idObligacion' 
						                	";
						                	$sqli = "SELECT valor FROM obligacioncliente WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
						                	$resultadoi = mysqli_query($conexion,$sqli);
						                	$auxi = mysqli_fetch_row($resultadoi);
						                	$fijo = $auxi[0];
						                	echo" value='$fijo' >
						                	";
						                	
						                	echo"
												
											</div>
						                	";
											
										
						                    
										
									}
								}
							echo"
						
					</div>
				</div>
				<div class='row'>
					<p align='center'>
						<input type='submit' value='Modificar' class='btn btn-danger'>
					</p>
				</div>
			</form>";
?>