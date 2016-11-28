<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Usuario o contraseña invalidos";
		}
		else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			require("conecto.php");
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($conexion, $username);
			$password = mysqli_real_escape_string($conexion, $password);
			
			$password=md5($password);
			// SQL query to fetch information of registerd users and finds user match.
			$consulta="SELECT * FROM usuario WHERE password='$password' AND username='$username'";
			$resultado=mysqli_query($conexion,$consulta);
			
			$rows = mysqli_num_rows($resultado);
			if ($rows == 1) {
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: panel.php"); // Redirecting To Other Page
			} else {
				$error = "Usuario o Contraseña incorrectos";
			}
			mysqli_close($conexion); // Closing Connection
		}
	}
?>