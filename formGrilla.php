<?php
	require_once('clases/Alumno.php');
?>
<html>
<head>
		<title>Ejemplos de ABM - con archivo de texto</title>

		<?php require_once"partes/referencias.php" ;?>
		<!--final de Estilos-->

        <script SRC="js/controlGrilla.js" TYPE="text/javascript"></script>
        <!--final logica de programación-->
</head>
<body>
 	<?php		
		include_once"partes/barraDeMenu.php";
	 ?>


	<?php
		$mensaje = "Bienvenido .";
		if(isset($_POST['legParaBorrar']))
		{
			$resultado = Alumno::Borrar($_POST['legParaBorrar']);
			$mensaje = "SE HA BORRADO EXITOSAMENTE!!!";
		}
	?>	
	<form name="frmBorrar" method="POST" >
		<input type="hidden" name="legParaBorrar" id="legParaBorrar" />
	</form>
	
	<form name="frmModificar" method="POST" action="formAlta.php" >
		<input type="hidden" name="legParaModificar" id="legParaModificar" />
	</form>

	<div class="container">
		<div class="page-header">
			<center><h3><?php echo $mensaje; ?></h3><h1> Ejemplo de Grilla</h1> </center>     
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>Listado de Alumnos</h1>
			<?php		
					include_once"partes/grilla.php";
	 			?>
		</div>
	</div>
</body>
</html>