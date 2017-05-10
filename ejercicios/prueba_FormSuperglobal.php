<!DOCTYPE html>
<html lang="es">
<head>	

	<title>Superglobals Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       

        <script>
            function myFunction() {
                document.getElementById("myForm").reset();
                }
        </script>

	<h3>Ejercicio de un formulario con Boostratp3 en php para ver como se comporta la variable superglobal $_GET.</h3>
	<h4>Mostramos un formulario para acceder a la tabla alumnos que tenemos en mySQL.</h4>
        <h4>Incluimos action = "nuevo.php" method = "get" en la etiqueta form.</h4>
        <h4>Creamos un fichero nuevo.php que contiene un echo "foobar". Cuando damos a Enviar en el formulario me devuelve foobar
            Esto significa que podemos tomar este dato para insertar en la tabla de nuestra base de datos </h4>
	

</head>
<body>
<?php

	$conn = new mysqli("localhost" , "root" , "" , "colegio");

	$sql = "SELECT * FROM alumno";

	$result = $conn->query($sql);


	echo 'Ejercicio Formulario para tabla alumno: ';
	
	echo '<div class="container">';
	echo '<h2>Formulario de datos de alumnos con Boostrap3</h2>';
 	echo '<form ID="myForm" action = "nuevo.php" method = "get" style=" width: 300px">';
  		echo '<div class="form-group">';
    			echo '<label for="nombre">Nombre del alumno:</label>';
    			echo '<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del alumno">';
  		echo '</div>';
  		echo '<div class="form-group">';
    			echo '<label for="apellidos">Apellidos:</label>';
    			echo '<input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos del alumno">';
  		echo '</div>';
		echo '<div class="form-group">';
    			echo '<label for="fecha_nacimiento">Fecha de nacimiento:</label>';
    			echo '<input type="date" name="date"  class="form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento">';
  		echo '</div>';
  		
    			
    		echo '<input type="submit" class="form-control" value="Enviar" style=" width: 65px">';
  		
                echo '<input type="button" onclick="myFunction()" value="Borrar">';

	echo '</form>';




$conn->close();
	
?>

</body>
</html>



