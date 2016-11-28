<?php
	include('login.php'); // Includes Login Script

	if(isset($_SESSION['login_user'])){
		header("location: inicio.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Iniciar sesión</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="estilospanel.css">
</head>

<body>
	<div class="fondoiniciar principaliniciar">
		<div class="superior"></div>
		<div class="contenido">
		    <div class="row">
		    	<?php include "modificar/logo.php"; ?>
		    </div><!--row-->
		    <div class="row">
		    	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
		    		<form class="formulario-iniciar" action="" width="100%" method="post">
		    			<p class="iniciarsesion" align="center">INICIAR SESIÓN</p> <br>
		    			<input class="input-iniciar form-control" type="text" placeholder="Usuario" name="username" id="username"> <br>
		    			<input class="input-iniciar form-control" type="password" placeholder="Contraseña" name="password" id="password"> <br>
		    			<p align="center">
		    				<input class="btn btn-success" type="submit" name="submit" id="submit" value="ENTRAR">
		    			</p>
		    		</form>
		    	</div>
		    	<br>
		    </div><!--row-->
		    <div class="row">
		    	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
		    		<h3 align="center" class="letrablanca">
			    		<?php echo $error; ?>
			    	</h3>
		    	</div>
		    	
		    </div><!--row-->
	    </div><!--main-->
	    <div class="inferior">
	    	<div class="row">
	    		<?php include "modificar/inferior.php" ?>
	    	</div>
	    </div><!--foot-->
	</div><!--fondo-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
