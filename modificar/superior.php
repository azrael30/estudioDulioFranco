<?php
	$idTipoUsuario=getTipoUsuario($login_session);
	echo"
		<p class='logueadocomo' align='right'>
	";
	if($idTipoUsuario==0){
		echo"
					<a id='visitarsitio' href='quieresBackupear.php'>Backup</a> &nbsp; &middot; &nbsp;
				";
	}
				
				echo"
				Logueado como 
				";
					
					switch ($idTipoUsuario) {
						case 0:
							$tipoUsuario = 'Administrador';
							break;
						case 1:
							$tipoUsuario = 'Editor';
							break;
						default:
							$tipoUsuario = 'Empleado';
							break;
					}
						echo "$tipoUsuario"; 
				echo"
				&nbsp; &middot; &nbsp; <a id='cerrarsesion' href='logout.php'>Cerrar Sesión</a>
			</p>
	";
?>