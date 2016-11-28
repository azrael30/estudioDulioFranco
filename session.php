<?php
	session_start();
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	require("conecto.php");

	 // Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysqli_query($conexion, "SELECT username FROM usuario WHERE username='$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	if(!isset($login_session)){
		mysqli_close($conexion); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>