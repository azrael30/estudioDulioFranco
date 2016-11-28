<?php
	include "session.php";
	include "funciones.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargar Centro de Pago</title>
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

    		$("#cargarBanco").submit(function(){
    			var datos = {
    				idBanco: $("#idBanco").val(),
    				descripcion: $("#descripcion").val(),
    				direccion: $("#direccion").val(),
    			};
    			$.post("cargarBanco.php",datos,function(respuesta){
    				if(respuesta=="ok"){
    					location.reload();
    				}else{
    					$("#error").html("Se ha producido un error. Intentalo nuevamente.");
    				}
    			});
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
	    			$.post("eliminarBanco.php",codigo,function resultadoEliminacion(respuesta){
    			
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
    		$(".modificar").click(function(){
    			var codigo = {
    				id : $(this).attr("id")
    			}
	    		$.get("modificarBanco.php",codigo,function(html){
	    			$("#inicio").fadeOut(1);
					$("#modificar").append(html).fadeIn(1000);
					$("#formularioModificarBanco").submit(function(){
						var datos = {
							id : $("#modIdBanco").val(),
							descripcion: $("#modDescripcion").val(),
							direccion: $("#modDireccion").val()
						}
						$.post("modificandoBanco.php",datos,function(respuesta){
							if(respuesta == "ok"){
		    					location.reload();
		    				}else{
		    					$("#errorMod").html("Se ha producido un error. Vuelve a intentarlo");
		    				}
						});
					});
	    		});
    		});
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
		<div class="contenido" id="inicio">
			<div class="row">
				<h1 align="center">
					Cargar Centro de Pago
				</h1>
			</div>
			<form action="#" id="cargarBanco">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input class='form-control' type="text" required id="idBanco" placeholder='Código del Centro' maxlength='10'>
						</div>
					</div>
					<div class="col-sm-8">
						<input class='form-control' required type="text" id="descripcion" placeholder='Descripción' maxlength='250'>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input class='form-control' type="text" id="direccion" placeholder='Dirección' maxlength='250'>
						</div>
					</div>
				</div>
				<div class="row">
					<p align="center" id="error"></p>
				</div>
				<div class="row">
					<p align="center">
						<input type="submit" value='Cargar' class='btn btn-success'>
					</p>
				</div>
			</form>
			<div class="row">
				<h1 align='center'>Listado de Centros de Pago</h1>
			</div>
			<div class='row'>
				<div class='col-sm-1'>
					<p align='center'>
					</p>
				</div>
				<div class='col-sm-1'>
					<h2 align='center'>
						ID
					</h2>
				</div>
				<div class='col-sm-3'>
					<h2 align='center'>
						Descripción
					</h2>
				</div>
				<div class='col-sm-4'>
					<h2 align='center'>
						Dirección
					</h2>
				</div>
				<div class='col-sm-2'>
					<h2 align='center'>
						Acciones
					</h2>
				</div>	
				<div class='col-sm-1'>
					<p align='center'>
					</p>
				</div>
			</div>
			<?php
				$sql = "SELECT * FROM banco ORDER BY descripcion";
				$resultado = mysqli_query($conexion,$sql);
				while($banco = mysqli_fetch_assoc($resultado)){
					echo"
						<div class='row'>
							<div class='col-sm-1'>
								<p align='center'>
								</p>
							</div>
							<div class='col-sm-1'>
								<p align='center' class='listadoClientes'>
									".$banco['idBanco']."
								</p>
							</div>
							<div class='col-sm-3'>
								<p align='center' class='listadoClientes'>
									".$banco['descripcion']."
								</p>
							</div>
							<div class='col-sm-4' class='listadoClientes'>
								<p align='center'>
									".$banco['direccion']."
								</p>
							</div>
							<div class='col-sm-2'>
								<p align='center'>
									<a class='modificar' href='#' id='".$banco['idBanco']."'>
										<img src='img/modificar.png' width='25px' alt='Modificar'>
									</a>
									<a class='eliminar' href='#' id='".$banco['idBanco']."'>
										<img src='img/cross.png' width='25px' alt='Eliminar'>
									</a>
								</p>
							</div>
							<div class='col-sm-1'>
								<p align='center'>
								</p>
							</div>
						</div>
					";
				}
				
			?>
		</div>
		<div class="contenido" id="modificar">
			<div class="row">
				<div class="col-sm-1">
					<img class='back' src="img/back.png" width='40px'>
				</div>
				<div class="col-sm-11">
					<h1 align='center'>Modificar Centro de Pago</h1>
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
