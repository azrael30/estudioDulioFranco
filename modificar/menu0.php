<?php
	echo"
		<ul>
			<!--<a href='inicio.php'><li>
				<img src='img/ico-inicio.png' width='40px'> INICIO
			</li></a>-->
			<li>
				<img src='img/ico-editar.png' width='40px'>MANTENIMIENTO
				
				<ul>
					<a href='ingresarObligacion.php'><li>&bullet; &nbsp; Obligaciones</li></a>
				</ul>
				<!--<ul>
					<a href='ingresarCategoria.php'><li>&bullet; &nbsp; Categorías</li></a>
				</ul>-->
				<ul>
					<a href='ingresarCliente.php'><li>&bullet; &nbsp; Alta Clientes</li></a>
				</ul>
				<ul>
					<a href='modificacionBajaCliente.php'><li>&bullet; &nbsp; Modificación / Baja Clientes</li></a>
				</ul>
				<!--<ul>
					<a href='ingresarBanco.php'><li>&bullet; &nbsp; Centros de Pago</li></a>
				</ul>-->
			</li>

			<a href='generador.php'><li>
				<img src='img/ico-configuracion.png' width='40px'>GENERADOR
			</li></a>
			<a href='movimientos.php'><li>
				<img src='img/ico-ventas.png' width='40px'>MOVIMIENTOS
				<ul>
					<a href='cobros.php'><li>&bullet; &nbsp; Pedidos</li></a>
				</ul>
				<!--<ul>
					<a href='pagos.php'><li>&bullet; &nbsp; Pagos</li></a>
				</ul>-->
				<ul>
					<a href='recibos.php'><li>&bullet; &nbsp; Recibos</li></a>
				</ul>
			</li></a>
			<a href='informes.php'><li>
				<img src='img/ico-informe.png' width='40px'>INFORMES
			</li></a>
			<!--<a href='#'><li>
				<img src='img/ico-configuracion.png' width='40px'>CONFIGURACIÓN
			</li></a>-->
		</ul>
	";
?>