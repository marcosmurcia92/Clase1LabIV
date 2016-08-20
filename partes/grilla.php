<?php
	require_once('clases/Alumno.php');

	$ArrayDeAlumnos = Alumno::TraerTodosLosAlumnos();

	echo "<table class='table table-hover table-responsive'>
			<thead>
				<tr>
					<th>  Foto   </th>				
					<th>  Nombre     </th>
					<th>  Apellido   </th>
					<th>  Legajo        </th>
					<th>  BORRAR     </th>
					<th>  MODIFICAR  </th>
				</tr> 
			</thead>";   	

		foreach ($ArrayDeAlumnos as $AlumnoAux){

			echo " 	<tr>
						
						<td><img width='50 px' height='50 px' class='img-circle' src='fotos/".$AlumnoAux->GetFoto()."' /></td>
					
						<td>".$AlumnoAux->GetNombre()."</td>
						<td>".$AlumnoAux->GetApellido()."</td>
						<td>".$AlumnoAux->GetLegajo()."</td>
						<td><button class='btn btn-danger' name='Borrar' onclick='Borrar(".$AlumnoAux->GetId().")'>   <span class='glyphicon glyphicon-remove-circle'>&nbsp;</span>Borrar</button></td>
						<td><button class='btn btn-warning' name='Modificar' onclick='Modificar(".$AlumnoAux->GetId().")'><span class='glyphicon glyphicon-edit'>&nbsp;</span>Modificar</button></td>
					</tr>";
		}	
	echo "</table>";		
?>
