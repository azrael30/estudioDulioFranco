<?php
	include "session.php";
	include "funciones.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargar Obligación</title>
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
	    			$.post("eliminarObligacion.php",codigo,function resultadoEliminacion(respuesta){
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
    		$("#cargarObligacion").submit(function(){
    			if($("#categorias").is(":checked")){
    				var cat = 1;
    			}else{
    				var cat = 0;
    			}
    			var datos = {
    				id : $("#idObligacion").val(),
    				descripcion: $("#descripcion").val(),
    				categorizar: cat
    			}
    			$.post("cargarObligacion.php",datos,function(respuesta){
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
	    		$.get("modificarObligacion.php",codigo,imprimirModificacionObligacion);
    		});

    	});

    	function imprimirModificacionObligacion(html){
			$("#inicio").fadeOut(1);
			$("#modificar").append(html).fadeIn(1000);
			$("#formularioModificarObligacion").submit(function(){
				if($("#modCategorias").is(":checked")){
    				var cat = 1;
    			}else{
    				var cat = 0;
    			}
				var datos = {
					id : $("#modIdObligacion").val(),
					descripcion: $("#modDescripcion").val(),
					categorizar: cat
				}
				$.post("modificandoObligacion.php",datos,function(respuesta){
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
				<h1 align="center" class='tituloObligacion'>
					Obligaciones
				</h1>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h1 align="center" class='tituloObligacion'>
						Actuales
					</h1>
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
									<div class='row'>
									<form action='#' class='obligacion'>
										<div class='col-sm-3'>
											<p align='right'>
												<a class='eliminar' href='#' id='$idObligacion'>
													<img src='img/cross.png' width='25px'>
												</a>
												<a class='modificar' href='#' id='$idObligacion'>
													<img src='img/modificar.png' width='25px'>
												</a>
											</p>
										</div>
										<div class='col-sm-2'>
											<p align='center'>
												$idObligacion
											</p>
										</div>
										<div class='col-sm-7'>
											<p align='left'>
												$descripcion
								";
								if(getCategorizar($idObligacion)==1){
									echo" &nbsp; <img src='img/categorizar.png' width='20px'>";
								}
								echo"
											</p>
										</div>
									</form>
									</div>
								";
							}
						}
					?>
				</div>
				<div class="col-sm-6">
					<h1 align="center" class='tituloObligacion'>
						Cargar Nueva
					</h1>
					<br>
					<form action="#" id="cargarObligacion">
						<div class="col-sm-6">
							<div class="form-group">
								<input class='form-control' id="idObligacion" type="text" required placeholder='Código de Obligación' maxlength='4'>
							</div>
						</div>
						<div class="col-sm-6">
							<p align="left">
								Máx. 4 caracteres
							</p>
						</div>
						<div class="col-sm-10">
							<div class="form-group">
								<input class='form-control' id="descripcion" required type="text" placeholder='Descripción' maxlength='100'>
							</div>
						</div>
						<div class="col-sm-12">
							<p align="center">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="categorias" name="categorias" value="si">
                                            Usar categorización
                                        </label>
                                    </div>
                                </div>
                            </p>
						</div>
						<div class="col-sm-12">
							<p id="error" align="center"></p>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<br>
								<p align="center">
									<input type="submit" class='btn btn-success' value='Cargar' >
								</p>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
		<div class="contenido" id="modificar">
			<div class="row">
				<div class="col-sm-1">
					<img class='back' src="img/back.png" width='40px'>
				</div>
				<div class="col-sm-11">
					<h1 align='center'>Modificar Obligación</h1>
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
