<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Tabla_alumno</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">
    </head>
    
    <body>

    <?php

	
        echo '<br>';
        echo '<br>';
        echo '<h2 style="line-height: normal; color: white; background-color: #6699ff">Mostramos la tabla</h2>';
        echo '<br>';
        
        $conn = new mysqli("localhost" , "root" , "" , "colegio");
        
        $sql = "SELECT * FROM alumno";
	
        $result = $conn->query($sql);
        
        $primeraFila = $result -> fetch_assoc();

        //echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
        //var_dump($primeraFila);

        $nombreColumnas = array_keys($primeraFila);

        //echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
        //var_dump($nombreColumnas);
        
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

			//echo 'Contenido de la variable $fila = $result -> fetch_assoc(). ';
			//var_dump($fila);

		}

	echo '</tbody>';

        echo '</table>';
        
        
	
	$conn->close();

  
        
    ?>
        
        <a href="formulario_alumno.php" class="button" >Volver al Formulario</a>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="patron.js"></script>

        
    </body>
</html>