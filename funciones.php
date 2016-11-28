<?php

	require "conecto.php";

	function died($msg){
		echo "
			<p style='color:red;' align='center'>
				$msg	
			</p>
			<br>
			<a href='inicio.php'>Volver al Panel de Control</a>
		";
		die();
	}

	function lived($msg){
		echo "
			<p style='color:green;' align='center'>
				$msg	
			</p>
		";
	}

	function insert($into, $values){
		global $conexion;
		$consulta='INSERT INTO '.$into.' VALUES("'.$values.'")';
		$resultados = mysqli_query($conexion,$consulta);
		if($resultados == false){
			died("Error en la carga");
		}else{
			lived("Cargado");
		}
	}

	function queryInsert($consulta){
		global $conexion;
		$aux= mysqli_query($conexion,$consulta);
		if($aux == false || mysqli_affected_rows($conexion) == 0){
			return false;
		}else{
			return true;
		}
	}


	function comprobarUsuario($usuario){
		global $conexion;
		$sql="SELECT * FROM publicacion WHERE usuario_username = '$usuario'";
		$aux= mysqli_query($conexion,$sql);
		if(mysqli_num_rows($aux)>0){
			return false;
		}else{
			return true;
		}
	}

	//recibe name de formulario, nombre que recibe la foto, ruta de destino y link para volver por error.
	function subirImagen($nombre,$nombreFoto,$rutaDestino,$volver){
		//imagen
        $imagenError = $_FILES[$nombre]["error"];
        $imagenType = $_FILES[$nombre]["type"];
        $imagenSize = $_FILES[$nombre]["size"];
        $imagenName = $_FILES[$nombre]["name"];
        $imagenTemp = $_FILES[$nombre]["tmp_name"];

        //Si me cargaron una imagen
        if($imagenName!=""){
            //compruebo el tamaño de la imagen
            if($imagenSize > 500*1024){
                echo"Se produjo un ERROR en la carga. La imagen es demasiado pesada, recordá que no puede superar los 500kBs. Por favor,<a href='$volver'> Vuelve a intentarlo.</a>";
                die();
                //compruebo que sea de tipo imagen
            }else if($imagenType != 'image/png' && $imagenType != 'image/jpeg' && $imagenType != 'image/bmp'){
                echo"Se produjo un ERROR en la carga. El archivo subido no es una imagen. Por favor,<a href='$volver'> Vuelve a intentarlo.</a>";
                die();
            }else if($imagenError>0){
                echo"Se produjo un ERROR en la carga. Cod 3. Por favor,<a href='$volver'> Vuelve a intentarlo.</a>";
                die();
            }

            switch ($imagenType) {
                case 'image/jpeg':
                    $imagenName="$nombreFoto.jpg";
                    break;
                case 'image/bmp':
                    $imagenName="$nombreFoto.bmp";
                    break;
                case 'image/png':
                    $imagenName="$nombreFoto.png";
                    break;
            }

            //defino la ruta y muevo la imagen
            $destino="$rutaDestino/$imagenName";
            if(@move_uploaded_file($imagenTemp, $destino)){
                //Se movió correctamente
            }else{
                //Falló
                echo"Se produjo un ERROR en la carga. Cod 4. Por favor,<a href='$volver'> Vuelve a intentarlo.</a>";
                die();
            }
            return $imagenName;
        }else{
        	return "";
        }
	}

	function getTipoUsuario($username){
		global $conexion;
		$sql="SELECT tipoUsuario FROM usuario WHERE username = '$username'";
		$resultado = mysqli_query($conexion,$sql);
		$tipoUsuario = mysqli_fetch_row($resultado);
		return $tipoUsuario[0];
	}

	function getCategorizar($idObligacion){
		global $conexion;
		$sql="SELECT categorizar FROM obligacion WHERE idObligacion = '$idObligacion'";
		$resultado=mysqli_query($conexion,$sql);
		$aux = mysqli_fetch_row($resultado);
		return $aux[0];
	}

	function getObligacionesDe($idCliente){
		global $conexion;
		$sql="SELECT obligacion.descripcion AS descripcion, obligacioncliente.idObligacion AS idObligacion, obligacioncliente.idCategoria AS idCategoria FROM obligacioncliente INNER JOIN obligacion ON obligacioncliente.idObligacion = obligacion.idObligacion WHERE idCliente = '$idCliente' AND obligacioncliente.habilitado = 1";
		$resultado = mysqli_query($conexion,$sql);
		$respuesta = "";
		
		while($obligacioncliente = mysqli_fetch_assoc($resultado)){
			$idObligacion = $obligacioncliente['idObligacion'];
			$idCategoria = $obligacioncliente['idCategoria'];
			$descripcion = $obligacioncliente['descripcion'];
			$respuesta .= $descripcion;
			if(getCategorizar($idObligacion)==1){
				$respuesta.=" (Categoria: $idCategoria) <br>";
			}else{
				$respuesta.="<br>";
			}
		}

		if(mysqli_num_rows($resultado)==0){
			$respuesta = "No tiene obligaciones asignadas.";
		}
		return $respuesta;
	}

	function getDescripcionObligacion($idObligacion){
		global $conexion;
		if($idObligacion == 'honorario'){
			return "Honorarios";
		}else{
			$sql = "SELECT * FROM obligacion WHERE idObligacion = '$idObligacion'";
			$resultado = mysqli_query($conexion,$sql);
			$obligacion = mysqli_fetch_assoc($resultado);
			return $obligacion['descripcion'];
		}
	}
	function getDescripcionBanco($idBanco){
		global $conexion;
		$sql = "SELECT * FROM banco WHERE idBanco = '$idBanco'";
		$resultado = mysqli_query($conexion,$sql);
		$banco = mysqli_fetch_assoc($resultado);
		return $banco['descripcion'];
	}

	function getNombreApellido($idCliente){
		global $conexion;
		$sql = "SELECT * FROM cliente WHERE idCliente = '$idCliente'";
		$resultado = mysqli_query($conexion,$sql);
		$cliente = mysqli_fetch_assoc($resultado);
		return $cliente['apellido']." ".$cliente['nombre'];
	}

	function getCuit($idCliente){
		global $conexion;
		$sql = "SELECT * FROM cliente WHERE idCliente = '$idCliente'";
		$resultado = mysqli_query($conexion,$sql);
		$cliente = mysqli_fetch_assoc($resultado);
		$cuit = $cliente['CUIT'];
		$cuitAimprimir = $cuit[0].$cuit[1]."-".$cuit[2].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9]."-".$cuit[10];
		return $cuitAimprimir;
	}

	function getSumaCobro($idPeriodo,$idCliente,$idObligacion){
		global $conexion;
		$sql = "SELECT round(sum(valor),2) AS total FROM cobro WHERE idPeriodo = '$idPeriodo' AND idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
		$resultado = mysqli_query($conexion,$sql);
		$suma = mysqli_fetch_assoc($resultado);
		return $suma['total'];
	}

	function getFechaRecibo($idPeriodo,$idCliente,$idObligacion){
		global $conexion;
		$sql = "SELECT nroRecibo FROM cobro WHERE idPeriodo = '$idPeriodo' AND idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
		$resultado = mysqli_query($conexion,$sql);
		$aux = mysqli_fetch_assoc($resultado);
		$nroRecibo = $aux['nroRecibo'];

		$sql="SELECT DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM recibo WHERE nroRecibo = '$nroRecibo'";
		$resultado = mysqli_query($conexion,$sql);
		$fecha = mysqli_fetch_assoc($resultado);
		return $fecha['fecha'];
	}

	function getSumaCobroHonorario($idPeriodo,$idCliente){
		global $conexion;
		$sql = "SELECT round(sum(monto),2) AS total FROM cobrohonorario WHERE idPeriodo = '$idPeriodo' AND idCliente = '$idCliente'";
		$resultado = mysqli_query($conexion,$sql);
		$suma = mysqli_fetch_assoc($resultado);
		return $suma['total'];
	}
	function getSumaPago($idPeriodo,$idCliente,$idObligacion){
		global $conexion;
		$sql = "SELECT round(sum(valor),2) AS total FROM pago WHERE idPeriodo = '$idPeriodo' AND idCliente = '$idCliente' AND idObligacion = '$idObligacion'";
		$resultado = mysqli_query($conexion,$sql);
		$suma = mysqli_fetch_assoc($resultado);
		return $suma['total'];
	}
	function getSumaExtraHonorario($idPeriodo,$idCliente){
		global $conexion;
		$sql = "SELECT round(sum(monto),2) AS total FROM extrahonorario WHERE idPeriodo = '$idPeriodo' AND idCliente = '$idCliente'";
		$resultado = mysqli_query($conexion,$sql);
		$suma = mysqli_fetch_assoc($resultado);
		return $suma['total'];
	}
	function getFechaDelSistema(){
		global $conexion;
		$sql = "SELECT DATE_FORMAT(SYSDATE(),'%d/%m/%Y')";
		$resultado = mysqli_query($conexion,$sql);
		$fecha = mysqli_fetch_row($resultado);
		return $fecha[0];
	}
	function getFechaDelSistemaConGuiones(){
		global $conexion;
		$sql = "SELECT DATE_FORMAT(SYSDATE(),'%d-%m-%Y')";
		$resultado = mysqli_query($conexion,$sql);
		$fecha = mysqli_fetch_row($resultado);
		return $fecha[0];
	}

	function getNumeroReciboProximo(){
		global $conexion;
		$sql = "SELECT MAX(nroRecibo)+1 FROM recibo";
		$resultado = mysqli_query($conexion,$sql);
		$recibo = mysqli_fetch_row($resultado);
		return $recibo[0];
	}
?>