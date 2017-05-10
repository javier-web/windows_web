<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Nuevo_alumno</title>
        <link rel="stylesheet" href="patron.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">
    </head>
    
    <body>

    <?php

	
        echo '<br>';
        //echo 'id de curso';
	//echo "var_dump($_POST) contiene todos los campos";
	//var_dump($_POST['curso'][id]);

	//echo "$_POST['nombre'] contiene el campo nombre";
	//var_dump($_POST['nombre']);
	
	//echo "$_POST['apellidos'] contiene el campo apellidos";
	//var_dump($_POST['apellidos']);

	//echo "$_POST['date'] contiene el campo fecha";
	//var_dump($_POST['date']);


        //echo "$_POST['nota'] contiene el campo nota media";
	//var_dump($_POST['nota']);

        //echo "$_POST['file'] contiene la imagen";
	//var_dump($_POST['file']);



        echo '<br>';
	echo '<h3>Insertamos en la tabla</h3>';
	echo '<br>';
	$conn = new mysqli("localhost" , "root" , "" , "colegio");

        var_dump($conn);
	if ($conn -> connect_errno != 0) {
	echo 'Lo sentimos. Contraseña incorrecta';
	} else {
	echo 'Contraseña correcta';
	}

        echo '<br><br>';
        //var_dump($sql);

        var_dump($_FILES);
        
        //var_dump($_FILES['tmp_name']);
        move_uploaded_file($_FILES['file']['tmp_name'] , 'C:/xampp/htdocs/colegio/foto_alumno.jpg');
        
        echo '<br>';
        
	$sql = "INSERT INTO alumno (curso_id, nombre, apellidos , fecha_nacimiento , nota, foto) 
                VALUES  ('" . $_POST['curso'] . "' ,
                         '" . $_POST['nombre'] . "' ,
                         '" . $_POST['apellidos'] . "' ,
                         '" . $_POST['date'] . "' ,
                         '" . $_POST['nota'] . "' ,
                         '" . $_FILES['file']['name'] . "')";
	
	
	 
        echo '<br>';
        echo '<h3>Mostramos la tabla</h3>';
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