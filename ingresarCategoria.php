<?php
	include "session.php";
	include "funciones.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargar Categorías</title>
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
    		$("#modificar").hide();
    		$(".eliminar").click(function(){
    			$(this).html("¿Eliminar?");
    			$(this).addClass("eliminar2");
    			$(".eliminar2").click(function(){
    				var codigo = {
    					id : $(this).attr("id")
    				}
    				var t = $(this);
	    			$.post("eliminarCategoria.php",codigo,function resultadoEliminacion(respuesta){
    					t.html(respuesta);
    					if(respuesta == 'Eliminado'){
    						location.reload();
    					}
    				});
	    		});
    		});
    		$(".back").click(function(){
    			location.reload();
    		});
    		
    		$(".monto").keypress(function(e){

    			if(e.which!=46 &&(e.which<48 || e.which>57)){
    				return false;
    			}
    		});
    		$("#cargarCategoria").submit(function(){
    			var datos = {
    				obligacion: $("#obligacion").val(),
    				id : $("#idCategoria").val(),
    				descripcion: $("#descripcion").val(),
    				monto: $("#monto").val()
    			}
    			$.post("cargarCategoria.php",datos,function(respuesta){
    				if(respuesta == "ok"){
    					location.reload();
    				}else{
    					$("#error").html("Se ha producido un error. Vuelve a intentarlo");
    				}
    			});
    		});
    		$(".modificar").click(function(){
    			var codigo = {
    				id : $(this).attr("id")
    			}
	    		$.get("modificarCategoria.php",codigo,imprimirModificacionCategoria);
    		});
    	});

		function imprimirModificacionCategoria(html){
			$("#inicio").fadeOut(1);
			$("#modificar").append(html).fadeIn(1000);
			$("#formularioModificarCategoria").submit(function(){
				var datos = {
					id : $("#modIdCategoria").val(),
					descripcion: $("#modDescripcion").val(),
					monto: $("#modMonto").val()
				}
				$.post("modificandoCategoria.php",datos,function(respuesta){
					if(respuesta == "ok"){
    					location.reload();
    				}else{
    					$("#errorMod").html("Se ha producido un error. Vuelve a intentarlo");
    				}
				});
			});
		}

    	
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
		<div class="contenido" id="inicio">
			<div class="row">
				<h1 align='center'>Categorías</h1>
			</div>
			<div class="row">
				<div class='col-sm-6'>
			
			<?php
				$sql="SELECT * FROM obligacion WHERE categorizar = 1";
				$resultado = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($resultado)==0){
					echo"
						<div class='row'>
							<p align='center'>
								No hay Obligaciones con categorización activada.
							</p>
						</div>
					";
				}else{
					echo"
						<h1 align='center'>
							Actuales
						</h1>
					";
				}
				while($obligaciones = mysqli_fetch_assoc($resultado)){
					$idObligacion = $obligaciones['idObligacion'];
					$descripcionObligacion = $obligaciones['descripcion'];
					echo"
							<h2 align='center'>
								$idObligacion - $descripcionObligacion
							</h2>
							
							
								
					";



						$sqlC = "SELECT * FROM categoria WHERE idObligacion = '$idObligacion'";
						$resultadoC = mysqli_query($conexion, $sqlC);
						if(mysqli_num_rows($resultadoC)==0){
							echo"
								<p align='center'> No hay categorias cargadas</p>
							";
						}else{
							while($categorias = mysqli_fetch_assoc($resultadoC)){
								$idCategoria = $categorias['idCategoria'];
								$descripcionCategoria = $categorias['descripcion'];
								$monto = $categorias['valor'];
								$idObligacion = $categorias['idObligacion'];
								echo"
									<form action='#'>
										<div class='row'>
										<div class='col-sm-4'>
											<p align='right'>
												<a class='eliminar' href='#$idCategoria' id='$idCategoria'>
													<img src='img/cross.png' width='25px'>
												</a>
												<a class='modificar' href='#$idCategoria' id='$idCategoria'>
													<img src='img/modificar.png' width='25px'>
												</a>
											</p>
										</div>
										<div class='col-sm-2'>
											<p align='center'>
												$idCategoria
											</p>
										</div>
										<div class='col-sm-4'>
											<p align='center'>
												$descripcionCategoria
											</p>
										</div>
										<div class='col-sm-2'>
											<p align='left'>
												$$monto
											</p>
										</div>
										</div>
									</form>
								";
							}
						}



				}



			?>			
			</div>
			<div class='col-sm-6'>
				<h1 align='center'>
					Cargar Nueva
				</h1>
				<br>
				<form action='#' id='cargarCategoria' method='post'>
					<div class="col-sm-10">
						<div class="form-group">
							<select name="obligacion" id="obligacion" required class='form-control'>
								<?php
									$sql= "SELECT * FROM obligacion WHERE categorizar = 1";
									$resultado = mysqli_query($conexion,$sql);
									while($obligaciones = mysqli_fetch_assoc($resultado)){
										$idObligacion = $obligaciones['idObligacion'];
										$descripcionObligacion = $obligaciones['descripcion'];
										echo"<option value='$idObligacion'>$idObligacion - $descripcionObligacion</option>";
									}
								?>
							</select>	
						</div>
					</div>
					<div class='col-sm-6'>
						<div class='form-group'>
							<input class='form-control' id='idCategoria' type='text' required placeholder='Código de Categoría' maxlength='5'>
						</div>
					</div>
					<div class='col-sm-6'>
						<p>Max. 5 caracteres</p>
					</div>
					<div class='col-sm-10'>
						<div class='form-group'>
							<input class='form-control' id='descripcion' required type='text' placeholder='Descripción' maxlength='100'>
						</div>
					</div>
					<div class='col-sm-2'>
						
					</div>
					<div class='col-sm-4'>
						<p align='right'>$</p>
					</div>
					<div class='col-sm-6'>
						<div class='form-group'>
							<input class='form-control' id='monto' type='text' required placeholder='Monto' class='monto'>
						</div>
					</div>
					<div class='col-sm-12'>
						<p id='error' align='center'></p>
					</div>
					<div class='col-sm-12'>
						<div class='form-group'>
							<p align='center'>
								<input type='submit' class='btn btn-success' value='Cargar' >
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="contenido" id="modificar">
			<div class="row">
				<div class="col-sm-1">
					<img class='back' src="img/back.png" width='40px'>
				</div>
				<div class="col-sm-11">
					<h1 align='center'>Modificar Categoria</h1>
				</div>
					
			</div>
			
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
