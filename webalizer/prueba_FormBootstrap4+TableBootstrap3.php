<!DOCTYPE html>
<html lang="es">
<head>	

	<title>Bootstrap4 Form+Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
       

	<h3>Ejercicio de base de datos en php</h3>
	<h4>Mostramos un formulario para acceder a la tabla alumnos que tenemos en mySQL</h4>
	<h4>https://v4-alpha.getbootstrap.com/components/forms/</h4>

</head>
<body>
<?php

	$conn = new mysqli("localhost" , "root" , "" , "colegio");

	$sql = "SELECT * FROM alumno";

	$result = $conn->query($sql);

        echo '<br>';
	echo 'Ejercicio Formulario para tabla alumno: ';
	echo '<br>';
	echo '<br>';
    
    echo '<div class="container">';
        echo '<h2>Formulario de datos de alumnos con Boostrap4</h2>';
        echo '<div class="row">';
            echo '<div class="col-3">';
                echo '<label for="nombre">Nombre del alumno:</label>';
                echo '<input type="text" class="form-control" id="nombre" placeholder="Nombre del alumno">';
            echo '</div>';
            echo '<div class="col-4">';
                echo '<label for="apellidos">Apellidos:</label>';
                echo '<input type="text" class="form-control" id="apellidos" placeholder="Apellidos del alumno">';
            echo '</div>';
            echo '<div class="col-2">';
                echo '<label for="fecha_nacimiento">Fecha de nacimiento:</label>';
                echo '<input type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento">';
            echo '</div>';
            echo '<button type="submit" class="btn btn-default">Submit</button>';
        echo '</div>';
    echo '</form>';
    echo '<br>';
    echo '<br>';
$primeraFila = $result -> fetch_assoc();

//echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
//var_dump($primeraFila);

$nombreColumnas = array_keys($primeraFila);

//echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
//var_dump($nombreColumnas);

	echo 'Ejercicio con tabla alumno hecha en mysql con phpMyAdmin: ';
	
	echo '<div class="container">';
        echo '<br>';
	echo '<h2>Tabla alumno con Boostrap3</h2>';
	echo '<table class="table">';
	echo '<thead>';
		echo '<tr>';
		foreach ($nombreColumnas as $nombreColumna) {
		echo '<td>' . $nombreColumna . '</td>'; 
		}
		echo '</tr>';
	echo '</thead>';

	echo '<tbody>';
		echo '<tr>';
		foreach ($primeraFila as $elementosprimeraFila) {
		echo '<td>' . $elementosprimeraFila . '</td>'; 
		}
		echo '</tr>';
	

		while ($fila = $result -> fetch_assoc()) {
	
			echo '<tr>';
			echo '<td>' . $fila ['id'] . '</td>' ;
			echo '<td>' . $fila ['nombre'] . '</td>' ;
			echo '<td>' . $fila ['apellidos'] . '</td>' ;
			echo '<td>' . $fila ['fecha_nacimiento'] . '</td>';
			echo '</tr>';

//			echo 'Contenido de la variable $fila = $result -> fetch_assoc(). ';
//			var_dump($fila);


		}

	echo '</tbody>';

echo '</table>';
echo '</div>';
echo '<br>';
$conn->close();
	
?>

</body>
</html>


