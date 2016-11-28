<?php
	$codigo  = $_GET["codigo"];

	if($codigo == "busquedaNormal"){
		$idCliente  = $_GET["cliente"];
		$idObligacion  = $_GET["obligacion"];
		$mes  = $_GET["mes"];
		if($mes<10){
			$mes = '0'.$mes;
		}
		$anio  = $_GET["anio"];
		$idPeriodo = $mes.$anio[2].$anio[3];
	}else{
		$idCliente = $codigo[0].$codigo[1].$codigo[2].$codigo[3].$codigo[4].$codigo[5];
		if(strlen($codigo)==13){
			$idObligacion = $codigo[6].$codigo[7].$codigo[8];
			$idPeriodo = $codigo[9].$codigo[10].$codigo[11].$codigo[12];
		}else{
			$idObligacion = $codigo[6].$codigo[7].$codigo[8].$codigo[9];
			$idPeriodo = $codigo[10].$codigo[11].$codigo[12].$codigo[13];
		}
		$mes=$idPeriodo[0].$idPeriodo[1];
		$anio=$idPeriodo[2].$idPeriodo[3];
	}

	include "conecto.php"; 

	$sql= "SELECT * FROM occperiodo WHERE idCliente = '$idCliente' AND idObligacion = '$idObligacion' AND idPeriodo = '$idPeriodo'";
	$resultado = mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)==0){
		echo"no existe";
		die();
	}
	

	

	$sql= "SELECT * FROM obligacion WHERE idObligacion = '$idObligacion'";
	$resultado = mysqli_query($conexion,$sql);
	$obligacion = mysqli_fetch_assoc($resultado);
	$categorizar = $obligacion['categorizar'];
	if($categorizar == 1){
		$sql = "SELECT * FROM categoria WHERE idObligacion = '$idObligacion'";
		$resultado = mysqli_query($conexion,$sql);
		$categoria = mysqli_fetch_assoc($resultado);
		echo"
			<div class='col-sm-12'>
				<p align='center'>Categoria: ".$categoria['idCategoria']." - ".$categoria['descripcion']." - <b>$".$categoria['valor']."</b></p>
			</div>
		";
	}else{
		$sql= "SELECT valor, impuesto, DATE_FORMAT(vencimiento,'%d/%m/%Y') AS vencimiento FROM occperiodo WHERE idObligacion = '$idObligacion' AND idCliente = '$idCliente' AND idPeriodo = '$idPeriodo'";
		$resultado = mysqli_query($conexion,$sql);
		$occ = mysqli_fetch_assoc($resultado);
		echo"
			<div class='col-sm-12'>
					<form action='' id='modificarMonto'>
						<div class='row'>
							<div class='col-sm-6'>
								<p align='right'>
									Monto:
								</p>
							</div>
							<div class='col-sm-4'>
								<p align='left'>
									<input value ='".$occ['valor']."' class='form-control' id='monto' required type='text'>
								</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<p align='right'>
									Impuesto:
								</p>
							</div>
							<div class='col-sm-4'>
								<p align='left'>
									<input value ='".$occ['impuesto']."' class='form-control' id='impuesto' type='text'>
								</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-6'>
								<p align='right'>
									Vencimiento:
								</p>
							</div>
							<div class='col-sm-4'>
								<p align='left'>
									<input maxlength='10'
					";
					if($occ['vencimiento']!="00/00/0000"){
						echo" value ='".$occ['vencimiento']."' ";
					}
					 
					 echo" 			class='form-control fecha' id='vencimiento' placeholder='DD/MM/AAAA' type='text'>
								</p>
							</div>
						</div>
						<div class='row'>
							<p align='center'>
								<input class='btn btn-success' type='submit' value='Modificar'>
							</p>
						</div>
					</form>
			</div>
		";
	}
?>