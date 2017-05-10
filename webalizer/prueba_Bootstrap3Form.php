<!DOCTYPE html>
<html lang="es">
<head>	

	<title>Bootstrap3 Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
       

	<h3>Ejercicio de base de datos en php</h3>
	<h4>Mostramos un formulario para acceder a la tabla alumnos que tenemos en mySQL</h4>
	<h4>https://www.w3schools.com/bootstrap/bootstrap_forms.asp</h4>

</head>
<body>
<?php

	$conn = new mysqli("localhost" , "root" , "" , "colegio");

	$sql = "SELECT * FROM alumno";

	$result = $conn->query($sql);


	echo 'Ejercicio Formulario para tabla alumno: ';
	
	echo '<div class="container">';
	echo '<h2>Formulario de datos de alumnos con Boostrap3</h2>';
 	echo '<form  style=" width: 300px">';
  		echo '<div class="form-group">';
    			echo '<label for="nombre">Nombre del alumno:</label>';
    			echo '<input type="text" class="form-control" id="nombre" placeholder="Nombre del alumno">';
  		echo '</div>';
  		echo '<div class="form-group">';
    			echo '<label for="apellidos">Apellidos:</label>';
    			echo '<input type="text" class="form-control" id="apellidos" placeholder="Apellidos del alumno">';
  		echo '</div>';
		echo '<div class="form-group">';
    			echo '<label for="fecha_nacimiento">Fecha de nacimiento:</label>';
    			echo '<input type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento">';
  		echo '</div>';
  		echo '<div class="checkbox">';
    			echo '<label><input type="checkbox"> Remember me</label>';
  		echo '</div>';
  		echo '<button type="submit" class="btn btn-default">Submit</button>';
	echo '</form>';




$conn->close();
	
?>

</body>
</html>



