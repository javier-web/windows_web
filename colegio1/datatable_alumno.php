<!DOCTYPE html>
<html lang="es">
    <head>	
        <title>Alumno_Datatable</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="patron.js"></script>

    
    


    <script>
        $(document).ready(function () {
            $('#example').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "lengthMenu": [7, 1, 2, 3, 5, 10, 20]
            });
        });
    </script>
    
    

</head>

    <br>
    
    <h2 style="line-height: normal; width: 100%; color: white; background-color: #6699ff">Tabla de alumnos</h2>
    
<body>

    <?php
    
    $conn = new mysqli("localhost", "root", "", "colegio");
    mysqli_set_charset($conn, 'utf8');
    $sql = "SELECT * FROM alumno";

    $result = $conn->query($sql);

    
    echo '<br>';
    
    
    echo '<div class="container">';
    echo '<table id="example" class="display" style="width: 950px;" cellspacing="0">';

    $primeraFila = $result->fetch_assoc();

//echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
//var_dump($primeraFila);

    $nombreColumnas = array_keys($primeraFila);

//echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
//var_dump($nombreColumnas);

   
    echo '<br>';
    echo '<br>';
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


    while ($fila = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td>' . $fila ['id'] . '</td>';
        echo '<td>' . $fila ['curso_id'] . '</td>';
        echo '<td>' . $fila ['nombre'] . '</td>';
        echo '<td>' . $fila ['apellidos'] . '</td>';
        echo '<td>' . $fila ['fecha_nacimiento'] . '</td>';
        echo '<td>' . $fila ['nota'] . '</td>';
        echo '<td>' . $fila ['foto'] . '</td>';
        echo '</tr>';

    }

    echo '</tbody>';
    echo '</table>';
    echo '<br>';
    echo '<br>';
    
    echo '<a href="formulario_alumno.php" >';
        echo '<input  type="submit" value="Volver al formulario"
                style=" width: 180px; margin:10px 10px; background-color: #00ff66; color: blue; box-shadow: 10px 5px 5px silver">
    </a>';
    
    echo '</div>';
    
    $conn->close();
    echo '<br>';
    ?>
    
</body>
</html>





