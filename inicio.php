<?php
	include "session.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel de Control - Inicio</title>
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
    	});
    </script>
</head>

<body>
	<?php 
		include "conecto.php"; 
		
		require "funciones.php";
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
				<p align="center">
					<img src="img/logo.png" alt="" width='60%'>
				</p>
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
