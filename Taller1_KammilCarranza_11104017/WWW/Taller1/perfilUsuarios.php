<!DOCTYPE html>
<head>
	<title>Profile</title>
</head>
<body>

</body>
</html>
<head>
	<title>Tabla de notas</title>
	<meta charset="UTF-8">

</head>


<body>
	<?php
	include_once("includes/database.php");
	if(isset($_GET["correo"])){
		$correo = $_GET["correo"];

		//Selecciona los datos del usuario de la tabla usuarios, que coincida con el correo y contraseña entregados por validar usuario
		$sql= " SELECT usuarios.nombre AS nombre, usuarios.apellido AS apellido, usuarios.correo FROM usuariosTareas.usuarios WHERE usuarios.correo='$correo'";
		$result = mysqli_query($con,$sql);

		if(mysqli_num_rows($result) < 1)
		{
			echo "<h1>El usuario no tiene tareas para mostrar</h1>";
		}

		else{
			while($row = mysqli_fetch_array($result)) {

				//Pinta los datos del usuario y las tareas que contiene este usuario en forma de tabla		
				echo"<h3>"."Nombre: ".$row["nombre"]." ".$row["apellido"]."</h3>";
				echo"<h3>"."Correo Electrónico: ".$correo."</h3>";
				echo"<br/>";
				echo"<h2>Tareas Pendientes</h2>";
				$SQLtareasAsignadas= "SELECT tareas.creacion AS creacion, tareas.finalizacion AS finalizacion, tareas.descripcion AS descripcion, tareas.prioridad AS prioridad, tareasDeUsuarios.correoUsuario AS correoUsuario FROM usuariosTareas.tareasDeUsuarios JOIN usuariosTareas.usuarios ON tareasDeUsuarios.correoUsuario=usuarios.correo JOIN usuariosTareas.tareas ON tareasDeUsuarios.idTarea=tareas.idTarea ORDER BY prioridad ";
				$tareasAsignadas= mysqli_query($con,$SQLtareasAsignadas);
				echo"<table border='1' style='width:300px'>";
				echo"<th>Descripción</th>";
				echo"<th>Prioridad</th>";
				echo"<th>Fecha de creación</th>";
				echo"<th>Fecha de finalización</th>";
				echo"<tr>";
				while($tareas = mysqli_fetch_array($tareasAsignadas)){
					if($correo==$tareas["correoUsuario"]){
						echo"<td>".$tareas["descripcion"]."</td>";
						echo"<td>".$tareas["prioridad"]."</td>";
						echo"<td>".$tareas["creacion"]."</td>";
						echo"<td>".$tareas["finalizacion"]."</td>";
					}
					echo"</tr>";
				}

			}

			echo"</table>";
		}

		/*Permite mediante un formulario, añadir la información necesaria que tiene una tarea
		para despues añadir esta tarea al usuario, enviando los datos a la pagina de crearTarea.*/
		echo"<section>";
		echo"<h2>Llenar datos de nueva tarea para este usuario</h2>";
		echo"<form action='includes/crearTarea.php' method='POST'>";
		echo"<label>Prioridad</label><input type='text' name='prioridad'><br />";
		echo"<label>Fecha de creacion</label><input type='date' name='fechaIni'><br />";
		echo"<label>Fecha Límite</label><input type='date' name='fechaLim'><br />";
		echo"<label>Descripción</label><input type='text' name='descripcion'><br />";
		echo"<input type='hidden' name='correo' value='".$correo."'>";
		echo"<input type='submit' value='Agregar Tarea'>";
		echo"</form>";
		echo"</section>";
		echo"<br/>";

	}


	?>
	
</body></html>