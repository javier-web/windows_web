<!DOCTYPE html>
<html lang="es">
<head>	

	<title>Upload Pupil Form</title>
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
        

	<h3>Ejercicio de base de datos en php</h3>
	<h4>Mostramos la tabla alumnos que tenemos en mySQL</h4>
	<h4>Decoramos la tabla con Bootstrap3</h4>

</head>
<body>
<?php


        $conn = new mysqli("localhost" , "root" , "" , "colegio");

	

        $sql = "SELECT * FROM curso";
	
        
        $result = $conn->query($sql);

        




        echo 'Ejercicio Formulario para tabla alumno: ';
	
	echo '<div class="container">';
	echo '<h2>Formulario de datos de alumnos</h2>';
 	echo '<form id="myForm" action="upload.php" method = "post" enctype="multipart/form-data" style=" width: 300px">';

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

                echo '<form action="nuevo_alumno.php" method = "post" enctype="multipart/form-data" style=" width: 300px">';
                echo '<div>';
                        echo '<label for="curso">Curso: </label>';
                echo '</div>';
                
               
                echo '<select name="curso" >';
                    while ($fila = $result->fetch_assoc()) {
                    echo '<option value = "' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                }
                echo '</select>';

                
                echo '</form>';

  		echo '<div class="form-group">';
    			echo '<br><label for="nota">Nota media:</label>';
    			echo '<input type="date" name="nota"  class="form-control" id="nota" placeholder="Nota media" style=" width: 100px">';
  		echo '</div>';

                echo '<div class="form-group">';
    			echo '<label for="foto">Fotografia:</label>';
    			echo '<input type="file" name="file" id="foto"><br>';
                echo '</div>';
    		
    
    		echo '<input type="submit" value="Enviar" name="submit">';
  		
                echo '<input type="button" onclick="myFunction()" value="Borrar">';

	echo '</form>';


        echo '<br>';
        echo '<br>';
        echo '<br>';

	
        $sql = "SELECT * FROM alumno";

	$result = $conn->query($sql);



$primeraFila = $result -> fetch_assoc();

//echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
//var_dump($primeraFila);

$nombreColumnas = array_keys($primeraFila);

//echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
//var_dump($nombreColumnas);

	echo 'Ejercicio con tabla alumno hecha en mysql con phpMyAdmin: ';
	echo 'http://localhost/phpmyadmin/sql.php?db=colegio&table=alumno&token=d3f0c5ca969e4aed0754be8805518fc4&pos=0';
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
                        echo '<td>' . $fila ['curso_id'] . '</td>' ;
			echo '<td>' . $fila ['nombre'] . '</td>' ;
			echo '<td>' . $fila ['apellidos'] . '</td>' ;
			echo '<td>' . $fila ['fecha_nacimiento'] . '</td>';
                        echo '<td>' . $fila ['nota'] . '</td>';
                        echo '<td>' . $fila ['foto'] . '</td>';
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



