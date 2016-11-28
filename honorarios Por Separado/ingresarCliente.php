<?php
	include "session.php";
	include "funciones.php";
	if(getTipoUsuario($_SESSION['login_user'])!='0'){
		header('Location: index.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargar Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="estilospanel.css">
    <script src="js/jquery.js"></script>
    <script>
    	$(document).ready(function(){
    		var parte = window.location.pathname.split( '/' );
    		$("a").each(function(){
    			if( $(this).attr("href")==parte[1] || $(this).attr("href")==parte[2] || $(this).attr("href")==parte[3] || $(this).attr("href")==parte[4] ){
    				$(this).addClass("activated");
    			}
    		});

    		$(".monto").keypress(function(e){

    			if(e.which!=46 &&(e.which<48 || e.which>57)){
    				return false;
    			}
    		});

    		/*$("#cargarCliente").submit(function(){
    			var datos = {
    				idCliente: $("#idCliente").val(),
    				nombre: $("#nombre").val(),
    				apellido: $("#apellido").val(),
    				cuit: $("#cuit").val(),
    				nacimiento: $("#fechaNacimiento").val(),
    				nacionalidad: $("#nacionalidad").val(),
    				email: $("#mail").val(),
    				telefonoFijo: $("#telefonoFijo").val(),
    				celular: $("#celular").val(),
    				compania: $("#compania").val()
    			}
    		});*/

    		$("#cuit").keypress(function(e){
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    			if($(this).val().length==2){
    				$(this).val($(this).val()+'-');
    			}else if($(this).val().length==11){
    				$(this).val($(this).val()+'-');
    			}
    		});
    		$(".telefono").keypress(function(e){
    			if(e.which==45){

    			}else if(e.which<48 || e.which>57){
    				return false;
    			}
    		});
    		$("#fechaNacimiento").keypress(function(e){
    			if($(this).val().length==2){
    				$(this).val($(this).val()+'/');
    			}else if($(this).val().length==5){
    				$(this).val($(this).val()+'/');
    			}
    			if(e.which<48 || e.which>57){
    				return false;
    			}
    		});
    	});
    </script>
</head>

<body>
	<?php 
		include "conecto.php"; 
	?>
	
	<div class="lateral">
		<?php
			include "modificar/logoInside.php";
		?> 
		<hr>
		<?php
			$tipoUsuario= getTipoUsuario($login_session);
			switch ($tipoUsuario) {
						case 0:
							include "modificar/menu0.php";
							break;
						case 1:
							include "modificar/menu1.php";
							break;
						default:
							include "modificar/menu2.php";
							break;
					}
			
		?>
		
	</div>
	<div class="principal">
		<div class="superior">
			<?php include "modificar/superior.php"; ?>
		</div>
		<div class="contenido">
			<div class="row">
				<h1 align="center">
					Cargar Cliente
				</h1>
			</div>
			<form action="cargarCliente.php" method="post">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input class='form-control' type="text" name='idCliente' placeholder='Código de Cliente' maxlength='6'>
						</div>
					</div>
					<div class="col-sm-8">
						<p>
							6 caracteres (Dejar vacío para usar código automático)
						</p>
					</div>
				</div>
				<div class="row">
					
					<div class="col-sm-6">
						<div class="form-group">
							<input class='form-control' required type="text" name='apellido' id='apellido'  placeholder='Apellidos' maxlength='100'>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input class='form-control' required type="text" name='nombre' id='nombre' placeholder='Nombres' maxlength='100'>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input class='form-control' required type="text" name='cuit' id='cuit' placeholder='CUIT' maxlength='13'>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input class='form-control' type="text" name='fechaNacimiento' id='fechaNacimiento' placeholder='Nacimiento (DD/MM/AAAA)' maxlength='10'>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input class='form-control' type="text" name='nacionalidad' id='nacionalidad'  placeholder='Nacionalidad' maxlength='100'>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input class='form-control' type="email" name='mail' placeholder='Correo Electrónico' maxlength='100'>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input class='form-control telefono' type="text" name='telefonoFijo' id='telefonoFijo' placeholder='Teléfono Fijo' maxlength='40'>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input class='form-control telefono' type="text" name='celular' id='celular' placeholder='Teléfono Celular' maxlength='40'>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input class='form-control' type="text" name='compania' id='compania' placeholder='Compañía de Telefonía' maxlength='50'>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1">
						<div class="form-group">
							<p align='right'>$</p>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<input class='form-control monto' type="text" name='honorarios' id='honorarios' placeholder='Honorario Base' maxlength='50'>
						</div>
					</div>
				</div>
				<div class="row">
					<br>
					<p align="center">
						Asignar obligaciones:
					</p>
				</div>
				<div class="row">
					<div class="container">
							<?php 
								$sql = "SELECT * FROM obligacion";
								$resultado = mysqli_query($conexion, $sql);
								if(mysqli_num_rows($resultado)==0){
									echo"
										<p align='center'> No hay obligaciones cargadas</p>
									";
								}else{
									while($obligacion = mysqli_fetch_assoc($resultado)){
										$idObligacion = $obligacion['idObligacion'];
										$descripcion = $obligacion['descripcion'];
										echo"
											<div class='col-sm-4'>
												<div class='form-group'>
							                        <div class='checkbox'>
							                            <label>
							                                <input type='checkbox' name='obligaciones[]' value='$idObligacion'>
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
													<option value='$idCategoria'>$idCategoria - $descripcionCategoria</option>
												";
						                	}
						                	echo"
												</select>
											</div>
						                	";
											
										}else{
											echo"</div>";
										}
						                    
										
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<p align="center">
						<input type="submit" value='Cargar' class='btn btn-success'>
					</p>
				</div>
			</form>
		</div>
		<div class="inferior">
			<h4 align="right">
	    		<a target="_blank" class="footer" href="http://www.dulio.com.ar">&copy; 2016 - DWD (Dulio Web Design)</a>
	    	</h4>
		</div>
	</div>
    
    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
