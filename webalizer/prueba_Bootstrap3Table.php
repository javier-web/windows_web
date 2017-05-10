<!DOCTYPE html>
<html lang="es">
<head>	

	<title>Bootstrap3 Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        

	<h3>Ejercicio de base de datos en php</h3>
	<h4>Mostramos la tabla alumnos que tenemos en mySQL</h4>
	<h4>Decoramos la tabla con Bootstrap3</h4>

</head>
<body>
<?php

	$conn = new mysqli("localhost" , "root" , "" , "colegio");

	$sql = "SELECT * FROM alumno";

	$result = $conn->query($sql);



$primeraFila = $result -> fetch_assoc();

//echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
//var_dump($primeraFila);

$nombreColumnas = array_keys($primeraFila);

//echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
//var_dump($nombreColumnas);

	echo 'Ejercicio con tabla alumno hecha en mysql con phpMyAdmin: ';
	
	echo '<div class="container">';
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

$conn->close();
	
?>

</body>
</html>



