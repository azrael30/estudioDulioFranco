<?php  
class MySQL{  
private $conexion;  
private $total_consultas;  
public function open(){  
if(!isset($this->conexion)){  
	$this->conexion = (mysqli_connect(_host,_user,_password,_database)) or die(mysqli_error());  
	mysqli_set_charset($this->conexion,"utf8");
}  
}  

public function consulta($consulta){  
	$this->total_consultas++;  
	$resultado = mysqli_query($this->conexion,$consulta);  
	if(!$resultado){  
		echo 'MySQL Error: ' . mysqli_error().'<br>'.$consulta;  
		exit;  
	}  
	return $resultado;   
}  

public function fetch_array($consulta){   
	return mysqli_fetch_array($consulta);  
}  
public function num_rows($consulta){   
	return mysqli_num_rows($consulta);  
}  
public function getTotalConsultas(){  
	return $this->total_consultas;  
}
public function close(){ 
	if ($this->conexion){ 
		return mysqli_close($this->conexion); 
	} 
}  
}?>  